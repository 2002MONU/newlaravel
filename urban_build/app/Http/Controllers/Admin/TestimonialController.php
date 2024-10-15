<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials  = Testimonial::get();
        return view('admin.testimonial.testimonial-details',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.add-testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:testimonials,priority',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $testimonial = new Testimonial();
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $testimonial->image = $name;
        }
        $testimonial->name = $request->name;
       
        $testimonial->description = $request->description;
        $testimonial->status = $request->status;
        $testimonial->priority = $request->priority;
        $testimonial->save();
        return redirect()->route('testimonials.index')->with('success','Testimonials add successfully');
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit-testimonial',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:testimonials,priority,'.$id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $testimonial =  Testimonial::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $testimonial->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $testimonial->image = $name;
        }
        $testimonial->name = $request->name;
         $testimonial->description = $request->description;
        $testimonial->status = $request->status;
        $testimonial->priority = $request->priority;
        $testimonial->save();
        return redirect()->route('testimonials.index')->with('success','Testimonials updatesuccessfully successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::where('id',$id)->first();
        if($testimonial){
            $oldImagePath2 = public_path('assets/dynamics/' . $testimonial->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $testimonial->delete();
            return redirect()->back()->with('success','Testimonial Image & records  delete successfully');
        }else{
            return redirect()->back()->with('error','Slider Image does not found successfully');
        }
    
    }
}
