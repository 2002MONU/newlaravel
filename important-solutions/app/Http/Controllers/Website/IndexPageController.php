<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Abouts;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\OurVision;
use App\Models\SiteSetting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    // website index page 
    public function indexPage(){
        $sliders = Slider::where('status',1)
        ->orderByRaw('CASE WHEN priority IS NULL OR priority = 0 THEN 1 ELSE 0 END, priority ASC')
        ->get();
       // dd($sliders);
        $services = Service::where('status',1)
        ->orderByRaw('CASE WHEN priority IS NULL OR priority = 0 THEN 1 ELSE 0 END, priority ASC')
        ->limit(3)->get();
        $blog_details = Blog::where('status',1)
        ->orderByRaw('CASE WHEN priority IS NULL OR priority = 0 THEN 1 ELSE 0 END, priority ASC')
        ->get();
     foreach ($blog_details as $blog)
     {
    // Strip HTML tags and truncate to 30 words
    $plain_text = strip_tags($blog->description);
    $blog->short_description = Str::words($plain_text, 30, '...');
     }
        $about = Abouts::find(1);
        $site_setting = SiteSetting::find(1);
        return view('website.index',compact('sliders','services','blog_details','about','site_setting'));
    }

    // website about page 
    public function aboutPage(){
        $about = Abouts::find(1);
        $our_vision = OurVision::find(1);
        $site_setting = SiteSetting::find(1);
        return view('website.about',compact('about','our_vision','site_setting'));
    }
}
