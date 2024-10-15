<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ProjectDetail;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    //

    public function projectDetails($slug){
        $project = ProjectDetail::where('slug',$slug)->first();
        $site_setting = SiteSetting::find(1);
        return view('website.project-details',compact('project','site_setting'));
    }
}
