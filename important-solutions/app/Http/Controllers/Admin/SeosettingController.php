<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeosettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo_setting = SeoSetting::get();
        return view('admin.setting.seo-details',compact('seo_setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.add-seo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_name' =>'required|string',
            'title' =>'required|string',
            'description' =>'required|string',
            'keywords' =>'nullable|string',
        ]);
       
        $our_team = new SeoSetting();
       
        $our_team->page_name = $request->page_name;
        $our_team->description = $request->description;
        $our_team->title = $request->title;
        $our_team->keywords = $request->keywords;
        $our_team->save();
        return redirect()->route('seosettings.index')->with('success','SEO add  successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seo_setting = SeoSetting::find($id);
        return view('admin.setting.edit-seo',compact('seo_setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'page_name' =>'required|string',
            'title' =>'required|string',
            'description' =>'required|string',
            'keywords' =>'nullable|string',
        ]);
       
        $our_team =  SeoSetting::find($id);
       
        $our_team->page_name = $request->page_name;
        $our_team->description = $request->description;
        $our_team->title = $request->title;
        $our_team->keywords = $request->keywords;
        $our_team->save();
        return redirect()->route('seosettings.index')->with('success','SEO update  successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SeoSetting::find($id)->delete();
        return redirect()->back()->with('success','Seo setting delete successfully');
    }
}
