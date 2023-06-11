<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BalaceHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBalanceHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index(){
        $payments=BalaceHistory::all();
        $hasPayments=$payments->isEmpty();
        return view('admin.balancehistory.balancehistory',compact('payments','hasPayments'));
    }
}
