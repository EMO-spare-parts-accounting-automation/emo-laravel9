<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:customer']);
    }


    public function index()
    {
        $products = Product::all();
        $hasProduct = $products->isEmpty();
        return view('customer.products.index', compact('products', 'hasProduct'));
    }

    public function search(Request $request)
    {
        $query = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('brand', 'LIKE', '%' . $query . '%')
            ->orWhere('id', 'LIKE', $query)
            ->get();
        $hasProduct = $products->isEmpty();
        return view('customer.products.index', compact('products', 'hasProduct'));
    }
}
