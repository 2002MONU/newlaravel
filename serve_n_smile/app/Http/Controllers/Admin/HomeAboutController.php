<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAbout;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = HomeAbout::find(1);
        return view('admin.homepage.about-details',compact('about'));
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
        $about = HomeAbout::find($id);
        return view('admin.homepage.edit-about',compact('about'));
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
            'heading' => 'required|string',
            'description' => 'required|string',
             'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
             'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $slider =  HomeAbout::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $slider->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $slider->image = $name;
        }
        if($request->hasFile('image2')){
            $filename = $request->file('image2')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('image2')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $slider->image2);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $slider->image2 = $name;
        }
        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->description = $request->description;
        
        $slider->save();
        return redirect()->route('homeabouts.index')->with('success','Home about update successfully');
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
