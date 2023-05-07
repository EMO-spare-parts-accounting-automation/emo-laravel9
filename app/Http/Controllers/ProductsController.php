<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->brand = $request->brand;
        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->sanliurfa = $request->sanliurfa ;
        $product->hatay = $request->hatay ;
        $product->maras = $request->maras ;
        $product->costKdV = $request->cost * 1.18;
        $product->listCost =$product->costKdV * 1.10;
        $product->stock = $request->stock;
        $product->save();
        return redirect('admin/products/index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::all()->find($id);
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::all()->find($id);
        $product->brand = $request->brand;
        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->sanliurfa = $request->sanliurfa ;
        $product->hatay = $request->hatay ;
        $product->maras = $request->maras ;
        $product->costKdV = $request->cost * 1.18;
        $product->listCost =$product->costKdV * 1.10;
        $product->stock = $request->stock;
        $product->save();
        return redirect('admin/products/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('admin/products/index');
    }
}
