<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Achievement;
use App\Models\HowItWork;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
   public function index(){
      $sliders = Slider::where('status',1)->orderBy('priority','asc')->get();
      $about = About::find(1);
      $services = Service::where('status',1)->orderBy('priority','asc')->get();
      $achievement = Achievement::find(1); 
      $whychoose = WhyChoose::find(1);
      $howitwork = HowItWork::find(1);
      $testimonials = Testimonial::where('status',1)->orderBy('priority','asc')->get();
    return view('Frontend.index',compact('sliders','about','services','achievement','whychoose','howitwork','testimonials'));
   }
}
