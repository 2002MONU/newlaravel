<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    
    public function index(){
        $service = Service::where('status',1)->orderBy('priority')->get();
        return view('Frontend.service',compact('service'));
    }
}
