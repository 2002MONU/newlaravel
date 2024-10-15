<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Export;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ExportsController extends Controller
{
    //worldMap
    public function worldMap(){
        $export = Export::find(1);
        $site_setting = SiteSetting::find(1);
        return view('website.world-map',compact('export','site_setting'));
    }
}
