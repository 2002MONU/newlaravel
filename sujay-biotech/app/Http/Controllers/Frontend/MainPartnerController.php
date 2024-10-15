<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Seo;
use App\Partner;
use Illuminate\Http\Request;

class MainPartnerController extends Controller
{
   public function index()
   {
    $partners = Partner::all();
     $seo = Seo::where('page_name','partner')->first();
        $meta_title=$seo->meta_title;
        $meta_keywords=implode(",", json_decode($seo->meta_keywords));
        $meta_description= $seo->meta_description;
    return view('frontend.partner', compact('partners','meta_title','meta_keywords','meta_description'));
    }
}
