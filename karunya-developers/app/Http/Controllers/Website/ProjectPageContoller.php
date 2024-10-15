<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;

class ProjectPageContoller extends Controller
{
    //
    public function project(){
        $project_details = ProjectDetail::where('status',1)->orderBy('priority','asc')->get();
         $site_setting = \App\Models\SiteSetting::find(1);
          $sidevideo = \App\Models\SideVideo::find(1);
        return view('website.project',compact('project_details','site_setting','sidevideo'));
    }

    public function projectDetails($slug){
        $project = ProjectDetail::where('slug',$slug)->first();
         $site_setting = \App\Models\SiteSetting::find(1);
          $sidevideo = \App\Models\SideVideo::find(1);
       return view('website.project-details',compact('project','site_setting','sidevideo'));
    }

    // upcoming-projects
    public function Upcomingproject(){
     
      $project_details = ProjectDetail::where('project_id', 2)
      ->where('status',1)->orderBy('priority','asc')->get();
    //  foreach($project_details as $project_detail){
    //     $projects = Project::firstWhere('id',$project_detail->project_id);
    //  }
       $site_setting = \App\Models\SiteSetting::find(1);
        $sidevideo = \App\Models\SideVideo::find(1);
        return view('website.upcoming-projects',compact('project_details','site_setting','sidevideo'));
    }


    // completed projects
    public function completedproject(){
        $project_details = ProjectDetail::where('project_id', 3)
      ->where('status',1)->orderBy('priority','asc')->get();
 $site_setting = \App\Models\SiteSetting::find(1);
  $sidevideo = \App\Models\SideVideo::find(1);
      return view('website.completed-projects',compact('project_details','site_setting','sidevideo'));
    }
}
