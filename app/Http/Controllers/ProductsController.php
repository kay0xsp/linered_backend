<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        if($products->isEmpty())
        {
            return response()->json([
                'status' => 'empty'
            ], 400);
        }
        else
        {
            return response()->json([
                'status' => 'succes',
                'products' => $products
            ], 200);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreProductRequest $request)
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
        if(count($request->all()))
        {
            $post = Product::insert($request->all());
        
            $request->validate([
                '.*title' => 'required|max:255',
                '.*description' => 'required',
                '.*price' => 'required|float',
                '.*serialNumber' => 'required|integer',
                '.*imagePath' => 'required',
                '.*category_id' => 'required'
            ]);
            
            return response()->json([
                'status' => 'true',
                'message' => 'Products added succesfully',
                'product' => $post
            ], 200);

        }
        else
        {          
            return response()->json([
                'status' => 'empty',
                'message' => 'products are empty',
            ], 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
       // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $products)
    {
        //
    }
}
