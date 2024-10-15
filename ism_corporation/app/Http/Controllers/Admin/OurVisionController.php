<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurVision;
use Illuminate\Http\Request;

class OurVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vision = OurVision::find(1);
        return view('admin.ourcompany.vision-details',compact('vision'));
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
        $vision = OurVision::find($id);
        return view('admin.ourcompany.edit-vision',compact('vision'));
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
            'vision_description' => 'required|string',
            'object_description' => 'required|string',
            'vision_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'object_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $vision = OurVision::find($id);
        // vision image
        if($request->hasFile('vision_image')){
            $filename = $request->file('vision_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('vision_image')->move(public_path('assets/dynamics/ourcompany'),$name);
            $oldImagePath = public_path('assets/dynamics/ourcompany/' . $vision->vision_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $vision->vision_image = $name;
        }
        // objective image 
        if($request->hasFile('object_image')){
            $filename = $request->file('object_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('object_image')->move(public_path('assets/dynamics/ourcompany'),$name);
            $oldImagePath = public_path('assets/dynamics/ourcompany/' . $vision->object_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $vision->object_image = $name;
        }
        $vision->vision_description = $request->vision_description;
        $vision->object_description = $request->object_description;
        $vision->save();
        return redirect()->route('ourvisions.index')->with('success','Vision update successfully');
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
