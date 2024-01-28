<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Product;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use App\Models\Sales\Customer;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\Checkout\CheckoutService as Service;
use Yajra\DataTables\Facades\DataTables;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData    = Quotation::query()->with('get_status');

        return DataTables::eloquent($getData)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $service = new Service();
        $code = base64_decode($request->lastsegment);


        $findData = Quotation::where('code', $code)->first();
        if (!$findData) {
            abort(404);
        }

        $xenditData = [
            "currency" => "IDR",
            'code'      => $code,
            "amount" => $findData->total,
            "redirect_url" => "http://127.0.0.1:8000/try-checkout"
        ];

        return $service->createInvoice($xenditData);
    }

    public function checkout($code)
    {
        $oldCode = $code;
        $code = base64_decode($code);

        $findData = Quotation::with('get_customer')->where('code', $code)->first();

        if (!$findData) {
            abort(404);
        }

        $data = [
            'data'  => $findData,
            'params'=> $oldCode
        ];

        return view('livewire.checkout-components', $data);
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
            'expiry_date'   => 'required',
            "qty.*"  => "required",
            "unit_price.*"  => "required",
            "product.*"  => "required",
        ],
        [
            'product.*.required' => 'Please insert valid value !',
            'qty.*.required' => 'Please insert valid value !',
            'unit_price.*.required' => 'Please insert valid value !'
        ]);

        DB::beginTransaction();
        $totalAll = 0;

        $codeQuote = IdGenerator::generate([
            'table' => (new Quotation())->getTable(),
            'field' => 'code',
            'length' => 7,
            'prefix' => 'SQ-',
            'reset_on_prefix_change' => true
        ]);

        try {
            foreach ($request->product as $key => $value) {
                $totalAll += $request->total_price[$key];
            }

            $findCust   = Customer::find($request->customer);
            $custName   = '';
            $custCode   = '';

            if ($findCust) {
                $custName   = $findCust->name;
                $custCode   = $findCust->code;
            }
            $create = Quotation::create([
                'code'          => $codeQuote,
                'customer_code' => $custCode,
                'customer_name' => $custName,
                'date'          => date('Y-m-d H:i:s'),
                'valid_until'   => $request->expiry_date,
                'total'         => $totalAll,
                'notes'         => $request->notes,
                'created_by'    => auth()->user()->id,
                'status'        => $request->status,
            ]);

            foreach ($request->product as $key => $value) {
                $findProduct    = Product::find($request->product[$key]);

                if (!$findProduct) {
                    return response()->json(['message'  => 'Error Product !'], 422);
                }

                QuotationDetail::create([
                    'quotation_code'    => $codeQuote,
                    'product_code'      => $findProduct->code,
                    'product_name'      => $findProduct->name,
                    'qty'               => $request->qty[$key],
                    'unit_price'        => $request->unit_price[$key],
                    'total_price'       => $request->total_price[$key],
                ]);
            }
            DB::commit();

            $response   = [
                'message'   => 'Quotation created successfully !',
                'data'      => $codeQuote
            ];

            return response()->json($response, 200);
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollBack();
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
