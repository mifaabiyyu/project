<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\CustomerCard;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerCard   = CustomerCard::query()->with('get_customer', 'get_product')->select('customer_cards.*')->orderBy('created_at', 'desc');

        return DataTables::eloquent($customerCard)->make(true);
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
            'customer'  => 'required',
            'product'   => 'required'
        ]);

        $create     = CustomerCard::create([
            'customer_id'   => $request->customer,
            'product_id'    => $request->product,
            'ssa'           => $request->ssa,
            'd_50'          => $request->d_50,
            'd_98'          => $request->d_98,
            'cie_86'        => $request->cie_86,
            'iso_2470'      => $request->iso_2470,
            'moisture'      => $request->moisture,
            'residue'       => $request->residue,
            'description'   => $request->description,
        ]);

        $response   = [
            'message'   => 'Customer card created successfully !',
            'data'      => $create
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findData = CustomerCard::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data Not Found !'], 422);
        }

        $response = [
            'message'   => 'Data successfully fetched !',
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
        $findData = CustomerCard::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data Not Found !'], 422);
        }

        $request->validate([
            'customer'  => 'required',
            'product'   => 'required'
        ]);

        $findData->update([
            'customer_id'   => $request->customer,
            'product_id'    => $request->product,
            'ssa'           => $request->ssa,
            'd_50'          => $request->d_50,
            'd_98'          => $request->d_98,
            'cie_86'        => $request->cie_86,
            'iso_2470'      => $request->iso_2470,
            'moisture'      => $request->moisture,
            'residue'       => $request->residue,
            'description'   => $request->description,
        ]);

        $updated = CustomerCard::find($id);

        $response   = [
            'message'   => 'Customer card updated successfully !',
            'data'      => $updated
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findData = CustomerCard::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data Not Found !'], 422);
        }

        $findData->delete();

        $response = [
            'message'   => 'Data deleted successfully !',
        ];

        return response()->json($response, 200);
    }
}
