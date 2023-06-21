<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use function Webmozart\Assert\Tests\StaticAnalysis\null;


class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }


    public function index()
    {
        $products = Product::all();
        $hasProduct = $products->isEmpty();
        return view('admin.products.index', compact('products', 'hasProduct'));

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

    public function search(Request $request)
    {
        $query = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('brand', 'LIKE', '%' . $query . '%')
            ->orWhere('id', 'LIKE', $query)
            ->get();
        $hasProduct = $products->isEmpty();
        return view('admin.products.index', compact('products', 'hasProduct'));
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
        $product->sanliurfa = $request->sanliurfa;
        $product->hatay = $request->hatay;
        $product->maras = $request->maras;
        $product->costKdV = $request->cost * 1.18;
        $product->listCost = $product->costKdV * 1.10;
        $product->stock = $request->stock;
        $product->save();
        $id=$product->id;
        if($request->file('img')!=null){
            $image=new Image();
            $image->productid=$id;
            $request->img->move(public_path('uploads'), $id.'.jpg');
            $image->imagepath=public_path('uploads/').$id.'.jpg';
            $image->save();
        }
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
        $product = Product::all()->find($id);
        return view('admin.products.edit', compact('product'));
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
        $product->sanliurfa = $request->sanliurfa;
        $product->hatay = $request->hatay;
        $product->maras = $request->maras;
        $product->costKdV = $request->cost * 1.18;
        $product->listCost = $product->costKdV * 1.10;
        $product->stock = $request->stock;
        $product->save();
        $id=$product->id;
        if($request->file('img')!=null){
            $image=Image::where('productid',$product->id)->get();
            if($image->isEmpty()){
                $img=new Image();
                $img->productid=$id;
                $request->img->move(public_path('uploads'), $id.'.jpg');
                $img->imagepath=public_path('uploads/').$id.'.jpg';
                $img->save();
            }else{
                $request->img->move(public_path('uploads'), $id.'.jpg');
            }

        }
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
