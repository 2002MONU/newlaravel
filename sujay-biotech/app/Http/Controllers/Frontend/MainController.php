<?php

namespace App\Http\Controllers\Frontend;

use App\About;
use App\Banner;
use App\Http\Controllers\Controller;
use App\Category;
use App\Partner;
use App\ResearchDevelopment;
use App\Testimonial;
use App\Whychooseus;
use App\Seo;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $banner = Banner::where('status', 1)->orderBy('priority')->get();
        $partner = Partner::where('status', 1)->orderBy('priority')->get();
        $testimonial = Testimonial::where('status', 1)->orderBy('priority')->get();
        
        $about = About::find(1);
        $whychooseus = Whychooseus::find(1);
        $research = ResearchDevelopment::latest('created_at')->take(3)->get();
         $seo = Seo::where('page_name','contact')->first();
        $meta_title=$seo->meta_title;
        $meta_keywords=implode(",", json_decode($seo->meta_keywords));
        $meta_description= $seo->meta_description;

        return view('frontend.index',compact('category','banner','partner','testimonial','research','about','whychooseus','meta_title','meta_keywords','meta_description'));
        }
}
