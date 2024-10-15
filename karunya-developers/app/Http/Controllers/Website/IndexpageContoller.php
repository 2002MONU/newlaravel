<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Blog;
use App\Models\HomeAbout;
use App\Models\HomeThreePoint;
use App\Models\HomeWhyChoose;
use App\Models\HowItWork;
use App\Models\ProjectDetail;
use App\Models\Slider;
use App\Models\SliderVideo;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexpageContoller extends Controller
{
    // website index page 
    public function indexPage(){
        $sliders = Slider::where('status',1)->orderBy('priority','asc')->get();
        $slider_video = SliderVideo::find(1);
        $about = HomeAbout::find(1);
        $achievement = Achievement::find(1);
        $howItWork = HowItWork::find(1);
        $testimonials = Testimonial::where('status',1)->orderBy('priority','asc')->get();
        $blogDetails = Blog::where('status',1)->orderBy('priority','asc')->get();
        $projectDetails = ProjectDetail::where('status',1)->orderBy('priority','asc')->get();
        $home_extra = HomeThreePoint::find(1);
        $home_why_choose = HomeWhyChoose::find(1);
        $site_setting = \App\Models\SiteSetting::find(1);
        $disclaimer = \App\Models\Disclaimer::find(1);
        return view('website.index',compact('sliders','slider_video','about','achievement','howItWork','testimonials',
                'blogDetails','projectDetails','home_extra','home_why_choose','site_setting','disclaimer'));
    }
}
