<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::find(1);
        return view('admin.about.about-details',compact('about'));
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
        $about = About::find($id);
        return view('admin.about.edit-about',compact('about'));
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
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'pdf' => 'nullable|file|mimes:pdf,doc,docx|max:5212',
            'title' =>'required|string',
            'heading' =>'required|string',
            'description' =>'required|string',
        ]);
        
        $about = About::find($id);
        
       if ($request->hasFile('images')) {
         $imageNames = [];  // Array to store image names

        foreach ($request->file('images') as $image) {
        // Generate a unique filename for each image
        $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
       
       // Move the image to the public directory
        $image->move(public_path('assets/dynamics/slider'), $filename);

       // Save the image filename in the array
        $imageNames[] = $filename;
        // Optionally, remove the old image if it exists
        $oldImagePath = public_path('assets/dynamics/slider/' . $about->image);
        if (file_exists($oldImagePath) && !is_dir($oldImagePath)) {
            unlink($oldImagePath);
        }
    }
    // Save the image names to the database as a JSON or serialized array
    $about->image = json_encode($imageNames);
}

        
        if ($request->hasFile('pdf')) {
            $filename = (time() + 1) . '.' . $request->file('pdf')->getClientOriginalExtension();
            $filepath = $request->file('pdf')->move(public_path('assets/dynamics/slider'), $filename);
        
            // Remove the old PDF if it exists
            $oldPdfPath = public_path('assets/dynamics/slider/' . $about->pdf);
            if (file_exists($oldPdfPath) && !is_dir($oldPdfPath)) {
                unlink($oldPdfPath);
            }
        
            $about->pdf = $filename;
        }
        
        $about->title = $request->title;
        $about->heading = $request->heading;
        $about->description = $request->description;
        $about->save();
        
        return redirect()->route('abouts.index')->with('success', 'About details updated successfully');
        
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
