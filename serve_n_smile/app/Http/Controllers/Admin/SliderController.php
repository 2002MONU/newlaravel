<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.homepage.slider-details',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homepage.add-slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'heading' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:sliders,priority',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $slider = new Slider();
        if($request->hasFile('banner_image')){
            $filename = $request->file('banner_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('banner_image')->move(public_path('assets/dynamics'),$name);
            $slider->image = $name;
        }
        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->priority = $request->priority;
        $slider->save();
        return redirect()->route('sliders.index')->with('success','Slider add successfully');
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
        $slider = Slider::find($id);
        return view('admin.homepage.edit-slider',compact('slider'));
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
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:sliders,priority,'.$id,
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $slider =  Slider::find($id);
        if($request->hasFile('banner_image')){
            $filename = $request->file('banner_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('banner_image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $slider->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $slider->image = $name;
        }
        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->priority = $request->priority;
        $slider->save();
        return redirect()->route('sliders.index')->with('success','Slider update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::where('id',$id)->first();
        if($slider){
            $oldImagePath2 = public_path('assets/dynamics/' . $slider->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $slider->delete();
            return redirect()->back()->with('success','Slider Image delete successfully');
        }else{
            return redirect()->back()->with('error','Slider Image does not found successfully');
        }
    }
}
