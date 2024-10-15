<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SEOSetting;
use Illuminate\Http\Request;

class SEOSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seo_setting = SEOSetting::get();
        return view('admin.setting.seo-details',compact('seo_setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.add-seo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_name' =>'required|string',
            'title' =>'required|string',
            'description' =>'required|string',
            'keywords' =>'nullable|string',
        ]);
       
        $our_team = new SEOSetting();
       
        $our_team->page_name = $request->page_name;
        $our_team->description = $request->description;
        $our_team->title = $request->title;
        $our_team->keywords = $request->keywords;
        $our_team->save();
        return redirect()->route('seosettings.index')->with('success','SEO add  successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seo_setting = SEOSetting::find($id);
        return view('admin.setting.edit-seo',compact('seo_setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'page_name' =>'required|string',
            'title' =>'required|string',
            'description' =>'required|string',
            'keywords' =>'nullable|string',
        ]);
       
        $our_team =  SEOSetting::find($id);
       
        $our_team->page_name = $request->page_name;
        $our_team->description = $request->description;
        $our_team->title = $request->title;
        $our_team->keywords = $request->keywords;
        $our_team->save();
        return redirect()->route('seosettings.index')->with('success','SEO update  successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seo =SEOSetting::find($id)->delete();
        return redirect()->back()->with('success','SEO delete Successfully');
    }
}
