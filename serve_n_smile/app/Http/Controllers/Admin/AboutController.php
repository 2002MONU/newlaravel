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
            'title' => 'required|string',
            
            'description' => 'required|string',
             'small_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
             'big_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $about =  About::find($id);
        if($request->hasFile('small_image')){
            $filename = $request->file('small_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('small_image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $about->small_image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $about->small_image = $name;
        }
        if($request->hasFile('big_image')){
            $filename = $request->file('big_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('big_image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $about->big_image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $about->big_image = $name;
        }
        $about->title = $request->title;
       $about->description = $request->description;
        
        $about->save();
        return redirect()->route('abouts.index')->with('success',' About update successfully');
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
