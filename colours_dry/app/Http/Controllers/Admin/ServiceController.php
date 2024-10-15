<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;  
use Illuminate\Support\Facades\DB;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return view('admin.service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.add');
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
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048', 
           
            'description'=>'required|string',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:services,priority',
           
            
        ];

        $messages = [
            'name.required' => 'The service name is required.',
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must be less than 2MB.',
         
            'description.required'=>'The service Description is required.',
            'status.required' => 'The service status is required.',
            'status.in' => 'The service status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      

        $data = new Service();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/serviceImage'), $imageName);
            $data->image = $imageName;
        }
       
        
       
       
        $data->name = $request->input('name');
       
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
       
        $data->save();

        return redirect()->route('services.index')->with('success', 'Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048', 
           
            'description'=>'required|string',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:services,priority,' . $service->id, 
           
            
        ];

        $messages = [
            'name.required' => 'The service name is required.',
            
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must be less than 2MB.',
         
            'description.required'=>'The service Description is required.',
            'status.required' => 'The service status is required.',
            'status.in' => 'The service status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/serviceImage'), $imageName);
           $service->image = $imageName;
        }
       
        
       
       
       $service->name = $request->input('name');
       
       $service->description = $request->input('description');
       $service->status = $request->input('status');
       $service->priority = $request->input('priority');
       
       $service->save();

        return redirect()->route('services.index')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
  


        return redirect()->route('services.index')->with('success', 'Deleted Successfully.');
    }
}
