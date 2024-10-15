<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SliderVideo;
use Illuminate\Http\Request;

class SliderVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $slider = SliderVideo::find($id);
        return view('admin.homepage.editslider-video',compact('slider'));
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
            'banner_video' => 'required|mimes:mp4,mov,ogg,qt|max:25000', // max: 25 MB

        ]);

        $slider = SliderVideo::find($id); 
        if($request->hasFile('banner_video')){
            $filename = $request->file('banner_video')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('banner_video')->move(public_path('assets/dynamics'),$name);
            $oldImagePath = public_path('assets/dynamics/' . $slider->video);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $slider->video = $name;
        }
        $slider->save();
        return redirect()->back()->with('success','Slider video update successfully');
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
