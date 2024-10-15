<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ServiceController extends Controller
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
            'title' => 'required|string',
            'price' => 'required|integer',
            'cleaning_hour' => 'required|string',
            'no_of_cleaner' => 'required|integer',
            'visiting_hours' => 'required|string',
            'contact' => 'required|integer|digits:10',
            'email' => 'required|email',
            'description' => 'required|string|min:50',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:services,priority',
            'service_image_small' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'service_image_big' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $services = new Service();
        // service image small 
        if($request->hasFile('service_image_small')){
            $filename = $request->file('service_image_small')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('service_image_small')->move(public_path('assets/dynamics'),$name);
            $services->service_image_small = $name;
        }
         // service big image  
        if($request->hasFile('service_image_big')){
            $filename = $request->file('service_image_big')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('service_image_big')->move(public_path('assets/dynamics'),$name);
            $services->service_image_big = $name;
        }
        $services->title = $request->title;
        $services->slug = Str::slug($request->title);
        $services->price = $request->price;
        $services->cleaning_hour = $request->cleaning_hour;
        $services->no_of_cleaner = $request->no_of_cleaner;
        $services->visiting_hours = $request->visiting_hours;
        $services->contact = $request->contact;
        $services->email = $request->email;
        $services->description = $request->description;
        $services->status = $request->status;
        $services->priority = $request->priority;
        $services->save();
        return redirect()->route('services.index')->with('success','Services  add successfully');
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
            'title' => 'required|string',
            'price' => 'required|integer',
            'cleaning_hour' => 'required|string',
            'no_of_cleaner' => 'required|integer',
            'visiting_hours' => 'required|string',
            'contact' => 'required|integer|digits:10',
            'email' => 'required|email',
            'description' => 'required|string|min:50',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:services,priority,'.$id,
            'service_image_small' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'service_image_big' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $services =  Service::find($id);
        // service image small 
        if($request->hasFile('service_image_small')){
            $filename = $request->file('service_image_small')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('service_image_small')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $services->service_image_small);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $services->service_image_small = $name;
        }
         // service big image  
        if($request->hasFile('service_image_big')){
            $filename = $request->file('service_image_big')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('service_image_big')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $services->service_image_big);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $services->service_image_big = $name;
        }
        $services->title = $request->title;
        $services->slug = Str::slug($request->title);
        $services->price = $request->price;
        $services->cleaning_hour = $request->cleaning_hour;
        $services->no_of_cleaner = $request->no_of_cleaner;
        $services->visiting_hours = $request->visiting_hours;
        $services->contact = $request->contact;
        $services->email = $request->email;
        $services->description = $request->description;
        $services->status = $request->status;
        $services->priority = $request->priority;
        $services->save();
        return redirect()->route('services.index')->with('success','Services  add successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Service::where('id',$id)->first();
        if($slider){
            $oldImagePath2 = public_path('assets/dynamics/' . $slider->service_image_big);
            $oldImagePath = public_path('assets/dynamics/' . $slider->service_image_small);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $slider->delete();
            return redirect()->back()->with('success','Service details  delete with image successfully');
        }else{
            return redirect()->back()->with('error','Slider Image does not found successfully');
        }
    }
}
