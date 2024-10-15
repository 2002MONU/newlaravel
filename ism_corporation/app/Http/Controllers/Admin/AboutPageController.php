<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAbout;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = HomeAbout::find(1);
        return view('admin.homepage.about-details',compact('about'));
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
        $about = HomeAbout::find($id);
        return view('admin.homepage.edit-about',compact('about'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title' =>'required|string',
            'description' =>'required|string',
        ]);

        $about = HomeAbout::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics/slider'),$name);
            $oldImagePath = public_path('assets/dynamics/slider/' . $about->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $about->image = $name;
        }

        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();
        return redirect()->route('homeabouts.index')->with('success','About details update successfully');
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
