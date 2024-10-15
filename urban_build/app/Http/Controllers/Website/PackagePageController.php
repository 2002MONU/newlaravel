<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\PackageDetail;
use App\Models\SiteSetting;
use App\Models\Package;
use Illuminate\Http\Request;

class PackagePageController extends Controller {

    //

    public function packages() {
        $site_setting = SiteSetting::find(1);
        $package_name = Package::where('status',1)->get();
        return view('website.packages', compact('site_setting','package_name'));
    }

    public function packageDataAPI(Request $request) {

     $id = $request->id;
        // Fetch package details by package_id
        $package_details = PackageDetail::where('package_id', $id)->get();

        $data = [];

        foreach ($package_details as $detail) {
             $data[] = [
                $detail->title => $detail->description,
            ];
        }

        // Return the data as JSON response
        return response()->json($data);
    }
}
