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
use App\Models\CustomerLicence;
use App\Models\MasterData\BusinessType;
use App\Models\MasterData\Parameter;
use App\Models\User;
use App\Models\UserCompany;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Yajra\DataTables\Facades\DataTables;
use Xendit\Xendit;

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

        if (Auth::user()->hasRole('Customer')) {
            $getData->where('customer_code', auth()->user()->customer_id);
        }

        return DataTables::eloquent($getData)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'email'         => 'required|sometimes',
            // 'nama_depan'    => 'required',
            'username'      => 'required|sometimes',
            'password'      => 'required|confirmed|sometimes',
            'whatsapp'      => 'required|sometimes',
            'alamat'        => 'required|sometimes',
            'company'       => 'required|sometimes',
            // 'business_type' => 'required',
        ]);
    
        $service = new Service();
        $code = base64_decode($request->params);
        // dd($code);
        $findData = Quotation::where('code', $code)->first();
      
        $date1 = new DateTime($findData->valid_until);
        $date2 = new DateTime();

        if (!$findData || $date1 < $date2) {
            abort(404);
        }

        if ($findData->status == 5) {
            $getParamPhone = Parameter::where('code', 'whatsappPhone')->first();

            if (!$getParamPhone) {
                $getParamPhone = Parameter::create([
                    'code'  => 'whatsappPhone',
                    'name'  => 'Nomor WhatsApp',
                    'value' => '6281515141186'
                ]);
            }

            $getParamText = Parameter::where('code', 'whatsappText')->first();

            
            if (!$getParamText) {
                $getParamText = Parameter::create([
                    'code'  => 'whatsappText',
                    'name'  => 'Text WhatsApp',
                    'value' => 'Saya telah melakukan pembayaran dengan nomor Invoice ...'
                ]);
            }

            $linkWa  = 'https://api.whatsapp.com/send/?phone='. $getParamPhone .'&text='. $getParamText . ' ' . $findData->code;

            return view('livewire.pages.success', compact('linkWa'));
        }

        DB::beginTransaction();
        try {
            $checkCustomer  = Customer::where('email', $request->email)->first();
            
            if (!$checkCustomer) {
                $checkCustomer  = Customer::where('phone', $request->whatsapp)->first();
            }

            if (!$checkCustomer) {
                $codeCust = IdGenerator::generate([
                    'table' => (new Customer())->getTable(),
                    'field' => 'code',
                    'length' => 10,
                    'prefix' => 'CUST-',
                    'reset_on_prefix_change' => true
                ]);

                
                $checkCustomer = Customer::create([
                    'name'  => $request->username,
                    'code'  => $codeCust,
                    'email' => $request->email,
                    'companies' => $request->company,
                    'phone' => $request->whatsapp,
                    'business_type' => $request->business_type
                ]);
            }

            $checkUser  = User::where('email', $request->email)->first();

            if(!$checkUser) {
                $createUser = User::create([
                    'name'  => $request->username,
                    'email' => $request->email,
                    'status'=> 1,
                    'password'  =>Hash::make($request->password),
                    'customer_id' => $checkCustomer->code,
                    'company'   => $request->company
                ]);

                $createUser->assignRole('Customer');
            }

            $xenditData = [
                "currency" => "IDR",
                'code'      => $code,
                "amount" => $findData->total,
                // "redirect_url" => route('success')
            ];
            
            $xendit = $service->createInvoice($xenditData);

            $findData->update([
                'customer_code' => $checkCustomer->code,
                'customer_name' => $checkCustomer->name,
                'xendit_id'     => $xendit['id'],
                'xendit_user_id'=> $xendit['user_id'],
            ]);

           

            DB::commit();

            return $xendit;
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 422);
        }


      
    }
    
    public function createBackup(Request $request)
    {
        // dd($request);
        $request->validate([
            'email'         => 'required',
            // 'nama_depan'    => 'required',
            'username'      => 'required',
            'password'      => 'required|confirmed',
            'whatsapp'      => 'required',
            'alamat'        => 'required',
            'company'       => 'required',
            // 'business_type' => 'required',
        ]);
    
        $service = new Service();
        $code = base64_decode($request->params);
        // dd($code);
        $findData = Quotation::where('code', $code)->first();
      
        $date1 = new DateTime($findData->valid_until);
        $date2 = new DateTime();

        if (!$findData || $date1 < $date2) {
            abort(404);
        }

        if ($findData->status == 5) {
            $getParamPhone = Parameter::where('code', 'whatsappPhone')->first();

            if (!$getParamPhone) {
                $getParamPhone = Parameter::create([
                    'code'  => 'whatsappPhone',
                    'name'  => 'Nomor WhatsApp',
                    'value' => '6281515141186'
                ]);
            }

            $getParamText = Parameter::where('code', 'whatsappText')->first();

            
            if (!$getParamText) {
                $getParamText = Parameter::create([
                    'code'  => 'whatsappText',
                    'name'  => 'Text WhatsApp',
                    'value' => 'Saya telah melakukan pembayaran dengan nomor Invoice ...'
                ]);
            }

            $linkWa  = 'https://api.whatsapp.com/send/?phone='. $getParamPhone .'&text='. $getParamText . ' ' . $findData->code;

            return view('livewire.pages.success', compact('linkWa'));
        }

        DB::beginTransaction();
        try {
            $checkCustomer  = Customer::where('email', $request->email)->first();
            
            if (!$checkCustomer) {
                $checkCustomer  = Customer::where('phone', $request->whatsapp)->first();
            }

            if (!$checkCustomer) {
                $codeCust = IdGenerator::generate([
                    'table' => (new Customer())->getTable(),
                    'field' => 'code',
                    'length' => 10,
                    'prefix' => 'CUST-',
                    'reset_on_prefix_change' => true
                ]);

                
                $checkCustomer = Customer::create([
                    'name'  => $request->username,
                    'code'  => $codeCust,
                    'email' => $request->email,
                    'companies' => $request->company,
                    'phone' => $request->whatsapp,
                    'business_type' => $request->business_type
                ]);
            }

            $checkUser  = User::where('email', $request->email)->first();

            if(!$checkUser) {
                $createUser = User::create([
                    'name'  => $request->username,
                    'email' => $request->email,
                    'status'=> 1,
                    'password'  =>Hash::make($request->password),
                    'customer_id' => $checkCustomer->code,
                    'company'   => $request->company
                ]);

                $createUser->assignRole('Customer');
            }

            $xenditData = [
                "currency" => "IDR",
                'code'      => $code,
                "amount" => $findData->total,
                // "redirect_url" => route('success')
            ];
            
            $findData->update([
                'customer_code' => $checkCustomer->code,
                'customer_name' => $checkCustomer->name,
            ]);

            DB::commit();

            return $service->createInvoice($xenditData);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 422);
        }

      
    }

    public function successPayment($code)
    {
        $code = base64_decode(base64_decode($code));
        $findData = Quotation::where('code', $code)->first();
        $apiKey     = Parameter::where('code', 'xendit')->first();
        Xendit::setApiKey($apiKey->value);
        
        
        if (!$findData) {
            abort(404);
        }

        $checkXendit = \Xendit\Invoice::retrieve($findData->xendit_id);
        // dd($checkXendit);

        $findData->update([
            'status'    => 5,
            'payment_method'    => $checkXendit['payment_method'],
            'bank_code'    => $checkXendit['payment_channel'],
            'paid_at'   => date('Y-m-d H:i:s')
        ]);

        $findCustomerLicence = CustomerLicence::where('customer_code', $findData->customer_code)->first();

        $sumLicence     = QuotationDetail::where('quotation_code', $code)->sum('user');
        if (!$findCustomerLicence) {
            
            $getUser    = UserCompany::where('company', $findData->get_customer?->companies)->count();
            CustomerLicence::create([
                'customer_code' => $findData->customer_code,
                'code'          => 'Licence ' . $findData->customer_name,
                'total_licence' => $sumLicence,
                'total_usage'   => $getUser
            ]);
        } else {
            $licenceNow     = $findCustomerLicence->total_licence;
            $findCustomerLicence->update([
                'total_licence' => $licenceNow + $sumLicence
            ]);
        }

        $getParamPhone = Parameter::where('code', 'whatsappPhone')->first();
        
        if (!$getParamPhone) {
            $getParamPhone = Parameter::create([
                'code'  => 'whatsappPhone',
                'name'  => 'Nomor WhatsApp',
                'value' => '6281515141186'
            ]);
        }

        $getParamText = Parameter::where('code', 'whatsappText')->first();

        
        if (!$getParamText) {
            $getParamText = Parameter::create([
                'code'  => 'whatsappText',
                'name'  => 'Text WhatsApp',
                'value' => 'Saya telah melakukan pembayaran dengan nomor Invoice ...'
            ]);
        }

        $linkWa  = 'https://api.whatsapp.com/send/?phone='. $getParamPhone->value .'&text='. $getParamText->value ;
        // dd($linkWa);
        return view('livewire.pages.success', compact('linkWa'));
    }

    public function BackupsuccessPayment($code)
    {
        $code = base64_decode(base64_decode($code));
        $findData = Quotation::where('code', $code)->first();

        if (!$findData) {
            abort(404);
        }

        $findData->update([
            'status'    => 5,
            'paid_at'   => date('Y-m-d H:i:s')
        ]);
        
        return response()->json(['message'  => 'Pembayaran berhasil !'], 200);

    }

    public function failPayment($code)
    {

        return view('livewire.pages.failed');
    }

    public function checkout($code)
    {
        $oldCode = $code;
        $code = base64_decode($code);

        $findData = Quotation::with('get_customer')->where('code', $code)->first();
        
        $date1 = new DateTime($findData->valid_until);
        $date2 = new DateTime();

        if (!$findData || $date1 < $date2) {
            abort(404);
        }

        if ($findData->status == 5) {
            $getParamPhone = Parameter::where('code', 'whatsappPhone')->first();
        
            if (!$getParamPhone) {
                $getParamPhone = Parameter::create([
                    'code'  => 'whatsappPhone',
                    'name'  => 'Nomor WhatsApp',
                    'value' => '6281515141186'
                ]);
            }
    
            $getParamText = Parameter::where('code', 'whatsappText')->first();
    
            
            if (!$getParamText) {
                $getParamText = Parameter::create([
                    'code'  => 'whatsappText',
                    'name'  => 'Text WhatsApp',
                    'value' => 'Saya telah melakukan pembayaran dengan nomor Invoice ...'
                ]);
            }
    
            $linkWa  = 'https://api.whatsapp.com/send/?phone='. $getParamPhone->value .'&text='. $getParamText->value . ' ' . $findData->code ;
            // dd($linkWa);
            return view('livewire.pages.success', compact('linkWa'));
        }

        $service = new Service();


        $xenditData = [
            "currency" => "IDR",
            'code'      => $findData->code,
            "amount" => $findData->total,
            // "redirect_url" => route('success')
        ];

        // $xenditUrl = $service->createInvoice($xenditData);
 
        $businessType = BusinessType::all();


        $data = [
            'data'          => $findData,
            'params'        => $oldCode,
            'businessType'  => $businessType,
            // 'xenditUrl'  => $xenditUrl['invoice_url'],
        ];
        
        // $findData->update([
        //     'xendit_id' => $xenditUrl['id'],
        //     'xendit_user_id' => $xenditUrl['user_id'],
        // ]);

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
            'length' => 8,
            'prefix' => 'INV-',
            'reset_on_prefix_change' => true
        ]);

        try {
            foreach ($request->product as $key => $value) {
                $totalAll += (int)preg_replace('/[. ]/','',$request->total_price[$key]);
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
                'active_start'        => $request->active_start,
                'active_end'        => $request->active_end,
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
                    'user'              => $findProduct->user,
                    'qty'               => $request->qty[$key],
                    'unit_price'        => (int)preg_replace('/[. ]/','',$request->unit_price[$key]),
                    'total_price'       => (int)preg_replace('/[. ]/','',$request->total_price[$key]),
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
        $code     = base64_decode($id);

        $findData   = Quotation::where('code', $code)->first();

        if(!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        DB::beginTransaction();
        $totalAll = 0;

        try {
            foreach ($request->product as $key => $value) {
                $totalAll += (int)preg_replace('/[. ]/','',$request->total_price[$key]);
            }

            $findCust   = Customer::find($request->customer);
            $custName   = '';
            $custCode   = '';

            if ($findCust) {
                $custName   = $findCust->name;
                $custCode   = $findCust->code;
            }
            $findData->update([
                'customer_code' => $custCode,
                'customer_name' => $custName,
                'date'          => date('Y-m-d H:i:s'),
                'valid_until'   => $request->expiry_date,
                'total'         => $totalAll,
                'notes'         => $request->notes,
                'status'        => $request->status,
                'active_start'        => $request->active_start,
                'active_end'        => $request->active_end,
            ]);

            $findDetail = QuotationDetail::where('quotation_code', $code)->get();

            $findDetail->each->delete();

            foreach ($request->product as $key => $value) {
                $findProduct    = Product::find($request->product[$key]);

                if (!$findProduct) {
                    return response()->json(['message'  => 'Error Product !'], 422);
                }

                QuotationDetail::create([
                    'quotation_code'    => $code,
                    'product_code'      => $findProduct->code,
                    'product_name'      => $findProduct->name,
                    'qty'               => $request->qty[$key],
                    'unit_price'        => (int)preg_replace('/[. ]/','',$request->unit_price[$key]),
                    'total_price'       => (int)preg_replace('/[. ]/','',$request->total_price[$key]),
                ]);
            }
            DB::commit();

            $response   = [
                'message'   => 'Quotation updated successfully !',
                'data'      => $code
            ];

            return response()->json($response, 200);
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = base64_decode($id);

        $findData = Quotation::where('code', $code)->first();

        if(!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        if($findData->status == 5) {
            return response()->json(['message' => 'Data already paid, cannot delete !'], 422);
        }

        try {
            $findData->get_detail->each->delete();

            $findData->delete();

            return response()->json(['message'  => 'Data deleted successfully !'], 200);
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 422);
        }
        
       
    }
}
