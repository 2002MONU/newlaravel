<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentFrontendController extends Controller
{
    public function hrPolices(){
        return view('frontend.hr-polices');
    }
}
