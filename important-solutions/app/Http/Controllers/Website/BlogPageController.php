<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\SiteSetting;

class BlogPageController extends Controller
{
    // website blog page 
    public function blogPage(){
        $blog_details = Blog::where('status',1)
        ->orderByRaw('CASE WHEN priority IS NULL OR priority = 0 THEN 1 ELSE 0 END, priority ASC')
        ->get();
        $site_setting = SiteSetting::find(1);
        return view('website.blog',compact('blog_details','site_setting'));
    }

    public function blogPageDetails($slug){
        $blog = Blog::where('slug',$slug)->first();
        $blog_details = Blog::where('status',1)->latest()->limit(6)->get();
        $site_setting = SiteSetting::find(1);
        return view('website.blog-details',compact('blog','blog_details','site_setting'));
    }
}
