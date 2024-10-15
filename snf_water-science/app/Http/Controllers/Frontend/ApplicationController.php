<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function applicationAccess(){
        return view('frontend.application-access');
    }

    public function applicationKakaLogin(){
        return view('frontend.application-access');
    }

    public function applicationWebMail(){
        return view('frontend.application-access');
    }
}
