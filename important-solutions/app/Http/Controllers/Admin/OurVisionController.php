<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurVision;
use Illuminate\Http\Request;

class OurVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $our_vision = OurVision::find(1);
        return view('admin.homepage.ourvision-details',compact('our_vision'));
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
        $our_vision = OurVision::find($id);
        return view('admin.homepage.edit-ourvision',compact('our_vision'));
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
        'our_vision'=> 'required|string',
        'our_mission'=> 'required|string',
        'vision_icon'=> 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        'mission_icon'=> 'nullable|image|mimes:jpeg,png,jpg|max:1024',
       ]);
       $our_vision = OurVision::find($id);
       if($request->hasFile('vision_icon')){
        $filename = $request->file('vision_icon')->getClientOriginalExtension();
        $name = time().'.'.$filename;
        $filepath = $request->file('vision_icon')->move(public_path('assets/dynamics/slider'),$name);
        $our_vision->vision_icon = $name;
       }
       
       if($request->hasFile('mission_icon')){
        $filename1 = $request->file('mission_icon')->getClientOriginalExtension();
        $name1 = (time() + 1).'.'.$filename1;
        $filepath1 = $request->file('mission_icon')->move(public_path('assets/dynamics/slider'),$name1);
        $our_vision->mission_icon = $name1;
       }
       $our_vision->our_vision = $request->our_vision;
       $our_vision->our_mission = $request->our_mission;
       $our_vision->save();
       return redirect()->route('ourvisions.index')->with('success','Vision & Mission details update successfully');
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
