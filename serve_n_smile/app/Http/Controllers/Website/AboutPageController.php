<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\HowItWork;
use App\Models\Together;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    // about page view 
    public function aboutpage(){
        $about = About::find(1);
        $howitwork = HowItWork::find(1);
        $together = Together::find(1);
        $site_setting = \App\Models\SiteSetting::find(1);
        $whychoose = WhyChoose::find(1);
        return view('website.about',compact('about','howitwork','together','site_setting','whychoose'));
    }
}
