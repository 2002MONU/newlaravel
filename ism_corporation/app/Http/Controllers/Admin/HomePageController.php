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
            'banner_image' => 'required|image|mimes:jpg,png,jpeg,webp|max:2028',
            'title' => 'required|string',
            'priority' => 'required|unique:sliders,priority',
            'status' => 'required|in:1,0',
        ]);

        $slider = new Slider();
        if($request->hasFile('banner_image')){
            $filename = $request->file('banner_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('banner_image')->move(public_path('assets/dynamics/slider'),$name);
            $slider->banner_image = $name;
        }
        
        $slider->title = $request->title;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('homepages.index')->with('success','Slider Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
            'banner_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2028',
            'title' => 'required|string',
            'priority' => 'required|unique:sliders,priority,'.$id,
            'status' => 'required|in:1,0',
        ]);

        $slider =  Slider::find($id);
        if($request->hasFile('banner_image')){
            $filename = $request->file('banner_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('banner_image')->move(public_path('assets/dynamics/slider'),$name);
              // older image delete after update
            $oldImagePath = public_path('assets/dynamics/slider/' . $slider->banner_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            $slider->banner_image = $name;
        }
        
        $slider->title = $request->title;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('homepages.index')->with('success','Slider Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::where('id', $id)->first();
        if ($slider) {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/slider/' . $slider->banner_image);
            
         // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) {
                // Delete the  image
                unlink($imagePath1);
            }
          $slider->delete();
           return redirect()->back()->with('success', 'Images and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}
