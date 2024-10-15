<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    // blog page view 
    public function blogpage(){
        $blog_details = Blog::where('status',1)->orderBy('priority','asc')->paginate(6);
        $servvices = Service::where('status',1)->get();
        $site_setting = \App\Models\SiteSetting::find(1);
        return view('website.blog',compact('blog_details','servvices','site_setting'));
    }

    // blog page  details
    public function blogpageDetails($slug){
        $blog = Blog::where('slug',$slug)->first();
        $site_setting = \App\Models\SiteSetting::find(1);
      
        $currentBlog = Blog::where('status', 1)->where('slug', $slug)->first();

            $previousBlog = Blog::where('status', 1)
            ->where('id', '<', $currentBlog->id)
            ->orderBy('id', 'desc')
            ->first();

            $nextBlog = Blog::where('status', 1)
                ->where('id', '>', $currentBlog->id)
                ->orderBy('id', 'asc')
                ->first();
        return view('website.blog-details',compact('blog','site_setting','currentBlog', 'previousBlog', 'nextBlog'));
    }
}
