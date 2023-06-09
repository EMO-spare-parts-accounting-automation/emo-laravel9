<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        return view('profile.profile');
    }
    public function update(){
        return view('profile.update');
    }
    public function updatepassword(){
        return view('profile.updatePassword');
    }
    public function updateaddress(){
        return view('profile.addressupdate');
    }
    public function editProfile(Request $request){
        auth()->user()->update([
            'name' => $request->name,
            'email'=>$request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('profile')->with('UpdatedProfile','Hesap bilgileriniz güncellendi');

    }
    public function editPassword(Request $request){
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect('profile')->with('UpdatedPassword','Şifreniz güncellendi');

    }
    public function editaddress(Request $request,$redirectControl){
        auth()->user()->update([
            'address' => $request->address
        ]);
        if($redirectControl==1){
            return redirect('/customer/shopcart/index')->with('AddAddress','Adres bilginiz eklendi');
        }
        else{
            return redirect('profile')->with('updatedAddress','Adres bilginiz güncellendi');
        }


    }
}
