<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutVision;
use App\Models\Achievement;
use App\Models\Certificate;
use App\Models\NewPage;
use App\Models\Product;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\WhyChoose;
use Illuminate\Http\Request;
use PhpParser\NodeVisitor;

class IndexPageController extends Controller
{
    //  website index page show function 
    public function indexPage(){
        $slider = Slider::find(1);
        $home_about = About::find(1);
        $whychoose = WhyChoose::find(1);
        $achievement = Achievement::find(1);
        $services = Service::where('status',1)->orderBy('priority','asc')->limit(4)->get();
        $news = NewPage::where('status',1)->orderBy('priority','asc')->limit(3)->get();
        $testimonials = Testimonial::where('status',1)->orderBy('priority','asc')->get();
        $products = Product::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = SiteSetting::find(1);
       
        return view('website.index',compact('slider','home_about','whychoose','achievement','services','news','testimonials','products','site_setting'));
    }

   // website about page 
    public function aboutUs(){
        $home_about = About::find(1);
        $our_vision = AboutVision::find(1);
        $site_setting = SiteSetting::find(1);
        $certificates = Certificate::where('status',1)->orderBy('priority','asc')->get();
        return view('website.about-us',compact('home_about','our_vision','site_setting','certificates'));
    }
}
