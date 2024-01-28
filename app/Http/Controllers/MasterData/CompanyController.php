<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Company;
use Illuminate\Http\Request;
use DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::query()->with('get_status:id,name,value');

        if ($request->filled('type')) {
            $companies->where('type', $request->type);
        }

        if ($request->filled('status')) {
            $companies->where('status', $request->status);
        }
        // $companies->get();
        return DataTables::eloquent($companies)->make(true);
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
            'name'      => 'required',
            'code'      => 'required|unique:companies,code',
            'type'      => 'required',
            'address'   => 'required',
            'status'    => 'required'
        ]);

        $create = Company::create([
            'code'          => $request->code,
            'name'          => $request->name,
            'type'          => $request->type,
            'address'       => $request->address,
            'description'   => $request->description,
            'no_telfon'     => $request->no_telfon,
            'status'        => $request->status
        ]);

        $response = [
            'message'   => 'Company created successfully !',
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
        $findData = Company::find($id);

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
        $findData = Company::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $request->validate([
            'name'      => 'required',
            'code'      => 'required|unique:companies,code,' . $id,
            'type'      => 'required',
            'address'   => 'required',
            'status'    => 'required'
        ]);

        $findData->update([
            'code'          => $request->code,
            'name'          => $request->name,
            'type'          => $request->type,
            'address'       => $request->address,
            'description'   => $request->description,
            'no_telfon'     => $request->no_telfon,
            'status'        => $request->status
        ]);

        $updated = Company::find($id);

        $response = [
            'message'   => 'Company updated successfully !',
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
        $findData = Company::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $findData->delete();

        $response = [
            'message'   => 'Company deleted successfully !'
        ];
        
        return response()->json($response, 200);
    }
}
