<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Together;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    // service page view 
    public function servicespage(){
        $services = Service::where('status',1)->orderBy('priority','asc')->paginate(30);
        $together = Together::find(1);
        $site_setting = \App\Models\SiteSetting::find(1);
        return view('website.services',compact('services','together','site_setting'));
    }

    // services details 
    public function servicesDetails($slug){
        $service = Service::where('slug',$slug)->first();
        $services = Service::where('status',1)->get();
        $site_setting = \App\Models\SiteSetting::find(1);
        $faqs = Faq::join('services','services.id','=','faqs.service_id')->select('services.slug','faqs.*')->where('services.slug',$slug)->get();
        return view('website.services-details',compact('service','services','site_setting','faqs'));
    }
}
