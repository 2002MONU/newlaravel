<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Together;
use Illuminate\Http\Request;

class TogetherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $together = Together::find(1);
        return view('admin.about.together-details',compact('together'));
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
        $together = Together::find($id);
        return view('admin.about.edit-together',compact('together'));
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
             
        ]);
        $together =  Together::find($id);
        // about page image 
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $together->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $together->image = $name;
        } 
        // home page image 
        if($request->hasFile('home_image')){
            $filename = $request->file('home_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('home_image')->move(public_path('assets/dynamics'),$name);
            // $oldImagePath2 = public_path('assets/dynamics/' . $together->home_image);
            // if (file_exists($oldImagePath2)) {
            //     unlink($oldImagePath2);
            // }
            $together->home_image = $name;
        }
        
        $together->title = $request->title;
       $together->description = $request->description;
        $together->save();
        return redirect()->route('togethers.index')->with('success',' Together details update successfully');
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
