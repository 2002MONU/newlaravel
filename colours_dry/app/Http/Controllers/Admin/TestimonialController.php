<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial.testimonial-details',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.add-testimonial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048', 
            'description'=>'required|string',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:testimonials,priority',
         ];

        $messages = [
            'name.required' => 'The testimonial name is required.',
            'designation.required' => 'The testimonial designation is required.',
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must be less than 2MB.',
            'description.required'=>'The testimonial Description is required.',
            'status.required' => 'The testimonial status is required.',
            'status.in' => 'The testimonial status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        
        ];
           $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $data = new Testimonial();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/serviceImage'), $imageName);
            $data->image = $imageName;
        }
       
        $data->name = $request->input('name');
        $data->designation = $request->input('designation');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
       
        $data->save();

        return redirect()->route('testimonials.index')->with('success', 'Added Successfully.');
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit-testimonial',compact('testimonial'));
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
        $rules = [
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', 
            'description'=>'required|string',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:testimonials,priority,'.$id,
         ];

        $messages = [
            'name.required' => 'The testimonial name is required.',
            'designation.required' => 'The testimonial designation is required.',
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must be less than 2MB.',
            'description.required'=>'The testimonial Description is required.',
            'status.required' => 'The testimonial status is required.',
            'status.in' => 'The testimonial status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        
        ];
           $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $data =  Testimonial::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/serviceImage'), $imageName);
            $data->image = $imageName;
        }
       
        $data->name = $request->input('name');
        $data->designation = $request->input('designation');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
       
        $data->save();

        return redirect()->route('testimonials.index')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::where('id',$id)->first();
        if($testimonial){
            $oldImagePath2 = public_path('admin/serviceImage/' . $testimonial->image);
           
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
           
            $testimonial->delete();
            return redirect()->back()->with('success','Testimonial details  delete  successfully');
        }else{
            return redirect()->back()->with('error','Testimonial Image does not found successfully');
        }
    }
}
