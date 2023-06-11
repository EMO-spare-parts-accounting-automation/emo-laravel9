<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BalaceHistory;
use App\Models\OrderDetail;
use App\Models\ReturnOrder;
use App\Models\User;
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
        $returnOrders = ReturnOrder::all();
        $hasReturnOrder = $returnOrders->isEmpty();
        return view('admin.returnProduct.index', compact('returnOrders', 'hasReturnOrder'));

    }

    public function completedReturn($id)
    {
        $returnOrders = ReturnOrder::query()->find($id);
        $user=User::query()->find($returnOrders->userid);
        $orderDetails=OrderDetail::where('userId',$returnOrders->userid)->where('orderID',$returnOrders->orderid)->where('productId',$returnOrders->productid)->get();
        if($returnOrders->adminfeedback==='Bakiye iadesi yapılacaktır'){
            $cost=($orderDetails[0]->count*$orderDetails[0]->cost)-$orderDetails[0]->campaignCost;
            $user->balance+=$cost;
            $user->save();
            $addbalancehistory=new BalaceHistory();
            $addbalancehistory->userid=$returnOrders->userid;
            $addbalancehistory->orderid=$returnOrders->orderid;
            $addbalancehistory->payment=$cost;
            $addbalancehistory->totalbalance=$user->balance;
            $addbalancehistory->status='Bakiye İade';
            $addbalancehistory->save();

        }
        $returnOrders->status = 'İade Tamamlandı';
        $returnOrders->save();
        return redirect('admin/returnproduct/index')->with('completed', 'Belirtilen iade Tamamlandı');
    }

    public function startReturn($id)
    {
        $returnOrders = ReturnOrder::query()->find($id);
        $returnOrders->status = 'İnceleniyor!';
        $returnOrders->adminfeedback = 'Firma Talebinizi İncelemeye Aldı!';
        $returnOrders->save();
        return redirect('admin/returnproduct/index')->with('start', 'Belirtilen iade talebi incelemeye alındı');
    }

    public function feedback($id)
    {
        return view('admin.returnProduct.updateFeedback', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $returnOrders = ReturnOrder::query()->find($id);
        $returnOrders->adminfeedback = $request->adminfeedback;
        $returnOrders->save();
        return redirect('admin/returnproduct/index')->with('feedback', 'Müşteri için geribildirim oluşturuldu!');
    }


}
