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
            'title' => 'required|string|unique:services,title',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:services,priority',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
           
        ]);
        $services = new Service();
        // service image small 
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $services->image = $name;
        }
         
        $services->title = $request->title;
        $services->slug = Str::slug($request->title);
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
            'title' => 'required|string|unique:services,title,'.$id,
             'description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:services,priority,'.$id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $services =  Service::find($id);
        // service image small 
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $services->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $services->image = $name;
        }
         
        $services->title = $request->title;
        $services->slug = Str::slug($request->title);
        $services->description = $request->description;
        $services->status = $request->status;
        $services->priority = $request->priority;
        $services->save();
        return redirect()->route('services.index')->with('success','Services  update  successfully');
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
        if($service){
            $oldImagePath2 = public_path('assets/dynamics/' . $service->image);
           
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
           
            $service->delete();
            return redirect()->back()->with('success','Service details  delete with image successfully');
        }else{
            return redirect()->back()->with('error','Slider Image does not found successfully');
        }
    }
}
