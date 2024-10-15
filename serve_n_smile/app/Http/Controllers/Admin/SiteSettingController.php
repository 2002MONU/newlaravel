<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site_setting = SiteSetting::find(1);
        return view('admin.setting.site-details',compact('site_setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $site_setting = SiteSetting::find($id);
        return view('admin.setting.edit-sitesetting',compact('site_setting'));
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
            'site_name' => 'required|string',
             'service_title' => 'required|string',
             'service_heading' => 'required|string',
            'howit_title' => 'required|string',
            'blog_title' => 'required|string',
            'faq_title' => 'required|string',
            'about_banner' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'header_logo' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'blog_banner' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'service_banner' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'contact_banner' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            ]);
           $site_setting = SiteSetting::find($id);
           foreach ([ 'header_logo',  'favicon', 'about_banner', 'blog_banner', 'service_banner', 'contact_banner'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $filename = time() .'.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/dynamics'), $filename);
                $site_setting->$imageField = $filename;
            }
        }
    
           $site_setting->site_name = $request->site_name;
           $site_setting->service_title = $request->service_title;
           $site_setting->service_heading = $request->service_heading;
           $site_setting->howit_title = $request->howit_title;
           $site_setting->blog_title = $request->blog_title;
           $site_setting->faq_title = $request->faq_title;
          
           $site_setting->save();
           return redirect()->route('sitesettings.index')->with('success','Site Setting update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
