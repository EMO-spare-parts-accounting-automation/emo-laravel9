<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return redirect('/customer/payment')->with('addbalance', 'Ödenen tutar bakiyenize eklendi!');
    }
}
