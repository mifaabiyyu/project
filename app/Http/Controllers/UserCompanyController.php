<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Sales\Customer;
use App\Models\UserCompany;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\Facades\DataTables;

class UserCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = UserCompany::query();

        if (Auth::user()->hasRole('Customer')) {
            $getCustomer    = Customer::where('code', auth()->user()->company_id)->first();

            $users->where('company', $getCustomer->company);
        }

        if ($request->filled('company')) {
            $users->where('company', $request->company);
        }

        // $users->get();
        
        return DataTables::eloquent($users)->make(true);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            // 'photo' => 'image|max:1024|mimes:jpeg,png,jpg,svg', // 1MB Max
        ]);

        if (Auth::user()->hasRole('Customer')) {
            $getCustomer    = Customer::where('code', auth()->user()->company_id)->first();
            $countUser      = 0;
            $getQuotation   = Quotation::with('get_detail')->where('customer_code', $getCustomer->code)->where('active_end', '>', date('Y-m-d'))->get();

            foreach ($getQuotation as $key => $value) {
                $countUser += $value->get_product->user;
            }

            $getUser        = UserCompany::where('company', auth()->user()->company_id)->count();

            if($getUser >= $countUser) {
                return response()->json(['message' => 'User melebihi limit !'], 422);
            }
        }


        $codeCust = IdGenerator::generate([
            'table' => (new UserCompany())->getTable(),
            'field' => 'code',
            'length' => 10,
            'prefix' => 'USR-',
            'reset_on_prefix_change' => true
        ]);

        $user = UserCompany::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
            'status'    => $request->status,
            'company'   => $request->company,
            'phone'     => $request->phone,
            'position'  => $request->position,
            'code'      => $codeCust,
        ]); 

        $response = [
            'message'   => 'Data created successfully !',
            'data'      => $user
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
        $id     = base64_decode($id);
        $findData   = UserCompany::find($id);

        if (!$findData) {
            return response()->json(['message'  => 'Data not found'], 422);
        }

        $response = [
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
    public function update(Request $request, $id)
    {
        $id     = base64_decode($id);
        $findData   = UserCompany::find($id);

        if (!$findData) {
            return response()->json(['message'  => 'Data not found'], 422);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            // 'photo' => 'image|max:1024|mimes:jpeg,png,jpg,svg', // 1MB Max
        ]);

        $findData->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
            'status'    => $request->status,
            'company'   => $request->company,
            'phone'     => $request->phone,
            'position'  => $request->position,
        ]); 

        $response = [
            'message'   => 'Data updated successfully !',
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
        $id     = base64_decode($id);
        $findData   = UserCompany::find($id);

        if (!$findData) {
            return response()->json(['message'  => 'Data not found'], 422);
        }

        $findData->delete();

        $response = [
            'message'   => 'Data deleted successfully !',
        ];
      
        return response()->json($response, 200);
    }
}
