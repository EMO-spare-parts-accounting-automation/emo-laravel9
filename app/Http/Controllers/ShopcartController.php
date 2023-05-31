<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shopcart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Webmozart\Assert\Tests\StaticAnalysis\string;

class ShopcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $ShopcartProducts=Shopcart::where('userid', 'LIKE',$user->id)->get();
        $products=[];
        foreach ($ShopcartProducts as $product){
            array_push($products,Product::query()->find($product->productid));
        }
        $productcount=0;

        $hasProduct=empty($products);
        return view('customer.shopcart',compact('products','hasProduct','ShopcartProducts','productcount'));

    }
    public function deletecart(){
        $user=Auth::user();
        Shopcart::where('userid', 'LIKE',$user->id)->delete();
        return redirect('customer/products/index')->with('deletecart', 'Sepetinizi Onayladınız! *Siparişiniz Alınmıştır!*');

    }

    public function addshopcart($id){
        $user=Auth::user();
        $products=Shopcart::where('userid', 'LIKE',$user->id)
            ->where('productid', 'LIKE', $id)
            ->get();
        $productdata=Product::where('id', 'LIKE', $id)->get();
        if(count($products)==1){
            if($products[0]->productcount!=$productdata[0]->stock){
                $product=$products[0];
                $product->productcount +=1;
                $product->save();
            }
            else{
                return redirect('/customer/shopcart/index')->with('addshopcartwarning', 'Seçilen ürünün stoğu yeterli değil!');
            }



        }
        else{
            Shopcart::create([
                'userid'=>$user->id,
                'productid'=>$id,
                'productcount'=>1,
            ]);
        }
        return redirect('/customer/shopcart/index')->with('addshopcart', 'Seçilen ürün sepetinize eklendi!');

    }
    public function increaseCount($id){
        $user=Auth::user();
        $product=Shopcart::where('userid', 'LIKE',$user->id)
            ->where('productid', 'LIKE', $id)->get();
        $productdata=Product::where('id', 'LIKE', $id)->get();
        if($product[0]->productcount!=$productdata[0]->stock)
        $product[0]->productcount+=1;
        $product[0]->save();
        return redirect('/customer/shopcart/index');

    }
    public function decreaseCount($id){
        $user=Auth::user();
        $product=Shopcart::where('userid', 'LIKE',$user->id)
            ->where('productid', 'LIKE', $id)->get();
        if($product[0]->productcount!=1){
            $product[0]->productcount-=1;
            $product[0]->save();
        }
        return redirect('/customer/shopcart/index');

    }
    public function updateProductCount(Request $request, $id)
    {
        $user=Auth::user();
        $product=Shopcart::where('userid', 'LIKE',$user->id)
            ->where('productid', 'LIKE', $id)->get();
        $productdata=Product::where('id', 'LIKE', $id)->get();
        if(($request->newproductCount)>$productdata[0]->stock){
            $product[0]->productcount=$productdata[0]->stock;
            $product[0]->save();
        }elseif (($request->newproductCount)<1){
            $product[0]->productcount=1;
            $product[0]->save();
        }
        else{
            $product[0]->productcount=$request->newproductCount;
            $product[0]->save();
        }

        return redirect('/customer/shopcart/index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Auth::user();
        Shopcart::where('userid', 'LIKE',$user->id)
            ->where('productid', 'LIKE', $id)->delete();
        return redirect('customer/shopcart/index')->with('deleteproduct', 'Seçilen sepetinizden ürün silinmiştir!');
    }
}
