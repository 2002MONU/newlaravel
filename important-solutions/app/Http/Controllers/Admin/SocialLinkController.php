<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sociallinks;
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
        $social_link = Sociallinks::find(1);
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
        $social = Sociallinks::find($id);
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
            'facebook' => 'required|string|url',
            'twitter' => 'required|string|url',
            'linked' => 'required|string|url',
            'whatapps' => 'required|string|integer',
            'call_us' => 'required|string|integer',
        ]);

        $social = Sociallinks::find($id);
        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->linked = $request->linked;
        $social->whatapps = $request->whatapps;
        $social->call_us = $request->call_us;
        $social->save();
        return redirect()->route('sociallinks.index')->with('success','Social Links update Successfully');
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
