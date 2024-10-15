<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index(){
        $about = About::find(1);

        return view('Frontend.about',compact('about'));
    }
}
