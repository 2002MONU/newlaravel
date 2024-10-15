<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::get();
        return view('admin.services.services-details',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add-services');
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
            'service_name' => 'required|string',
            'service_icon' =>'required|image|mimes:jpg,jpeg,png|max:1024',
            'status'=> 'required|in:0,1',
            'priority' => 'nullable|integer|unique:services,priority'
        ]);
        $service = new Service();
        $filename = $request->file('service_icon')->getClientOriginalExtension();
        $image_name = time().''.$filename;
        $filepath = $request->file('service_icon')->move(public_path('assets/dynamics/service'),$image_name);

        $service->service_icon = $image_name;
        $service->service_name = $request->service_name;
        $service->slug = Str::slug($request->service_name);
        $service->status = $request->status;
        $service->priority = $request->priority;
        $service->save();
        return redirect()->route('services.index')->with('success','Service details add successfully');
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
        $service = Service::find($id);
        return view('admin.services.edit-services',compact('service'));
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
            'service_name' => 'required|string',
            'service_icon' =>'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'status'=> 'required|in:0,1',
            'priority' => 'nullable|integer|unique:services,priority,'.$id
        ]);
        $service =  Service::find($id);
        if($request->hasFile('service_icon'))
        {
            $filename = $request->file('service_icon')->getClientOriginalExtension();
            $image_name = time().'.'.$filename;
            $filepath = $request->file('service_icon')->move(public_path('assets/dynamics/service'),$image_name);
            $imagePath1 = public_path('assets/dynamics/service/'.$service->service_icon);
           
            // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) 
            {
              unlink($imagePath1);
            }
            $service->service_icon = $image_name;  
        }
        
        $service->service_name = $request->service_name;
        $service->slug = Str::slug($request->service_name);
        $service->status = $request->status;
        $service->priority = $request->priority;
        $service->save();
        return redirect()->route('services.index')->with('success','Service details update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::where('id',$id)->first();
        if ($service) 
        {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/service/'.$service->service_icon);
           
            // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) 
            {
                // Delete the first image
                unlink($imagePath1);
            }
            $service->delete();
            return redirect()->back()->with('success','Service delete Successfully');
        }
        else 
        {
        return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}
