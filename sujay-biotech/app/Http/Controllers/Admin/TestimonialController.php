<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
       $testimonials = Testimonial::get();

        return view('admin.testimonial.index', compact('testimonials'));

    }
    public function create()
    {

        return view('admin.testimonial.add');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'designation'=>'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:5120',
            'status'=>'required',
            'priority' => 'required|numeric|max:255',
           
            
        ]);

        $data = new Testimonial();


        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/imgTestimonial'), $name);
            $data->image = $name;
        }
       
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->designation = $request->input('designation');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');



        $data->save();



        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Added Successfully.');

    }
    public function delete($id)
    {
        $enquiry = Testimonial::where('id', $id)->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'Deleted successfully.');
    }
    

    public function update(Request $request, $id)
    {

        // return $request;
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'designation'=>'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:5120',
            'status'=>'required',
            'priority' => 'required|numeric|max:255',
           
        ]);

        $data = Testimonial::where('id',$id)->first();


        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/imgTestimonial'), $name);
            $data->image = $name;
        }
        $data->name = $request->input('name');
        $data->designation = $request->input('designation');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
    


        $data->save();



        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Updated Successfully.');
    }


    public function edit($id)
    {
        $testimonials = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonials'));
    }
}
