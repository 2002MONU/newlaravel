<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExentialFrontendController extends Controller
{
    //

    public function essentials(){
        return view('frontend.essentials');
    }

    public function departmentHeads(){
        return view('frontend.departsment-heads');
    }

    public function telephonicMail(){
        return view('frontend.essentials');
    }
}
