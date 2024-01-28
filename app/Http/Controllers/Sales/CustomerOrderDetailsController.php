<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\CustomerOrderDetail;
use Illuminate\Http\Request;

class CustomerOrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findData = CustomerOrderDetail::with('get_product')->find($id);

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
        $findData = CustomerOrderDetail::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $request->validate([
            'product_id'    => 'required',
            'qty'           => 'required'
        ]);

        $findData->update([
            'customer_order_id' => $request->customer_order_id,
            'product_id'        => $request->product_id,
            'qty'               => $request->qty,
            'ekspedisi_price'   => $request->ekspedisi_price,
            'price_calcium'     => $request->price_calcium,
            'price'             => $request->price,
            'staple_price'      => $request->staple_price,
            'additional_price'  => $request->additional_price,
            'product_price'     => $request->product_price,
            'product_ekspedisi' => $request->product_ekspedisi,
            'status'            => 2,
            'customer_card_id'  => $request->spesification,
        ]);

        $updated = CustomerOrderDetail::find($id);

        $response = [
            'message'   => 'Customer order detail updated successfully !',
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
        //
    }
}
