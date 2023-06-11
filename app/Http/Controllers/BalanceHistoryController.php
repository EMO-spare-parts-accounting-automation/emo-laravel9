<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BalaceHistory;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:customer']);
    }

    public function index(){
        $user=Auth::user();
        $payments=BalaceHistory::where('userid',$user->id)->get();
        $hasPayments=$payments->isEmpty();
        return view('customer.payment.balancehistory',compact('payments','hasPayments'));
    }
}
