<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\Sales\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()->with('get_roles:role_id,model_id');

        if (Auth::user()->hasRole('Customer')) {
            $getCustomer    = Customer::where('code', auth()->user()->company_id)->first();

            $users->where('company', $getCustomer->company);
        }
        
        if ($request->filled('role')) {
            $users->whereHas('get_roles', function ($query) use($request) {
                return $query->where('role_id', '=', $request->role);
            });
        }

        if ($request->filled('status')) {
            $users->where('status', $request->status);
        }

        // $users->get();
        
        return DataTables::eloquent($users)->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            // 'photo' => 'image|max:1024|mimes:jpeg,png,jpg,svg', // 1MB Max
            'roles' => 'required'
        ]);

       
        $imageName = null;

        if($request->photo)
        {
          
            $imageName = date("Ymd").time().rand().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/user'), $imageName);
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'photo'     => $imageName,
            'status'    => $request->status,
            'customer_id'=> $request->customer_id

        ]); 

        $user->assignRole($request->roles);

        $response = [
            'message'   => 'Data created successfully !',
            'data'      => $user
        ];
      
        return response()->json($response, 200);
    }

    public function show($id)
    {
        $findData = User::with('get_roles')->find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data Not Found !'], 422);
        }

        $response = [
            'message'   => 'Data successfully fetched !',
            'data'      => $findData
        ];

        return response()->json($response, 200);
    }

    public function update(Request $request, $id)
    {
        $findData = User::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data Not Found !'], 404);
        }

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            // 'photo' => 'max:1024', // 1MB Max
            'roles' => 'required'
        ]);

        if ($request->password) {
            $validate['password'] = ['confirmed', Password::defaults()];
        }

        $imageName = $findData->photo;
   
        if($request->hasFile('photo'))
        {
            $file = public_path('images/user/') . $findData->photo;
            if ($imageName != null) {
                if (file_exists($file)) {
                    unlink("images/user/" . $findData->photo);
                }
            }
            $imageName = date("Ymd").time().rand().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/user'), $imageName);
        }

        $findData->name = $request->name;
        $findData->email = $request->email;
        $findData->photo = $imageName;
        $findData->status = $request->status;
        $findData->customer_id = $request->customer_id;

        if ($request->password) {
            $findData->password = Hash::make($request->password);
        }
      
        $findData->save();

        $updated = User::find($id);

        if ($request->roles) {
            $updated->syncRoles([]);
    
            $updated->assignRole($request->roles);
        }

        $response = [
            'message'   => 'Data updated successfully !',
            'data'      => $updated
        ];
    
        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $findData = User::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data Not Found !'], 404);
        }
        $file = public_path('images/user/') . $findData->photo;

        if (file_exists($file)) {
            @unlink($file);
        }

        $findData->delete();

        return response()->json(['message' => 'Data deleted successfully !'], 200);

    }
    
}
