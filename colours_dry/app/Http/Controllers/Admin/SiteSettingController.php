<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    function index(){

        $sitesettings = SiteSetting::get();
            // return $state;
            return view('admin.siteSetting.index',compact('sitesettings'));
        
       }
    public function update(Request $request,$id)
    {

    //    return $request;
       $request->validate([
        'site_title' => 'required|string|max:255',
        'logo' => 'image|mimes:jpeg,jpg,png|max:5120',
        'favicon' => 'image|mimes:jpeg,jpg,png|max:5120',
        'ftlogo' => 'image|mimes:jpeg,jpg,png|max:5120',
        'address' => 'required|string|max:255',
        'email' => 'required|email|max:255',
       
        'phone' => ['required', 'numeric', 'regex:/^\d{1,10}$/'],
        'whatsapp' => ['required', 'numeric', 'regex:/^\d{1,10}$/'],
        'instagram' => 'required|url|max:255',
        'facebook' => 'required|url|max:255',
        'youtube' => 'required|url|max:255',
        'twitter' => 'required|url|max:255',
        'og_title' => 'required|string|max:255',
        'og_type' => 'required|string|max:255',
        'og_url' => 'required|string|max:255',
        'og_site_name' => 'required|string|max:255',
        'og_image' => 'image|mimes:jpeg,jpg,png|max:5120',
        'og_width' => 'required|string|max:255',
        'og_height' => 'required|string|max:255',
        'og_description'=>'required',
        'twitter_card' => 'required|string|max:255',
        'twitter_title' => 'required|string|max:255',
        'twitter_image' => 'image|mimes:jpeg,jpg,png|max:5120',
        'site_location' => 'required',
        'site_about' => 'required|max:255', 
        'map_address' => 'required', 
        'open_timing' => 'required', 
       
    
    ]);
 
        $data= SiteSetting::find($id);
      

        if ($request->hasFile('logo')) {
            $img_extension = $request->file('logo')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('logo')->move(public_path('admin/siteImage/logo'), $name);
            $data->logo = $name;
        } 
        if ($request->hasFile('favicon')) {
            $img_extension = $request->file('favicon')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('favicon')->move(public_path('admin/siteImage/favicon'), $name);
            $data->favicon = $name;
        } 
        if ($request->hasFile('ftlogo')) {
            $img_extension = $request->file('ftlogo')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('ftlogo')->move(public_path('admin/siteImage/ftlogo'), $name);
            $data->ftlogo = $name;
        }     
        if ($request->hasFile('og_image')) {
            $img_extension = $request->file('og_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('og_image')->move(public_path('admin/siteImage/og-image'), $name);
            $data->og_image = $name;
        } 
        if ($request->hasFile('twitter_image')) {
            $img_extension = $request->file('twitter_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('twitter_image')->move(public_path('admin/siteImage/twitter-image'), $name);
            $data->twitter_image = $name;
        } 
        $data->site_title = $request->input('site_title');
        $data->address = $request->input('address');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->whatsapp = $request->input('whatsapp');
    

        $data->instagram = $request->input('instagram');
        $data->facebook = $request->input('facebook');
        $data->twitter = $request->input('twitter');
        $data->youtube = $request->input('youtube');
      
        $data->og_title = $request->input('og_title');
        $data->og_type = $request->input('og_type');
        $data->og_url = $request->input('og_url');
        $data->og_site_name = $request->input('og_site_name');
        $data->og_width = $request->input('og_width');
        $data->og_height = $request->input('og_height');
        $data->twitter_card = $request->input('twitter_card');
        $data->twitter_title = $request->input('twitter_title');
        $data->site_about = $request->input('site_about');
        $data->site_location = $request->input('site_location');
        $data->map_address = $request->input('map_address');
        $data->open_timing = $request->input('open_timing');
        $data->save();

        return redirect()->route('sitesettings.index')
                        ->with('success','Updated Successfully.');
    }


public function edit($id)
    {
        $sitesettings = SiteSetting::findOrFail($id);
        return view('admin.siteSetting.edit', compact('sitesettings'));
    }
}
