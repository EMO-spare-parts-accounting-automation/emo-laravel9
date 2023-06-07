<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('orderDate', 'desc')
            ->get();
        $hasOrder = $orders->isEmpty();
        return view('admin.orders.index', compact('orders', 'hasOrder'));
    }

    public function search(Request $request)
    {
        $query = $request->orderSearch;
        $orders = Order::where('id', 'LIKE', '%' . $query . '%')
            ->orWhere('userID', 'LIKE', $query )
            ->orWhere('id', 'LIKE', $query)
            ->orWhere('status', 'LIKE', '%' . $query . '%')
            ->orderBy('orderDate', 'desc')
            ->get();
        $hasOrder = $orders->isEmpty();
        return view('admin.orders.index', compact('orders', 'hasOrder'));
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
        $order = Order::all()->find($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
