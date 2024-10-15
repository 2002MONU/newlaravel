<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function privacyPolicy(){
         $site_setting = \App\Models\SiteSetting::find(1);
         $privacy = \App\Models\Privacy::find(1);
        return view('website.privacy-policy', compact('site_setting','privacy'));
    }

    public function termPrivacyPolicyEdit($id){
        $privacy = Privacy::find($id);
        return view('admin.term-condition.edit-privacy',compact('privacy'));
    }

    public function termPrivacyPolicyEditPost(Request $request,$id){
        $request->validate([
            'description' => 'required|string',
        ]);
        $term = Privacy::find($id);
        $term->description = $request->description;
        $term->save();
        return redirect()->back()->with('success','Privacy Policy Update Successfully');
    }
}
