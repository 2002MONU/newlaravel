<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Achievement;
use App\Models\FaqQuestion;
use App\Models\Package;
use App\Models\PackageDetail;
use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\ServiceDetail;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    //
    public function indexPage(Request $request){
        $sliders = Slider::where('status',1)->orderBy('priority','asc')->get();
        $about = About::find(1);
        $achievement = Achievement::find(1);
        $whyChooseUs = WhyChooseUs::find(1);
        $testimonials = Testimonial::where('status',1)->orderBy('priority','asc')->get();
        $faqs = FaqQuestion::where('status',1)->orderBy('priority','asc')->get();
        $projects = ProjectDetail::join('projects','projects.id','=','project_details.project_id')
        ->select('projects.project_type as project_status',
         'project_details.*')->where('project_details.status',1)->get();
        $completed_project = ProjectDetail::where('status',1)->where('project_id',2)->orderBy('priority','asc')->get();
        $ongoing_project = ProjectDetail::where('status',1)->where('project_id',1)->orderBy('priority','asc')->get();
       
        $package_name = Package::where('status',1)->get();
       
        $service = ServiceDetail::latest()->first();


        return view('website.index',compact('sliders','about','achievement','whyChooseUs','testimonials','faqs','completed_project','projects','ongoing_project','package_name','service'));
    }




}
