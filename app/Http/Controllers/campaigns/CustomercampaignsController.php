<?php

namespace App\Http\Controllers\campaigns;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CustomercampaignsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:customer']);
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
        return view('customer.campaigns.campaigns',compact('campaigns','hascampaigns'));
    }



}
