<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    //  product page 
    public function product(){
        $product = Product::where('status',1)->first();
        $products = Product::where('status',1)->latest()->get();
        $site_setting = SiteSetting::find(1);
         return view('website.products',compact('product','products','site_setting'));
    }
    
     public function productDetails($slug){
        $product = Product::where('slug',$slug)->first();
        $products = Product::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = SiteSetting::find(1);
        return view('website.products',compact('product','products','site_setting'));
     }

    // website services pages
    public function services(){
        $service = Service::where('status',1)->first();
        $services = Service::where('status',1)->latest()->get();
        $site_setting = SiteSetting::find(1);
        return view('website.services',compact('services','service','site_setting'));
    }

    public function servicesDetails($slug){
        $service = Service::where('slug',$slug)->first();
        $services = Service::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = SiteSetting::find(1);
        return view('website.services',compact('service','services','site_setting'));
    }
}
