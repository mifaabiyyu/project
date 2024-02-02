<?php

namespace App\Http\Controllers;

use App\Models\CustomerLicence;
use App\Models\Quotation;
use App\Models\Sales\Customer;
use App\Models\UserCompany;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            // $getCustomer    = Customer::where('code', auth()->user()->customer_id)->first();

            $users->where('company', auth()->user()->company);
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
            // 'photo' => 'image|max:1024|mimes:jpeg,png,jpg,svg', // 1MB Max
        ]);

        $imageName = null;

        if($request->photo)
        {
          
            $imageName = date("Ymd").time().rand().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/user'), $imageName);
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
            'photo'  => $imageName,
            'roles'  => $request->role,
            'status'    => 0,
            'company'   => $request->company ?? auth()->user()->company,
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

    public function activate($id)
    {
        $id = base64_decode(base64_decode($id));

        $findData   = UserCompany::find($id);

        if (!$findData || Auth::user()->hasRole('Customer')) {
            return response()->json(['message'  => 'Data not found'], 422);
        }
        $findData->update([
            'status'    => 1,
            // 'product_code'  => $values->product_code
        ]);


        return response()->json(['message' => 'User activate successfully !'], 200);
        // $getQuotation   = Quotation::with('get_detail')->where('customer_code', auth()->user()->customer_id)->where('active_end', '>', date('Y-m-d'))->get();

        // foreach ($getQuotation as $key => $value) {
        //     foreach ($value as $keys => $values) {
        //         $getUser    = UserCompany::where('company', auth()->user()->company)->where('product_code', $values->product_code)->count();

        //         if ($getUser < $values->user) {
        //             $findData->update([
        //                 'status'    => 1,
        //                 'product_code'  => $values->product_code
        //             ]);


        //             return response()->json(['message' => 'User activate successfully !'], 200);
        //         }
        //     }
           
        // }

        // return response()->json(['message'  => 'User melebihi batas aktivasi !'], 422);
       

    }

    public function getLicence()
    {
        if (Auth::user()->hasRole('Customer')) {
            $getData    = CustomerLicence::where('customer_code', auth()->user()->customer_id)->get();
        } else {
            $getData    = CustomerLicence::all();
        }

        $response   = [
            'message'   => 'Data fetched successfully !',
            'data'      => $getData 
        ];

        return response()->json($response, 200);
    }

    public function updateLicence(Request $request, $id)
    {
        $id     = base64_decode($id);
        
        $findData = UserCompany::find($id);

        DB::beginTransaction();
        try {
            if (isset($request->licence)) {
                if (!$findData) {
                    return response()->json(['message'  => 'Data not found'], 422);
                }
        
                $checkData  = CustomerLicence::where('code', $request->licence)->first();
                
                if (!$checkData) {
                    return response()->json(['message'  => 'Licence not found'], 422);
                }
        
                if ($checkData->total_licence <= $checkData->total_usage) {
                    return response()->json(['message'  => 'Maaf kuota licence sudah penuh !'], 422);
                }
        
                $checkData->update([
                    'total_usage'   => $checkData->total_usage + 1
                ]);
        
                $findData->update([
                    'status_licence'    => 1,
                    'customer_licence'  => $request->licence
                ]);
                
                DB::commit();
                return response()->json(['message'  => 'Licence applied successfully !'], 200);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message'  => $th->getMessage()], 422);
        }
       
    }

    public function deactivate($id)
    {
        $id = base64_decode(base64_decode($id));

        $findData   = UserCompany::find($id);

        if (!$findData || Auth::user()->hasRole('Customer')) {
            return response()->json(['message'  => 'Data not found'], 422);
        }
        
        $findData->update([
            'status'    => 0,
            // 'product_code'  => $values->product_code
        ]);


        return response()->json(['message' => 'User deactivate successfully !'], 200);

       

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
        // dd($id);
        $findData   = UserCompany::find($id);

        if (!$findData) {
            return response()->json(['message'  => 'Data not found'], 422);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'confirmed', Password::defaults()],
            // 'photo' => 'image|max:1024|mimes:jpeg,png,jpg,svg', // 1MB Max
        ]);

        $imageName = $findData->photo;
   
        if($request->hasFile('photo'))
        {
            if ($imageName != null) {
                unlink("images/user/" . $findData->photo);
            }
            $imageName = date("Ymd").time().rand().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/user'), $imageName);
        }

        $findData->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'roles'     => $request->role,
            'password'  => $request->password,
            'status'    => $request->status,
            'company'   => $request->company ?? auth()->user()->company,
            'phone'     => $request->phone,
            'storage'     => $request->storage,
            'link'      => $request->link,
            'database'     => $request->database,
            'hosting'     => $request->hosting,
            'photo'     => $imageName,
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
