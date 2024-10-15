<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\ResearchDevelopment;
use App\ResearchType;
use Illuminate\Http\Request;

class ResearchDetailController extends Controller
{
   public function index($slug)
   {
    $researchtype = ResearchType::where('slug',$slug)->firstOrFail();
    $research = ResearchDevelopment::where('researchtype_id', $researchtype->id)->get();

        $meta_title=$researchtype->meta_title;
        $meta_keywords=implode(",", json_decode($researchtype->meta_keywords));
        $meta_description= $researchtype->meta_description;
    return view('frontend.cms-page', compact('research','researchtype','meta_title','meta_keywords','meta_description'));
    }
}
