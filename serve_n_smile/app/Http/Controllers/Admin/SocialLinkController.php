<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocilaLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_link = SocilaLink::find(1);
        return view('admin.setting.social-links',compact('social_link'));
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
        $social = SocilaLink::find($id);
        return view('admin.setting.edit-social-links',compact('social'));
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
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'google_plus' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'snapchat' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'open_time' => 'nullable|string',
        ]);

        $social  = SocilaLink::find($id);
        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->google_plus = $request->google_plus;
        $social->pinerent = $request->pinterest;
        $social->spanchat = $request->snapchat;
        $social->linkedin = $request->linkedin;
        $social->open_time = $request->open_time;
        $social->save();
        return redirect()->route('sociallinks.index')->with('success','Social Links update successfully');

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
