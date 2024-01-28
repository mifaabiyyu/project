<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machine = Machine::query();

        return DataTables::eloquent($machine)->make(true);
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
            'name'      => 'required|unique:machines,name',
            'code'      => 'required|unique:machines,code',
        ]);

        $create = Machine::create([
            'name'      => $request->name,
            'code'      => $request->code,
        ]);

        $response = [
            'message'   => 'Machine created successfully !',
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
        $findData = Machine::find($id);

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
    public function update(Request $request, $id)
    {
        $findData = Machine::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $request->validate([
            'name'      => 'required|unique:machines,name,' . $id,
            'code'      => 'required|unique:machines,code,' . $id,
        ]);

        $findData->update([
            'name'      => $request->name,
            'code'      => $request->code,
        ]);

        $updated = Machine::find($id);

        $response = [
            'message'   => 'Machine updated successfully !',
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
        $findData = Machine::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $findData->delete();

        $response = [
            'message' => 'Machine deleted successfully'
        ];

        return response()->json($response, 200);
    }
}
