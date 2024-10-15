<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\About;
use App\Achievement;
use App\Breadcrumb;
use App\Testimonial;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
   public function index()
   {
    $about = About::find(1);
    $achievement = Achievement::find(1);
    $testimonials = Testimonial::where('status', 1)
                           ->orderByDesc('priority')->paginate(3);
     
        $meta_title=$about->meta_title;
        $meta_keywords=implode(",", json_decode($about->meta_keywords));
        $meta_description= $about->meta_description;
        $breadcrumb = Breadcrumb::where('page_name','about')->first();
        
        $board_diretors = \App\BoardDirector::where('status',1)->orderBy('priority','asc')->get();
        $advisory_diretors = \App\AdvisoryDirector::where('status',1)->orderBy('priority','asc')->get();
    return view('frontend.about-us',compact('about','achievement','testimonials','meta_title','meta_keywords','meta_description','breadcrumb','board_diretors','advisory_diretors'));
}
}
