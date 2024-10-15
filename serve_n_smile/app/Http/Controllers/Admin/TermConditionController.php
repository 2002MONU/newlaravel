<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermCondition;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function termCondition(){
         $site_setting = \App\Models\SiteSetting::find(1);
         $term = \App\Models\TermCondition::find(1);
        return view('website.term-condition',compact('site_setting','term'));
    }

    public function termConditionEdit($id){
        $term = TermCondition::find($id);
        return view('admin.term-condition.edit-term',compact('term'));
    }

    public function termConditionEditPost(Request $request,$id){
        $request->validate([
            'description' => 'required|string',
        ]);
        $term = TermCondition::find($id);
        $term->description = $request->description;
        $term->save();
        return redirect()->back()->with('success','Term Condition Update Successfully');
    }
}
