<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutVision;
use Illuminate\Http\Request;

class AboutVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_vision = AboutVision::find(1);
        return view('admin.about.together-details',compact('about_vision'));
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
        $about_vision = AboutVision::find($id);
        return view('admin.about.edit-together',compact('about_vision'));
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
            'what_we_do' => 'required|string',
            'ourvision' => 'required|string',
            'who_we_are' => 'required|string',
            'our_team' => 'required|string',
        ]);
        $our_Achievement =  AboutVision::find($id);
        $our_Achievement->what_we_do = $request->what_we_do;
        $our_Achievement->ourvision = $request->ourvision;
        $our_Achievement->who_we_are = $request->who_we_are;
        $our_Achievement->our_team = $request->our_team;
        $our_Achievement->save();
        return redirect()->route('aboutvisions.index')->with('success','About Vision update successfully');
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
