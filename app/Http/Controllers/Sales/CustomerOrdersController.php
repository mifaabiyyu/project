<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Imports\CustomerOrderImport;
use App\Models\Lab\LabReport;
use App\Models\Lab\LabReportDetail;
use App\Models\Logistik\Delivery;
use App\Models\Logistik\DeliveryDetail;
use App\Models\MasterData\Vehicle;
use App\Models\Production\ProductionPlanningDetail;
use App\Models\Sales\CustomerOrder;
use App\Models\Sales\CustomerOrderDetail;
use App\Models\Sales\CustomerReceiveAddress;
use Illuminate\Http\Request;
use DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CustomerOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customerOrders = CustomerOrder::query()->with('get_status:id,name,value', 'get_customer:id,name');

        if ($request->filled('customer_id')) {
            $customerOrders->where('customer_id', $request->customer_id);
        }

        if ($request->filled('date')){
            $date = explode('-', $request->date);
            $start = date('Y-m-d', strtotime($date[0]));
            $end = date('Y-m-d', strtotime($date[1]));
            $customerOrders->whereBetween('created_at', [$start ." 00:00:00", $end ." 23:59:59"]);
        }

        if ($request->filled('status')) {
            $customerOrders->where('status', $request->status);
        }

        return DataTables::eloquent($customerOrders)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'   => 'required',
            'delivery_date' => 'required',
            'ppn'           => 'required',
            'product_detail'=> 'required',
            'ekspedisi'=> 'required',
        ]);
       
        $countTotalWeight   = 0;
        $countTotalPrice    = 0;
        $countSack          = 0;
        $product_detail     = json_decode($request->product_detail);
        
        foreach ($product_detail as $product) {
            $countTotalWeight   += $product->qty;
            $countSack        += $product->qty / $product->weight;
            $priceProduct = $product->price * $product->qty;
            $countTotalPrice += $priceProduct;
        }
        
        //! Harga Satuan Product
        $countPriceQty = $request->price / $countTotalWeight ;
        
        $countStapelPrice = 0;

        //? Jika terdapat harga stapel
        if ($request->stapel_price) {
            $countStapelPrice = $request->stapel_price / $countTotalWeight ;
        }

        $discountPrice = $request->discount * $countTotalPrice / 100;
        $price = $countTotalPrice - round($discountPrice);
        $countPPN = ($request->ppn * $price) / 100;
        $totalPrice = $price + round($countPPN);

        DB::beginTransaction();
        
        $code = IdGenerator::generate([
            'table' => (new CustomerOrder())->getTable(),
            'field' => 'code',
            'length' => 12,
            'prefix' => 'ORD' . date('y') . date('m') . '-',
            'reset_on_prefix_change' => true
        ]);

        try {
            $findCustomerReceive    = CustomerReceiveAddress::where('customer_id', $request->customer_id)->where('address', $request->customer_receive_address)->first();

            $createCustomerOrder = CustomerOrder::create([
                'code'                      => $code,
                'customer_id'               => $request->customer_id,
                'purchase_order_number'     => $request->purchase_order_number,
                'address'                   => $request->customer_receive_address,
                'city_id'                   => $request->customer_city_id,
                'phone'                     => $request->customer_phone,
                'delivery_date'             => $request->delivery_date,
                'discount'                  => $request->discount,
                'discount_price'            => round($discountPrice),
                'ppn'                       => $request->ppn,
                'initial_price'             => $request->price,
                'ppn_price'                 => round($countPPN),
                'sub_total_price'           => $countTotalPrice,
                'total_price'               => $totalPrice,
                'staple_price'              => $request->stapel_price,
                'ekspedisi_id'              => $request->ekspedisi,
                'description'               => $request->description,
                'created_by'                => auth()->id(),
                'status'                    => 2,
                'customer_receive_address_id'   => $findCustomerReceive->id
            ]);

            $createDelivery = Delivery::create([
                'customer_id'       => $request->customer_id,
                'order_id'          => $createCustomerOrder->id,
                'ekspedisi_id'      => $request->ekspedisi,
                'vehicle_id'           => $request->request_vehicle,
                'delivery_date'     => $request->delivery_date,
                'total_weight'      => $countTotalWeight,
                'total_qty'         => $countSack,
            ]);

            foreach ($product_detail as $product) {
                $countProduct   = round($countPriceQty) * $product->qty;
                $countStapel    = round($countStapelPrice) * $product->qty;
                
                $totalPriceProduct = $countProduct + $countStapel;
                $averageProduct = $totalPriceProduct / $product->qty;
                $countCalcium   = $product->price - round($averageProduct); 
                $countEkspedisi = $product->price - $countCalcium;
                $totalEkspedisi = $countEkspedisi * $product->qty;

                $countPriceProduct = $product->price * $product->qty;
                $createProductDetail = CustomerOrderDetail::create([
                    'customer_order_id' => $createCustomerOrder->id,
                    'product_id'        => $product->id,
                    'qty'               => $product->qty,
                    'ekspedisi_price'   => $countEkspedisi,
                    'price_calcium'     => $countCalcium,
                    'price'             => $product->price,
                    'staple_price'      => $countStapel,
                    'additional_price'  => null,
                    'product_price'     => $countPriceProduct,
                    'product_ekspedisi' => $totalEkspedisi,
                    'status'            => 2,
                    'customer_card_id'  => isset($product->customer_card) ? $product->customer_card : null
                ]);

                DeliveryDetail::create([
                    'delivery_id'       => $createDelivery->id,
                    'product_id'        => $product->id,
                    'qty'               => $product->qty / $product->weight,
                    'weight'            => $product->qty,
                    'customer_order_detail_id'  => $createProductDetail->id
                ]);
            }
            DB::commit();

            $response = [
                'message'               => 'Customer order created successfully !',
                'customer_order'        => $createCustomerOrder,
                'customer_order_detail' => $createProductDetail
            ];
    
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message' => $th->getMessage()], 422);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findData   = CustomerOrder::with('get_order_details')->find($id);

        if (!$findData) {
            return response()->json(['message'  => 'Data not found !'], 422);
        }

        $response   = [
            'message'   => 'Data fetched successfully !',
            'data'      => $findData
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $findData = CustomerOrder::where('code', $code)->first();
        
        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $request->validate([
            'customer_id'   => 'required',
            'delivery_date' => 'required',
            'ppn'           => 'required',
            'product_detail'=> 'required'
        ]);
       
        $countTotalWeight = 0;
        $countTotalPrice = 0;
        $countSack          = 0;
        $product_detail = json_decode($request->product_detail);
        
        foreach ($product_detail as $product) {
            $countTotalWeight += $product->qty;
            $countSack        += $product->qty / $product->weight;
            $priceProduct = $product->price * $product->qty;
            $countTotalPrice += $priceProduct;
        }
        
        //! Harga Satuan Product
        $countPriceQty = $request->price / $countTotalWeight ;
        
        $countStapelPrice = 0;

        if ($request->stapel_price) {
            $countStapelPrice = $request->stapel_price / $countTotalWeight ;
        }

        $discountPrice = $request->discount * $countTotalPrice / 100;
        $price = $countTotalPrice - round($discountPrice);
        $countPPN = ($request->ppn * $price) / 100;
        $totalPrice = $price + round($countPPN);

        DB::beginTransaction();
        
        try {
            $findCustomerReceive    = CustomerReceiveAddress::where('customer_id', $request->customer_id)->where('address', $request->customer_receive_address)->first();
            $findData->update([
                'customer_id'               => $request->customer_id,
                'purchase_order_number'     => $request->purchase_order_number,
                'address'                   => $request->customer_receive_address,
                'city_id'                   => $request->customer_city_id,
                'phone'                     => $request->customer_phone,
                'delivery_date'             => $request->delivery_date,
                'discount'                  => $request->discount,
                'discount_price'            => round($discountPrice),
                'ppn'                       => $request->ppn,
                'initial_price'             => $request->price,
                'ppn_price'                 => round($countPPN),
                'sub_total_price'           => $countTotalPrice,
                'total_price'               => $totalPrice,
                'staple_price'              => $request->stapel_price,
                'ekspedisi_id'              => $request->ekspedisi,
                'description'               => $request->description,
                'created_by'                => auth()->id(),
                'status'                    => 2,
                'customer_receive_address_id'   => $findCustomerReceive->id
            ]);

            $findDelivery   = Delivery::where('order_id', $findData->id)->first();

            if ($findDelivery) {
                $findDelivery->update([
                    'ekspedisi_id'      => $request->ekspedisi,
                    'vehicle_id'           => $request->request_vehicle,
                    'delivery_date'     => $request->delivery_date,
                    'total_weight'      => $countTotalWeight,
                    'total_qty'         => $countSack,
                ]);
            } else {
                $createDelivery = Delivery::create([
                    'customer_id'       => $request->customer_id,
                    'order_id'          => $findData->id,
                    'ekspedisi_id'      => $request->ekspedisi,
                    'vehicle_id'           => $request->request_vehicle,
                    'delivery_date'     => $request->delivery_date,
                    'total_weight'      => $countTotalWeight,
                    'total_qty'         => $countSack,
                ]);

                $findDelivery   = $createDelivery;
            }

            foreach ($product_detail as $product) {
                $countProduct   = round($countPriceQty) * $product->qty;
                $countStapel    = round($countStapelPrice) * $product->qty;
                
                $totalPriceProduct = $countProduct + $countStapel;
                $averageProduct = $totalPriceProduct / $product->qty;
                $countCalcium   = $product->price - round($averageProduct); 
                $countEkspedisi = $product->price - $countCalcium;
                $totalEkspedisi = $countEkspedisi * $product->qty;

                $countPriceProduct = $product->price * $product->qty;
                
                $findOrderDetail = CustomerOrderDetail::find($product->id_details);
               
                $findDeliveryDetail = DeliveryDetail::where('customer_order_detail_id', $product_detail)->first();

                if ($findOrderDetail) {
                    $findOrderDetail->update([
                        'customer_order_id' => $findData->id,
                        'product_id'        => $product->id,
                        'qty'               => $product->qty,
                        'ekspedisi_price'   => $countEkspedisi,
                        'price_calcium'     => $countCalcium,
                        'price'             => $product->price,
                        'staple_price'      => $countStapel,
                        'additional_price'  => null,
                        'product_price'     => $countPriceProduct,
                        'product_ekspedisi' => $totalEkspedisi,
                        'status'            => 2,
                        'customer_card_id'  => $product->customer_card
                    ]);

                    $findDeliveryDetail->update([
                        'product_id'        => $product->id,
                        'qty'               => $product->qty / $product->weight,
                        'weight'            => $product->qty,
                    ]);
                } else {
                    $createProductDetail = CustomerOrderDetail::create([
                        'customer_order_id' => $findData->id,
                        'product_id'        => $product->id,
                        'qty'               => $product->qty,
                        'ekspedisi_price'   => $countEkspedisi,
                        'price_calcium'     => $countCalcium,
                        'price'             => $product->price,
                        'staple_price'      => $countStapel,
                        'additional_price'  => null,
                        'product_price'     => $countPriceProduct,
                        'product_ekspedisi' => $totalEkspedisi,
                        'status'            => 2,
                        'customer_card_id'  => $product->customer_card
                    ]);

                    DeliveryDetail::create([
                        'delivery_id'       => $findDelivery->id,
                        'product_id'        => $product->id,
                        'qty'               => $product->qty / $product->weight,
                        'weight'            => $product->qty,
                        'customer_order_detail_id'  => $createProductDetail->id
                    ]);
                }
            }
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message' => $th->getMessage()], 422);
        }

        $updatedOrder = CustomerOrder::where('code', $code)->first();
        $updatedOrderDetail = CustomerOrderDetail::where('customer_order_id', $updatedOrder->id)->get();

        $response = [
            'message'               => 'Customer order updated successfully !',
            'customer_order'        => $updatedOrder,
            'customer_order_detail' => $updatedOrderDetail
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findData = CustomerOrder::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $findDetailData = CustomerOrderDetail::where('customer_order_id', $id)->get();

        if ($findDetailData) {
            $findDetailData->each->delete();
        }

        $findData->delete();

        $response = [
            'message' => 'Customer order deleted successfully',
        ];

        return response()->json($response, 200);
    }

    public function printCustomerOrder($code)
    {
        $data = CustomerOrder::with('get_customer', 'get_order_details', 'get_receive_address.get_city')->where('code', $code)->first();

        if (!$data) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $pdf = PDF::loadView('export.pdf.sales.print_surat_pesanan', compact('data'))->setPaper('a5', 'portrait');
        return $pdf->stream();
    }

    
    public function check_lab($id)
    {
        $findData = ProductionPlanningDetail::where('customer_order_id', $id)->first();

        if (!$findData) {
            abort(404);
        }

        $data = LabReport::with('get_detail', 'get_production_planning')->where('production_planning_id', $findData->production_planning_id)->first();

        if (!$data) {
            abort(404);
        }

        $arrayDetail = [];

        foreach ($data->get_detail as $key => $value) {
            $arrayDetail[$value->machine_id][]  = $value;
        }

        // dd($data);
        $pdf = PDF::loadView('export.pdf.lab.print_lab_result', compact('data', 'arrayDetail'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function getRecentOrder($id)
    {
        $findData   = CustomerOrder::where('customer_id', $id)->orderBy('created_at', 'desc')->get();

        // if (!$findData) {
        //     return response()->json(['message'  => 'Data not found !'], 422);
        // }

        $response   = [
            'message'   => 'Data fetched successfully !',
            'data'      => $findData
        ];

        return response()->json($response, 200);
    }

    public function getVehicle($date)
    {
        $arrayData = [];
        
        $getData    = Delivery::where('delivery_date', $date)->get()->pluck('vehicle_id');
        
        $getVehicle = Vehicle::whereNotIn('id', $getData)->get();

        foreach ($getVehicle as $key => $value) {
            $arrayData[]    = [
                'id'    => $value->id,
                'name'  => $value->name,
                'nopol_kendaraan'   => $value->nopol_kendaraan,
                'status'    => $value->status
            ];
        }

        $getVehicle = Vehicle::whereIn('id', $getData)->get();
        
        foreach ($getVehicle as $key => $value) {
            $arrayData[]    = [
                'id'    => $value->id,
                'name'  => $value->name . ' ( Sudah Digunakan )',
                'nopol_kendaraan'   => $value->nopol_kendaraan,
                'status'    => $value->status
            ];
        }

        $response   = [
            'message'   => 'Data fetched successfully !',
            'data'      => $arrayData
        ];

        return response()->json($response, 200);
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required'
        ]);
        
        try {
            $file = $request->file('excel');
            $nama_file = date("Ymd").time().rand().$file->getClientOriginalName();
            $file->move('import-excel/customer-order',$nama_file);
    
            $import = new CustomerOrderImport;
    
            Excel::import($import, public_path('/import-excel/customer-order/'. $nama_file));

            $response = [
                'message' => 'Customer Order imported successfully',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            File::delete('import-excel/customer-order/'. $nama_file);
            DB::rollBack();
            dd($th);
            return response()->json(['message' => $th->getMessage()], 422);
        }
    }
}
