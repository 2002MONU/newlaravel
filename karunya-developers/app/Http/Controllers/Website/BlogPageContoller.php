<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogPageContoller extends Controller
{
    //
    public function blog(){
        $blog_details = Blog::where('status',1)->orderBy('priority','asc')->paginate(8);
         $site_setting = \App\Models\SiteSetting::find(1);
          $sidevideo = \App\Models\SideVideo::find(1);
        return view('website.blogs',compact('blog_details','site_setting','sidevideo'));
    }

    public function blogDetails($slug){
        $blog = Blog::where('slug',$slug)->first();
        $blog_details = Blog::where('status',1)->latest()->get();
         $site_setting = \App\Models\SiteSetting::find(1);
          $sidevideo = \App\Models\SideVideo::find(1);
        return view('website.blog-details',compact('blog','blog_details','site_setting','sidevideo'));
    }
}
