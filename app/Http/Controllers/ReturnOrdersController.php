<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\ReturnOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:customer']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $returnOrders = ReturnOrder::where('userid', $user->id)->get();
        $hasReturnOrder = $returnOrders->isEmpty();

        return view('customer.returnProduct.index', compact('returnOrders', 'hasReturnOrder'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('customer.returnProduct.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $orderDetails = OrderDetail::query()->find($id);

        $returnProduct = new ReturnOrder();
        $returnProduct->userid = $orderDetails->userID;
        $returnProduct->orderid = $orderDetails->orderID;
        $returnProduct->productid = $orderDetails->productId;
        $returnProduct->customerfeedback = $request->customerfeedback;
        $returnProduct->returncost = $request->returncost;
        $returnProduct->refreshproduct = $request->refreshproduct;
        $returnProduct->save();
        return redirect('customer/returnproduct/index')->with('added', 'İade Talebiniz Alınmıştır');
    }

    public function feedback($id)
    {
        return view('customer.returnProduct.updateFeedback', compact('id'));
    }

    public function storefeedback(Request $request, $id)
    {
        $returnOrders = ReturnOrder::query()->find($id);
        $returnOrders->customerfeedback = $request->customerfeedback;
        $returnOrders->save();
        return redirect('customer/returnproduct/index')->with('feedback', 'Geribildirim oluşturuldu!');
    }

}
