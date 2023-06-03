<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shopcart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Webmozart\Assert\Tests\StaticAnalysis\string;

class ShopcartController extends Controller
{


    public function getTotalCost()
    {
        $totalCost=0;
        $user = Auth::user();
        $ShopcartProducts = Shopcart::where('userid', 'LIKE', $user->id)->get();
        foreach ($ShopcartProducts as $product) {
            $listCost = Product::all()->find($product->productid);
            $totalCost += ($listCost->listCost * $product->productcount);
        }
        return $totalCost;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $ShopcartProducts = Shopcart::where('userid', 'LIKE', $user->id)->get();
        $products = [];

        foreach ($ShopcartProducts as $product) {
            array_push($products, Product::query()->find($product->productid));
        }
        $productcount = 0;
        $hasProduct = empty($products);
        $totalCost = $this->getTotalCost();
        return view('customer.shopcart', compact('products', 'hasProduct', 'ShopcartProducts', 'productcount', 'totalCost'));

    }

    public function createNewOrder($userId,$totalCost){
        $order = new Order();
        $order->userId=$userId;
        $order->status='Kargoya verilmesi bekleniyor';
        $order->totalCost=$totalCost;
        $order->save();
        return $order->id;
    }
    public function createNewOrderDetail($userID,$orderID,$productId,$count,$productCost,$totalCost){
        $orderDetail=new OrderDetail();
        $orderDetail->userId=$userID;
        $orderDetail->orderId=$orderID;
        $orderDetail->productID=$productId;
        $orderDetail->count=$count;
        $orderDetail->cost=$productCost;
        $orderDetail->totalCost=$totalCost;
        $orderDetail->save();

    }
    public function deletecart()  // Bu method başta silmek için yazılsa da daha sonra Mert Ozan Lislas tarafından ,
        //silme greçekleşmeden önce sipariş oluşturulması ve ardından sipariş detaylarını oluşturması,
        //en sonunda da silmesi sağlandı ,
        // methodun ismi işlevini tam yansıtmadığından detayları açıklıyorum
    {
        $user = Auth::user();
        $cost=$this->getTotalCost();
        if ($user->balance >= $cost) {
            $user->balance -= $cost;
            $user->save();
            $orderid=$this->createNewOrder($user->id,$cost);  //hem yeni bir order oluşturdum hem de id sini aldım
            $takenProducts=Shopcart::where('userid',$user->id)
            ->get();
            foreach ($takenProducts as $takenProduct){
                $product=Product::where('id',$takenProduct->productid)->get();
                $this->createNewOrderDetail(userID: $user->id,
                    orderID:$orderid ,
                    productId:$takenProduct->productid,
                    count: $takenProduct->productcount,
                    productCost: $product[0]->listCost,
                    totalCost:$cost);
                    $product[0]->stock-=$takenProduct->productcount;
                    $product[0]->save();
            }
            Shopcart::where('userid', 'LIKE', $user->id)->delete();
            return redirect('customer/products/index')->with('deletecart', 'Sepetinizi Onayladınız! *Siparişiniz Alınmıştır!*');
        }
        return redirect('/customer/shopcart/index')->with('addshopcartwarning', 'Yetersiz Bakiye!');

    }

    public function addshopcart($id)
    {
        $user = Auth::user();
        $products = Shopcart::where('userid', 'LIKE', $user->id)
            ->where('productid', 'LIKE', $id)
            ->get();
        $productdata = Product::where('id', 'LIKE', $id)->get();
        if (count($products) == 1 ) {
            if ($products[0]->productcount != $productdata[0]->stock   ) {
                $product = $products[0];
                $product->productcount += 1;
                $product->save();
            } else {
                return redirect('/customer/shopcart/index')->with('addshopcartwarning', 'Seçilen ürünün stoğu yeterli değil!');
            }


        } else {
            Shopcart::create([
                'userid' => $user->id,
                'productid' => $id,
                'productcount' => 1,
            ]);
        }
        return redirect('/customer/shopcart/index')->with('addshopcart', 'Seçilen ürün sepetinize eklendi!');

    }

    public function increaseCount($id)
    {
        $user = Auth::user();
        $product = Shopcart::where('userid', 'LIKE', $user->id)
            ->where('productid', 'LIKE', $id)->get();
        $productdata = Product::where('id', 'LIKE', $id)->get();
        if ($product[0]->productcount != $productdata[0]->stock) {
            $product[0]->productcount += 1;

        }
        $product[0]->save();
        return redirect('/customer/shopcart/index');

    }

    public function decreaseCount($id)
    {
        $user = Auth::user();
        $product = Shopcart::where('userid', 'LIKE', $user->id)
            ->where('productid', 'LIKE', $id)->get();
        if ($product[0]->productcount != 1) {
            $product[0]->productcount -= 1;
            $product[0]->save();
        }
        return redirect('/customer/shopcart/index');

    }

    public function updateProductCount(Request $request, $id)
    {
        $user = Auth::user();
        $product = Shopcart::where('userid', 'LIKE', $user->id)
            ->where('productid', 'LIKE', $id)->get();
        $productdata = Product::where('id', 'LIKE', $id)->get();
        if (($request->newproductCount) > $productdata[0]->stock) {
            $product[0]->productcount = $productdata[0]->stock;
            $product[0]->save();
        } elseif (($request->newproductCount) < 1) {
            $product[0]->productcount = 1;
            $product[0]->save();
        } else {
            $product[0]->productcount = $request->newproductCount;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        Shopcart::where('userid', 'LIKE', $user->id)
            ->where('productid', 'LIKE', $id)
            ->delete();
        return redirect('customer/shopcart/index')->with('deleteproduct', 'Seçilen sepetinizden ürün silinmiştir!');
    }
}
