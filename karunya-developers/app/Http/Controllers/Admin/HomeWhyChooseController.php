<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeWhyChoose;
use Illuminate\Http\Request;

class HomeWhyChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $whyChooseUs = HomeWhyChoose::find($id);
        return view('admin.homepage.home-why-choose',compact('whyChooseUs'));
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
           'title' => 'required|string',
            'description' => 'required|string',
            'mission_description' => 'required|string',
            'vission_description' => 'required|string',
            'value_description' => 'required|string',
           'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
         ]);

        $whyChooseUs = HomeWhyChoose::find($id);

        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = (time()+1) .'.'.$filename;  // send different name
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name); // image folder 
            $whyChooseUs->side_image = $name;
        } 
       

        
        $whyChooseUs->title = $request->title;
        $whyChooseUs->description = $request->description;
        $whyChooseUs->mission_description = $request->mission_description;
        $whyChooseUs->vission_description = $request->vission_description;
        $whyChooseUs->value_description = $request->value_description;
         $whyChooseUs->save();
        return redirect()->back()->with('success','Why choose update successfully');
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
