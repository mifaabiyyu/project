<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Logistik\Delivery;
use App\Models\MasterData\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::query()->with('get_status');

        return DataTables::eloquent($vehicles)->make(true);
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
            'nopol_kendaraan'   => 'required|unique:vehicles,nopol_kendaraan',
            'name'              => 'required',
            'type_vehicle'      => 'required',
            'status'            => 'required',
        ]);

        $imageName = null;
     
        if($request->hasFile('stnk'))
        {
          
            $imageName = date("Ymd").time().rand().'.'.$request->stnk->extension();  
            $request->stnk->move(public_path('images/vehicle'), $imageName);
        }

        $create     = Vehicle::create([
            'nopol_kendaraan'   => $request->nopol_kendaraan,
            'name'              => $request->name,
            'type_vehicle'      => $request->type_vehicle,
            'nomor_mesin'       => $request->nomor_mesin,
            'nomor_rangka'      => $request->nomor_rangka,
            'tahun_pembuatan'   => $request->tahun_pembuatan,
            'stnk'              => $imageName,
            'stnk_lifetime'     => $request->stnk_lifetime,
            'status'            => $request->status
        ]);

        $response   = [
            'message'       => 'Vehicle created successfully !',
            'data'          => $create
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
        $findData = Vehicle::with('get_status')->find($id);

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
        $findData       = Vehicle::find($id);

        if (!$findData) {
            return response()->json(['message'  => 'Data not found !'], 422);
        }

        $request->validate([
            'nopol_kendaraan'   => 'required|unique:vehicles,nopol_kendaraan,' . $id,
            'name'              => 'required',
            'type_vehicle'      => 'required',
            'status'            => 'required',
        ]);

        $imageName = $findData->stnk;

        if($request->hasFile('stnk'))
        {
            if ($imageName != null) {
                unlink("images/vehicle/" . $findData->stnk);
            }

            $imageName = date("Ymd").time().rand().'.'.$request->stnk->extension();  
            $request->stnk->move(public_path('images/vehicle'), $imageName);
        }

        $findData->update([
            'nopol_kendaraan'   => $request->nopol_kendaraan,
            'name'              => $request->name,
            'type_vehicle'      => $request->type_vehicle,
            'nomor_mesin'       => $request->nomor_mesin,
            'nomor_rangka'      => $request->nomor_rangka,
            'tahun_pembuatan'   => $request->tahun_pembuatan,
            'stnk'              => $imageName,
            'stnk_lifetime'     => $request->stnk_lifetime,
            'status'            => $request->status
        ]);

        $updated       = Vehicle::find($id);

        $response   = [
            'message'       => 'Vehicle updated successfully !',
            'data'          => $updated
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
        $findData = Vehicle::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $findData->delete();

        $response = [
            'message' => 'Vehicle deleted successfully'
        ];

        return response()->json($response, 200);
    }

    public function getHistory($id)
    {
        $getData    = Vehicle::with(['get_delivery' => function ($query) {
            $query->with('get_customer:id,name');
        }])->where('id', $id)->select('vehicles.*')->first();

        $response   = [
            'message'   => 'Data fetched successfully !',
            'data'      => $getData
        ];

        return response()->json($response, 200);
    }
}
