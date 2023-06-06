<?php

namespace App\Http\Controllers\campaigns;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
    public function index(){
        $campaigns=Campaign::all();
        $i=1;
        foreach ($campaigns as $campaign){
            $campaign->id=$i;
            $i=$i+1;
            $campaign->save();
        }
        $hascampaigns=$campaigns->isEmpty();
        return view('admin.campaigns.campaigns',compact('campaigns','hascampaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }
    public function store(Request $request)
    {
        $product=Product::query()->find($request->productid);
        if(empty($product)){
            return redirect('admin/campaigns/index')->with('invalidProduct','Geçersiz parça kodu girildi/Parça mevcut değil');
        }else{
            $campaign=new Campaign();
            $campaign->productid=$request->productid;
            $campaign->productcount=$request->productcount;
            $campaign->discount=$request->discount;
            $campaign->save();
            return redirect('admin/campaigns/index');
        }





    }
    public function edit($id)
    {
        $campaign=Campaign::all()->find($id);
        return view('admin.campaigns.edit',compact('campaign'));
    }
    public function update(Request $request, $id)
    {
        $campaign=Campaign::all()->find($id);
        $campaign->productid=$request->productid;
        $campaign->productcount=$request->productcount;
        $campaign->discount=$request->discount;
        $campaign->save();
        return redirect('admin/campaigns/index');
    }

    public function destroy($id)
    {
        Campaign::destroy($id);
        return redirect('admin/campaigns/index');

    }
}
