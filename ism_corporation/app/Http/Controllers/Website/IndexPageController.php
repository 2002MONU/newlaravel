<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Ethical;
use App\Models\HomeAbout;
use App\Models\Management;
use App\Models\OTCProduct;
use App\Models\OurAchievement;
use App\Models\OurVision;
use App\Models\SiteSetting;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    // website index page show
    public function indexPage(){
        $sliders = Slider::where('status',1)->orderBy('priority','asc')->get();
       // dd($sliders);
        $about = HomeAbout::find(1);
        $vision = OurVision::find(1); 
        $achievement = OurAchievement::find(1);
        $otc_product = OTCProduct::where('status',1)->orderBy('priority','asc')->limit(3)->get();
        $ethicals =  Ethical::where('status',1)->orderBy('priority','asc')->limit(3)->get();
        $teams =  Management::where('status',1)->orderBy('priority','asc')->limit(3)->get();
        $site_setting = SiteSetting::find(1);
        return view('website.index',compact('sliders','about','vision','achievement','otc_product','ethicals','teams','site_setting'));
    }
}
