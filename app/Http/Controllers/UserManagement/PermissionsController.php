<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DataTables;
use Illuminate\Support\Facades\DB;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::query()->groupBy('group_name');

        return DataTables::eloquent($permissions)->addIndexColumn()->make(true);
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
            'group_name' => 'required',
        ]);
        
        try {
            DB::beginTransaction();

            foreach ($request->crud as $value) {
                Permission::create([
                    'group_name'    => $request->group_name,
                    'name'          => $request->group_name .'.'. $value
                ]);
            }
    
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => 'Error ! Permissions not created '], 400);
        }
        
        DB::commit();

        $response = [
            'message'   => 'Permissions successfully created',
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
    public function destroy($group_name)
    {
        $findData = Permission::where('group_name', $group_name)->get();

        if (!$findData) {
            return response()->json(['message' => 'Data not Found '], 400);
        }
        
        $findData->each->delete();

        return response()->json(['message' => 'Permissions deleted successfully '], 200);
    }
}
