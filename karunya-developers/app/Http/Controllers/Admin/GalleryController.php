<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::get();
        return view('admin.gallery.gallery-details',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.add-gallery');
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
            'layout' => 'required|string',
            'design_name' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:galleries,priority',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
           
        ]);
        $gallery = new Gallery();
        // service image small 
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $gallery->image = $name;
        }
         
        $gallery->layout = $request->layout;
        $gallery->design_name = $request->design_name;
        $gallery->priority = $request->priority;
        $gallery->status = $request->status;
        $gallery->save();
        return redirect()->route('galleries.index')->with('success','Gallery  add successfully');
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
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit-gallery',compact('gallery'));
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
            'layout' => 'required|string',
            'design_name' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:galleries,priority,'.$id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
           
        ]);
        $gallery =  Gallery::find($id);
        // service image small 
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $gallery->image = $name;
        }
         
        $gallery->layout = $request->layout;
        $gallery->design_name = $request->design_name;
        $gallery->priority = $request->priority;
        $gallery->status = $request->status;
        $gallery->save();
        return redirect()->route('galleries.index')->with('success','Gallery  update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $gallery = Gallery::find($id);

    if ($gallery) {
        // Delete the image file from the folder if it exists
        $imagePath = public_path('assets/dynamics/' . $gallery->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Remove the file
        }

        // Delete the gallery record from the database
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully');
    }

    return redirect()->route('galleries.index')->with('error', 'Gallery not found');
}

}
