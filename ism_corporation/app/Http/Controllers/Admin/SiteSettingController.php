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
        'product_title' => 'required|string',
        'team_title' => 'required|string',
        'footer_title' => 'required|string',
        'ethical_title' => 'required|string',
        'otc_title' => 'required|string',
        'reach_out_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'header_logo' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'footer_logo' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'favicon' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'company_background' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'product_background' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'export_background' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'career_background' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'contact_background' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'achieve_back' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
       ]);
       $site_setting = SiteSetting::find($id);
       foreach (['reach_out_image', 'header_logo', 'footer_logo', 'favicon', 'company_background', 'product_background', 'export_background', 'career_background', 'contact_background', 'achieve_back'] as $imageField) {
        if ($request->hasFile($imageField)) {
            $file = $request->file($imageField);
            $filename = time() .'.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/dynamics/setting'), $filename);
            $site_setting->$imageField = $filename;
        }
    }

       $site_setting->site_name = $request->site_name;
       $site_setting->product_title = $request->product_title;
       $site_setting->team_title = $request->team_title;
       $site_setting->footer_title = $request->footer_title;
       $site_setting->ethical_title = $request->ethical_title;
       $site_setting->otc_title = $request->otc_title;
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
