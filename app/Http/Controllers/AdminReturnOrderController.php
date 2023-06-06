<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReturnOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class AdminReturnOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
    public function index()
    {
        $returnOrders=ReturnOrder::all();
        $hasReturnOrder=$returnOrders->isEmpty();
        return view('admin.returnProduct.index',compact('returnOrders','hasReturnOrder'));

    }
    public function completedReturn($id){
        $returnOrders=ReturnOrder::query()->find($id);
        $returnOrders->status='İade Tamamlandı';
        $returnOrders->save();
        return redirect('admin/returnproduct/index')->with('completed','Belirtilen iade Tamamlandı');
    }
    public function startReturn($id){
        $returnOrders=ReturnOrder::query()->find($id);
        $returnOrders->status='İnceleniyor!';
        $returnOrders->adminfeedback='Firma Talebinizi İncelemeye Aldı!';
        $returnOrders->save();
        return redirect('admin/returnproduct/index')->with('start','Belirtilen iade talebi incelemeye alındı');
    }
    public function feedback($id)
    {
        return view('admin.returnProduct.updateFeedback',compact('id'));
    }
    public function store(Request $request,$id){
        $returnOrders=ReturnOrder::query()->find($id);
        $returnOrders->adminfeedback=$request->adminfeedback;
        $returnOrders->save();
        return redirect('admin/returnproduct/index')->with('feedback','Müşteri için geribildirim oluşturuldu!');
    }


}
