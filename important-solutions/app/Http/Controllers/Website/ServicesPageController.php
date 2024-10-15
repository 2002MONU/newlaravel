<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ServicesPageController extends Controller
{
    // website service page 
    public function servicePage(){
        $services = Service::where('status',1)
        ->orderByRaw('CASE WHEN priority IS NULL OR priority = 0 THEN 1 ELSE 0 END, priority ASC')
        ->get();
        $site_setting = SiteSetting::find(1);
        return view('website.service',compact('services','site_setting'));
    }
    
}
