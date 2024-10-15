<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whyChooseUs = WhyChooseUs::get();
        return view('admin.about.why-choose-us',compact('whyChooseUs'));
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
        $whyChooseUs = WhyChooseUs::find($id);
        return view('admin.about.edit-why-choose',compact('whyChooseUs'));
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
            'heading' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'p_01' => 'required|string',
            'p_02' => 'required|string',
            'h_01' => 'required|string',
            'h_02' => 'required|string',
            'big_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'image_small_01' => 'nullable|image|mimes:jpg,png,jpeg,webp,svg|max:2048',
            'image_small_02' => 'nullable|image|mimes:jpg,png,jpeg,webp,svg|max:2048',
            'youtube_link' => 'required|url',
        ]);

        $whyChooseUs = WhyChooseUs::find($id);

        if($request->hasFile('big_image')){
            $filename = $request->file('big_image')->getClientOriginalExtension();
            $name = (time()+1) .'.'.$filename;  // send different name
            $filepath = $request->file('big_image')->move(public_path('assets/dynamics'),$name); // image folder 
            $whyChooseUs->big_image = $name;
        } 
        if($request->hasFile('image_small_01')){
            $filename = $request->file('image_small_01')->getClientOriginalExtension();
            $name = (time()+1) .'.'.$filename;  // send different name
            $filepath = $request->file('image_small_01')->move(public_path('assets/dynamics'),$name); // image folder 
            $whyChooseUs->image_small_01 = $name;
        } 
        if($request->hasFile('image_small_02')){
            $filename = $request->file('image_small_02')->getClientOriginalExtension();
            $name = (time()+1) .'.'.$filename;  // send different name
            $filepath = $request->file('image_small_02')->move(public_path('assets/dynamics'),$name); // image folder 
            $whyChooseUs->image_small_02 = $name;
        } 

        $whyChooseUs->heading = $request->heading;
        $whyChooseUs->title = $request->title;
        $whyChooseUs->description = $request->description;
        $whyChooseUs->youtube_link = $request->youtube_link;
        $whyChooseUs->p_01 = $request->p_01;
        $whyChooseUs->p_02 = $request->p_02;
        $whyChooseUs->h_01 = $request->h_01;
        $whyChooseUs->h_02 = $request->h_02;
        $whyChooseUs->save();
        return redirect()->route('why-choose-us.index')->with('success','Why choose update successfully');
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
