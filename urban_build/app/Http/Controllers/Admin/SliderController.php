<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.homepage.slider-details',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.homepage.add-slider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'span_01' => 'required|string',
            'span_02' => 'required|string',
            'h_01' => 'required|string',
            'h_02' => 'required|string',
            'h_03' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|integer|unique:sliders,priority',
            'image' =>'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'status' => 'required|in:0,1',
        ]);

        $slider = new Slider();
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time() .'.'.$filename;  // send different name
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name); // image folder 
            $slider->banner_image = $name;
        } 
        $slider->span_01 = $request->span_01;
        $slider->span_02 = $request->span_02;
        $slider->h_01 = $request->h_01;
        $slider->h_02 = $request->h_02;
        $slider->h_03 = $request->h_03;
        $slider->description = $request->description;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('sliders.index')->with('success','Slider  added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::find($id);
        return view('admin.homepage.edit-slider',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'span_01' => 'required|string',
            'span_02' => 'required|string',
            'h_01' => 'required|string',
            'h_02' => 'required|string',
            'h_03' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|integer|unique:sliders,priority,'.$id,
            'image' =>'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'status' => 'required|in:0,1',
        ]);

        $slider =  Slider::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time() .'.'.$filename;  // send different name
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name); // image folder 
            $oldImagePath2 = public_path('assets/dynamics/' . $slider->banner_image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $slider->banner_image = $name;
        } 
        $slider->span_01 = $request->span_01;
        $slider->span_02 = $request->span_02;
        $slider->h_01 = $request->h_01;
        $slider->h_02 = $request->h_02;
        $slider->h_03 = $request->h_03;
        $slider->description = $request->description;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('sliders.index')->with('success','Slider  updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Slider = Slider::where('id', $id)->first();
        if($Slider)
        {
            $imagePath1 = public_path('assets/dynamics/' . $Slider->banner_image);
            if (file_exists($imagePath1)) {
                // Delete the first image
                unlink($imagePath1);
            }
        $Slider->delete();
            
        return redirect()->back()->with('success', 'Images and associated record deleted successfully.');
       }
         else
        {
        return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}
