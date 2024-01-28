<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\CustomerReceiveAddress;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData    = CustomerReceiveAddress::all();

        $response   = [
            'message'   => 'Data fetched successfully !',
            'data'      => $getData
        ];

        return response()->json($response, 200);
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
            'customer_id'   => 'required',
            'address'       => 'required',
            'city_id'       => 'required'
        ]);

        $create = CustomerReceiveAddress::create([
            'customer_id'   => $request->customer_id,
            'pic'           => $request->pic,
            'address'       => $request->address,
            'city_id'       => $request->city_id,
            'phone'         => $request->phone
        ]);

        $response = [
            'message'   => 'Customer address created successfully !',
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
        $findData = CustomerReceiveAddress::with('get_city:id,name')->find($id);

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
        $getData    = CustomerReceiveAddress::where('customer_id', $id)->get();

        $response   = [
            'message'   => 'Data fetched successfully !',
            'data'      => $getData
        ];

        return response()->json($response, 200);
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
        $findData = CustomerReceiveAddress::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $request->validate([
            'customer_id'   => 'required',
            'address'       => 'required',
            'city_id'       => 'required'
        ]);

        $findData->update([
            'customer_id'   => $request->customer_id,
            'address'       => $request->address,
            'pic'           => $request->pic,
            'city_id'       => $request->city_id,
            'phone'         => $request->phone
        ]);

        $updated = CustomerReceiveAddress::find($id);

        $response = [
            'message'   => 'Customer address updated successfully !',
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
        $findData = CustomerReceiveAddress::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $findData->delete();

        $response = [
            'message' => 'Customer address deleted successfully'
        ];

        return response()->json($response, 200);
    }
}
