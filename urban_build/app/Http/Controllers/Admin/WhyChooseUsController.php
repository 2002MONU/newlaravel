<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $whyChooseUs = WhyChooseUs::find($id);
        return view('admin.homepage.home-why-choose',compact('whyChooseUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'box_01_title' => 'required|string',
            'box_02_title' => 'required|string',
            'box_03_title' => 'required|string',
            'box_04_title' => 'required|string',
            'box_05_title' => 'required|string',
            'box_01_description' => 'required|string',
            'box_02_description' => 'required|string',
            'box_03_description' => 'required|string',
            'box_04_description' => 'required|string',
            'box_05_description' => 'required|string',
            'year' => 'required|Integer|min:1',
            'side_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
          ]);
 
         $whyChooseUs = WhyChooseUs::find($id);
         if($request->hasFile('side_image')){
             $filename = $request->file('side_image')->getClientOriginalExtension();
             $name = (time()+1) .'.'.$filename;  // send different name
             $filepath = $request->file('side_image')->move(public_path('assets/dynamics'),$name); // image folder 
             $whyChooseUs->side_image = $name;
         } 
        
         $whyChooseUs->title = $request->title;
         $whyChooseUs->box_01_title = $request->box_01_title;
         $whyChooseUs->box_02_title = $request->box_02_title;
         $whyChooseUs->box_03_title = $request->box_03_title;
         $whyChooseUs->box_04_title = $request->box_04_title;
         $whyChooseUs->box_05_title = $request->box_05_title;
         $whyChooseUs->description = $request->description;
         $whyChooseUs->box_01_description = $request->box_01_description;
         $whyChooseUs->box_02_description = $request->box_02_description;
         $whyChooseUs->box_03_description = $request->box_03_description;
         $whyChooseUs->box_04_description = $request->box_04_description;
         $whyChooseUs->box_05_description = $request->box_05_description;
         $whyChooseUs->year = $request->year;
         $whyChooseUs->save();
         return redirect()->back()->with('success','Why choose update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
