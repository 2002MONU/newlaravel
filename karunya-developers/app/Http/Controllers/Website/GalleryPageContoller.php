<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryPageContoller extends Controller
{
    //
    public function gallery(){
        $galleries = Gallery::where('status',1)->orderBy('priority','asc')->get();
         $site_setting = \App\Models\SiteSetting::find(1);
         $sidevideo = \App\Models\SideVideo::find(1);
        return view('website.gallery',compact('galleries','site_setting','sidevideo'));
    }
}
