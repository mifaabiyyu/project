<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\ModelHasRole;
use App\Models\User;
// use App\Models\Role;
use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::query();

        return DataTables::eloquent($roles)->addIndexColumn()->make(true);
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
            'name' => 'required',
        ]);

        $create = Role::create([
            'name'  => $request->name,
            'guard_name'    => 'web'
        ]);

        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $create->syncPermissions($permissions);
        }


        $response = [
            'message'   => 'Roles successfully created',
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
        $findData = Role::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        $role = array();
        $permission_name = array();

        foreach ($permission_groups as $group) {
            $permissions = User::getpermissionsByGroupName($group->name);
            foreach ($permissions as $permission) {
                array_push($role, $findData->hasPermissionTo($permission->name));
                array_push($permission_name, $permission->name);
            }
        }

        $response = [
            'message'           => 'Data fetched successfully !',
            'data'              => $findData,
            'all_permissions'   => $all_permissions,
            'permission_groups' => $permission_groups,
            'role'              => $role,
            'permission_name'   => $permission_name

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
        $findData = Role::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $request->validate([
            'name' => 'required'
        ]);

        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $findData->syncPermissions($permissions);
        }

        $findData->name = $request->name;
        $findData->save();

        $updated = Role::find($id);

        $response = [
            'message'   => 'Data updated successfully !',
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
        $findData = Role::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $findUserRole = ModelHasRole::where('role_id', $id)->first();
       
        if ($findUserRole) {
            return response()->json(['message' => 'Role has used in User Role !'], 422);
        }

        $findData->delete();

        $response = [
            'message' => 'Roles deleted successfully',
        ];

        return response()->json($response, 200);
    }
}
