<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BeautifullCreation;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class AboutPageContoller extends Controller
{
    //

    public function aboutUs(){
        $about = About::find(1);
        $teams = Team::where('status',1)->orderBy('priority','asc')->get();
        $whyChooseUs = WhyChooseUs::get();
        $site_setting = \App\Models\SiteSetting::find(1);
        $creations = BeautifullCreation::where('status',1)->orderBy('priority','asc')->get();
        $sidevideo = \App\Models\SideVideo::find(1);
        return view('website.about',compact('about','teams','whyChooseUs','site_setting','creations','sidevideo'));
    }
}
