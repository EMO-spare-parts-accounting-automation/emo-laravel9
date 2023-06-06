<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class CustListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $users = User::all();
        $myaccount = Auth::user();
        $isempty = $users->isEmpty();
        return view('admin.custList', compact('users', 'myaccount', 'isempty'));
    }

    public function authority($id)
    {
        $userUpdate = User::query()->find($id);
        if ($userUpdate->userType === 'admin') {
            $userUpdate->userType = 'customer';
        } else {
            $userUpdate->userType = 'admin';
        }
        $userUpdate->save();
        return redirect('/admin/customerlist');
    }

    public function search(Request $request)
    {
        $myaccount = Auth::user();
        $aranan = $request->search;
        $users = User::where('name', 'LIKE', '%' . $aranan . '%')->orwhere('id', 'LIKE', '%' . $aranan . '%')->orwhere('email', 'LIKE', '%' . $aranan . '%')->orwhere('userType', 'LIKE', '%' . $aranan . '%')->get();
        $isempty = $users->isEmpty();
        return view('admin.custList', compact('users', 'myaccount', 'isempty'));


    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/customerlist');
    }
}
