<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\HomeAbout;
use App\Models\HomeExtra;
use App\Models\HowItWork;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Together;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    // index page view
    public function indexpage(){
        $sliders = Slider::where('status',1)->orderBy('priority','asc')->get();
        $home_other = HomeExtra::find(1);
        $home_about = HomeAbout::find(1);
        $services = Service::where('status',1)->orderBy('priority','asc')->limit(6)->get();
        $together = Together::find(1);
        $howitwork = HowItWork::find(1);
        $testimonials = Testimonial::where('status',1)->orderBy('priority','asc')->get();
        $achievement = Achievement::find(1);
        $site_setting = \App\Models\SiteSetting::find(1);
        return view('website.index',compact('sliders','home_other','home_about','services','together','howitwork','testimonials','achievement','site_setting'));
    }
}
