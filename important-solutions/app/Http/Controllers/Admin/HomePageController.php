<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
class HomePageController extends Controller
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
            'title' =>'required|string',
            'heading' =>'required|string',
            'banner_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'priority' => 'nullable|integer|unique:sliders,priority',
            'status' => 'required|in:1,0',
        ]);
        $slider = new Slider();
        // banner image
        $filename = $request->file('banner_image')->getClientOriginalExtension();
        $image_name = time().'.'.$filename; // send unique name
        $filepath = $request->file('banner_image')->move(public_path('assets/dynamics/slider'),$image_name);
        
        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->banner_image = $image_name;
        $slider->save();
        return redirect()->route('homepages.index')->with('success','Slider add successfully');
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
            'title' =>'required|string',
            'heading' =>'required|string',
            'banner_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'priority' => 'nullable|integer|unique:sliders,priority,'.$id,
            'status' => 'required|in:1,0',
        ]);
        $slider =  Slider::find($id);
        // banner image
        if($request->hasFile('banner_image'))
        {
        $filename = $request->file('banner_image')->getClientOriginalExtension();
        $image_name = time().'.'.$filename; // send unique name
        $filepath = $request->file('banner_image')->move(public_path('assets/dynamics/slider'),$image_name);
        $oldImagePath2 = public_path('assets/dynamics/slider/' . $slider->banner_image);
        if (file_exists($oldImagePath2)) {
            unlink($oldImagePath2);
        }
        $slider->banner_image = $image_name;
         }
        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
       
        $slider->save();
        return redirect()->route('homepages.index')->with('success','Slider update successfully');
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
        if ($slider) 
        {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/slider/'.$slider->banner_image);
           
            // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) 
            {
                // Delete the first image
                unlink($imagePath1);
            }
            $slider->delete();
            return redirect()->back()->with('success','Slider delete Successfully');
        }
        else 
        {
        return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}