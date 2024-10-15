<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceDetail;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    //
    public function servicePage($slug){
        $service = ServiceDetail::where('slug',$slug)->first();
        $site_setting = SiteSetting::find(1);
        // Fetch other active services except the current one
            $related_services = ServiceDetail::where('status', 1)
            ->where('slug', '!=', $slug)
            ->latest()
            ->limit(4) // Optionally, limit the number of related services
            ->get();
        return view('website.services',compact('service','site_setting','related_services'));
    }
}
