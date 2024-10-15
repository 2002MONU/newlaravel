<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeautifullCreation;
use Illuminate\Http\Request;

class BeautifullCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = BeautifullCreation::get();
        return view('admin.about.creation-details',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.add-creation');
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
             'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:beautifull_creations,priority',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
           
        ]);
        $gallery = new BeautifullCreation();
        // service image small 
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $gallery->image = $name;
        }
         
       
        $gallery->priority = $request->priority;
        $gallery->status = $request->status;
        $gallery->save();
        return redirect()->route('beautiful-creations.index')->with('success','Gallery  add successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = BeautifullCreation::find($id);
        if ($gallery) {
            // Delete the image file from the folder if it exists
            $imagePath = public_path('assets/dynamics/' . $gallery->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Remove the file
            }
    
            // Delete the gallery record from the database
            $gallery->delete();
    
            return redirect()->back()->with('success', 'Gallery deleted successfully');
        }
    
        return redirect()->back()->with('error', 'Gallery not found');
    }
}
