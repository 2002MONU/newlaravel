<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\KeyElement;
use App\Models\Management;
use App\Models\OurVision;
use App\Models\Pharma;
use App\Models\SiteSetting;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;

class OurCompanyController extends Controller
{
    // who we are 
    public function WhoWeAre(){
        $who_we_are = WhoWeAre::find(1);
        $site_setting = SiteSetting::find(1);
        return view('website.who-we-are',compact('who_we_are','site_setting'));
    }

    // vison 
    public function vision(){
        $vision = OurVision::find(1);
        $site_setting = SiteSetting::find(1);
        return view('website.vision',compact('vision','site_setting'));
    }
     // management
    public function management(){
        $site_setting = SiteSetting::find(1);
        $managements = Management::where('status',1)->orderBy('priority','asc')->get();
        return view('website.management',compact('managements','site_setting'));
    }

    // pharmaCovigilance
    public function pharmaCovigilance(){
        $pharma = Pharma::find(1);
        $key_elements = KeyElement::where('status',1)->orderBy('priority','asc')->get();
        $site_setting = SiteSetting::find(1);
        return view('website.pharma',compact('pharma','key_elements','site_setting'));
    }


}
