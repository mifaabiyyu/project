<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Imports\CustomerAddressImport;
use App\Imports\CustomerImport;
use App\Models\MasterData\City;
use App\Models\MasterData\NpwpMaster;
use App\Models\Sales\Customer;
use App\Models\Sales\CustomerOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::query()->with('get_status:id,name,value')->orderBy('created_at', 'desc');


        if ($request->filled('status')) {
            $customers->where('status', $request->status);
        }

        return DataTables::eloquent($customers)->make(true);
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
            'name'          => 'required',
            // 'code'          => 'required|unique:customers,code',
            // 'address'       => 'required',
            // 'company_id1'    => 'required',
            // 'npwp_image'    => 'max:1024|mimes:jpeg,png,jpg,svg,pdf', // 1MB Max
            // 'nik_image'     => 'max:1024|mimes:jpeg,png,jpg,svg,pdf', // 1MB Max
            // 'city'          => 'required',
            'email'         => 'required|email'
        ]);

        // $npwpArray      = explode("-", $request->npwp);
        // $getKppNPWP     = explode('.', $npwpArray[1]);
        
        // $findCityNPWP   = NpwpMaster::where('npwp_number', $getKppNPWP[0])->first();
        // if (!$findCityNPWP) {
        //     return response()->json(['message' => 'Kota tidak ditemukan NPWP'], 422);
        // }
        // $npwp_image = null;
        // $nik_image = null;
  

        // if ($findCityNPWP->city_id != $request->city) {
        //     return response()->json(['message' => 'Nomor NPWP tidak sesuai dengan Alamat Kota'], 422);
        // }

        if($request->npwp_image)
        {
            $npwp_image = date("Ymd").time().rand().'.'.$request->npwp_image->extension();  
            $request->npwp_image->move(public_path('images/customer/data_file'), $npwp_image);
        }

        // if($request->nik_image)
        // {
        //     $nik_image = date("Ymd").time().rand().'.'.$request->nik_image->extension();  
        //     $request->nik_image->move(public_path('images/customer/data_file'), $nik_image);
        // }
        $codeCust = IdGenerator::generate([
            'table' => (new Customer())->getTable(),
            'field' => 'code',
            'length' => 10,
            'prefix' => 'CUST-',
            'reset_on_prefix_change' => true
        ]);


        $create = Customer::create([
            'name'              => $request->name,
            'code'              => $codeCust,
            'address'           => $request->address,
            'company_id'        => 1,
            // 'npwp_image'        => $npwp_image,
            // 'nik_image'         => $nik_image,
            'city'              => $request->city,
            'npwp'              => $request->npwp,
            'nik'               => $request->nik,
            'email'             => $request->email,
            'phone'             => $request->phone,
            // 'fax'               => $request->fax,
            'business_area'     => $request->business_area,
            'warehouse_address' => $request->warehouse_address,
            'status'            => $request->status,
            'pic'               => $request->pic,
            'pic_position'      => $request->pic_position,
            'pic_phone'         => $request->pic_phone,
        ]); 

        $response = [
            'message'   => 'Customer created successfully !',
            'data'      => $create
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findData = Customer::with('get_city:id,name')->find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $response = [
            'message' => 'Data fetched successfully !',
            'data'     => $findData
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
        $findData = Customer::where('code', $code)->first();

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $request->validate([
            'name'          => 'required',
            'code'          => 'required|unique:customers,code,' . $findData->id,
            'address'       => 'required',
            'company_id1'   => 'required',
            'npwp_image'    => 'max:1024|mimes:jpeg,png,jpg,svg,pdf', // 1MB Max
            'nik_image'     => 'max:1024|mimes:jpeg,png,jpg,svg,pdf', // 1MB Max
            'city'          => 'required',
            'npwp'          => 'required',
            'email'         => 'required|email'
        ]);

        $npwpArray      = explode("-", $request->npwp);
        $getKppNPWP     = explode('.', $npwpArray[1]);

        $npwp_image = $request->npwp_image;
        $nik_image = $request->nik_image;

        $findCityNPWP   = NpwpMaster::where('npwp_number', $getKppNPWP[0])->first();
        if (!$findCityNPWP) {
            return response()->json(['message' => 'Kota tidak ditemukan NPWP'], 422);
        }

        if ($findCityNPWP->city_id != $request->city) {
            return response()->json(['message' => 'Nomor NPWP tidak sesuai dengan Alamat Kota'], 422);
        }

        if($request->hasFile('npwp_image'))
        {
            if ($findData->npwp_image != null) {
                unlink("images/customer/data_file/" . $findData->npwp_image);
            }

            $npwp_image = date("Ymd").time().rand().'.'.$request->npwp_image->extension();  
            $request->npwp_image->move(public_path('images/customer/data_file'), $npwp_image);
        }

        if($request->hasFile('nik_image'))
        {
            if ($findData->nik_image != null) {
                unlink("images/customer/data_file/" . $findData->nik_image);
            }

            $nik_image = date("Ymd").time().rand().'.'.$request->nik_image->extension();  
            $request->nik_image->move(public_path('images/customer/data_file'), $nik_image);
        }

       $findData->update([
            'name'              => $request->name,
            'code'              => $request->code,
            'address'           => $request->address,
            'company_id'        => $request->company_id1,
            'npwp_image'        => $npwp_image,
            'nik_image'         => $nik_image,
            'city'              => $request->city,
            'npwp'              => $request->npwp,
            'nik'               => $request->nik,
            'credit'            => $request->credit,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'fax'               => $request->fax,
            'business_area'     => $request->business_area,
            'warehouse_address' => $request->warehouse_address,
            'status'            => $request->status,
            'pic'               => $request->pic,
            'pic_position'      => $request->pic_position,
            'pic_phone'         => $request->pic_phone,
            'created_by'        => auth()->id()
        ]); 

        $updated = Customer::where('code', $code)->first();

        $response = [
            'message'   => 'Customer updated successfully !',
            'data'      => $updated
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
        $findData = Customer::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data Not Found !'], 404);
        }

        $fileNpwp = public_path('images/customer/data_file') . $findData->npwp_image;
        $fileNik = public_path('images/customer/data_file') . $findData->nik_image;

        if (file_exists($fileNpwp)) {
            @unlink($fileNpwp);
        }

        if (file_exists($fileNik)) {
            @unlink($fileNik);
        }

        $findData->delete();

        return response()->json(['message' => 'Data deleted successfully !'], 200);
    }

    public function customerOrderData(Request $request, $id)
    {
        $customerOrders = CustomerOrder::query()->with('get_status:id,name,value', 'get_customer:id,name')->where('customer_id', $id)->orderBy('created_at', 'desc');

        
        if ($request->filled('date')){
            $date = explode('-', $request->date);
            $start = date('Y-m-d', strtotime($date[0]));
            $end = date('Y-m-d', strtotime($date[1]));
            $customerOrders->whereBetween('created_at', [$start ." 00:00:00", $end ." 23:59:59"]);
        }

        return DataTables::eloquent($customerOrders)->make(true);
    }

    public function getStatisticCustomer(Request $request, $id)
    {
        $yearData = [];
        $arrayData = [];
        // dd($request);
        if ($request->filled('date')) {
            $year   = date('Y');
            $date   = $request->date;
            if ($date == 'all') {
                $getData    = CustomerOrder::select("id" , DB::raw("(sum(total_price)) as total_price"), DB::raw("DATE_FORMAT(created_at, '%m-%Y') month_year"),  DB::raw('YEAR(created_at) year, monthname(created_at) month'))
                ->where('customer_id', $id)->orderBy('created_at', 'asc')->groupby('year','month')
                ->get();
                
                foreach ($getData as $key => $value) {
                    $yearData[]     = $value->year;
                    $arrayData[]    = $value;
                }

            } else {
                $getData    = CustomerOrder::select("id" , DB::raw("(sum(total_price)) as total_price"), DB::raw("DATE_FORMAT(created_at, '%m-%Y') month_year"),  DB::raw('YEAR(created_at) year, monthname(created_at) month'))
                ->where('customer_id', $id)->orderBy('created_at', 'asc')->whereBetween('created_at', [$date . '-01-01' . ' 00:00:00' , $year . '-12-31' . ' 23:59:59' ])->groupby('year','month')
                ->get();
                // dd($getData);
                foreach ($getData as $key => $value) {
                    $yearData[]     = $value->year;
                    $arrayData[]    = $value;
                }

            }

            // dd($getData);

        } else {
            $year   = date('Y');
            // $date   = '2021';
            $getData    = CustomerOrder::select("id" , DB::raw("(sum(total_price)) as total_price"), DB::raw("DATE_FORMAT(created_at, '%m-%Y') month_year"),  DB::raw('YEAR(created_at) year, monthname(created_at) month'))
            ->where('customer_id', $id)->orderBy('created_at', 'asc')->whereBetween('created_at', [$year . '-01-01' . ' 00:00:00' , $year . '-12-31' . ' 23:59:59' ])->groupby('year','month')
            ->get();

            foreach ($getData as $key => $value) {
                $yearData[]     = $value->year;
                $arrayData[]    = $value;
            }
        }

        $response = [
            'message'   => 'Data fetched successfully',
            'year'      => array_unique($yearData),
            'data'      => $arrayData
        ];
        return response()->json($response, 200);
    }

    public function getStatisticCustomerProduct(Request $request, $id)
    {
        $yearData = [];
        $arrayData = [];
        // dd($request);
        if ($request->filled('date')) {
            $date = explode('-', $request->date);
            $start = date('Y-m-d', strtotime($date[0]));
            $end = date('Y-m-d', strtotime($date[1]));
            $getData    = CustomerOrder::with('get_order_details')
                ->where('customer_id', $id)->whereBetween('created_at', [$start ." 00:00:00", $end ." 23:59:59"])
                ->orderBy('created_at', 'asc')
                ->get();
        

        } else {
            // $date   = '2021';
            $getData    = CustomerOrder::with('get_order_details')
            ->where('customer_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();
        }
   

        foreach ($getData as $key => $value) {
            foreach ($value->get_order_details as $key => $values) {
                // dd($values);
                if (!empty($arrayData[$values->get_product->name])) {
                    $arrayData[$values->get_product->name]   = $arrayData[$values->get_product->name] + $values->qty;
                } else {
                    $arrayData[$values->get_product->name]   = $values->qty;
                }
            }
        }
    
        $response = [
            'message'   => 'Data fetched successfully',
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
            $file->move('import-excel/customer',$nama_file);
    
            $import = new CustomerImport;
    
            Excel::import($import, public_path('/import-excel/customer/'. $nama_file));

            $response = [
                'message' => 'Customer imported successfully',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            File::delete('import-excel/customer/'. $nama_file);
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 422);
        }
    }

    public function importAddress(Request $request)
    {
        $request->validate([
            'excel' => 'required'
        ]);
        
        try {
            $file = $request->file('excel');
            $nama_file = date("Ymd").time().rand().$file->getClientOriginalName();
            $file->move('import-excel/customer',$nama_file);
    
            $import = new CustomerAddressImport;
    
            Excel::import($import, public_path('/import-excel/customer/'. $nama_file));

            $response = [
                'message' => 'Customer Address imported successfully',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            File::delete('import-excel/customer/'. $nama_file);
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 422);
        }
    }
}
