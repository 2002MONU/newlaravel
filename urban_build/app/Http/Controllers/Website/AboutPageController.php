<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    //
    public function aboutPage(){
        $about = About::find(1);
        $site_setting = SiteSetting::find(1);
        return view('website.about',compact('about','site_setting'));
    }
}
