<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Product;
use Illuminate\Http\Request;
use DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query()->with('get_status:id,name,value');

        if ($request->filled('status')) {
            $products->where('status', $request->status);
        }
        
        return DataTables::eloquent($products)->make(true);
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
            'name'                  => 'required',
            'code'                  => 'required|unique:products,code',
            'photo'                 => 'image|max:1024|mimes:jpeg,png,jpg,svg', // 1MB Max
        ]);

        $imageName = null;

        if($request->photo)
        {
          
            $imageName = date("Ymd").time().rand().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/product'), $imageName);
        }


        $create = Product::create([
            'name'                  => $request->name,
            'code'                  => $request->code,
            'stock'                 => $request->stock,
            'product_type'          => $request->product_type,
            'photo'                 => $imageName,
            'description'           => $request->description,
            'status'                => $request->status
        ]); 

        $response = [
            'message'   => 'Product created successfully !',
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
        $findData = Product::find($id);

        if (!$findData) {

            $findData = Product::where('code', $id)->first();

            if (!$findData) {
                return response()->json(['message' => 'Data not found !'], 422);
            }
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
        $findData = Product::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data not found !'], 422);
        }

        $request->validate([
            'name'                  => 'required',
            'code'                  => 'required|unique:products,code,' . $id,
            'product_type'          => 'required',
            'weight'                => 'required|numeric',
            'photo'                 => 'image|max:1024|mimes:jpeg,png,jpg,svg', // 1MB Max
            'packing_type_id'       => 'required',
        ]);

        $imageName = $findData->photo;

        if($request->hasFile('photo'))
        {
            if ($imageName != null) {
                unlink("images/product/" . $findData->photo);
            }
            $imageName = date("Ymd").time().rand().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/product'), $imageName);
        }

        $findData->name                  = $request->name;
        $findData->code                  = $request->code;
        $findData->photo                 = $imageName;
        $findData->description           = $request->description;
        $findData->status                = $request->status;
      
        $findData->save();

        $updated = Product::find($id);

        $response = [
            'message'   => 'Product updated successfully !',
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
        $findData = Product::find($id);

        if (!$findData) {
            return response()->json(['message' => 'Data Not Found !'], 404);
        }
        $file = public_path('images/product/') . $findData->photo;

        if (file_exists($file)) {
            @unlink($file);
        }

        $findData->delete();

        return response()->json(['message' => 'Data deleted successfully !'], 200);
    }
}
