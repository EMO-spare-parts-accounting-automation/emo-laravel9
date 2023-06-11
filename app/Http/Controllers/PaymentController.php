<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BalaceHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller

{
    public function __construct()
    {
        $this->middleware(['auth', 'role:customer']);
    }

    public function addbalance(Request $request)
    {
        $user = Auth::user();
        $user->balance += $request->balance;
        $user->save();
        $addbalancehistory=new BalaceHistory();
        $addbalancehistory->userid=$user->id;
        $addbalancehistory->payment=$request->balance;
        $addbalancehistory->totalbalance=$user->balance;
        $addbalancehistory->status='Bakiye Yükleme';
        $addbalancehistory->save();
        return redirect('/customer/payment')->with('addbalance', 'Ödenen tutar bakiyenize eklendi!');
    }
}
