<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Ethical;
use App\Models\Institutional;
use App\Models\OTCProduct;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // product otc 
    public function otc(){
        $otc_product = OTCProduct::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = SiteSetting::find(1);
        return view('website.otc',compact('otc_product','site_setting'));
    }
   // ethical
    public function ethical(){
        $ethicals = Ethical::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = SiteSetting::find(1);
        return view('website.ethical',compact('ethicals','site_setting'));
    }

    // institutional
    public function institutional(){
        $insti = Institutional::find(1);
        $site_setting = SiteSetting::find(1);
        return view('website.institutional',compact('insti','site_setting'));
    }
}
