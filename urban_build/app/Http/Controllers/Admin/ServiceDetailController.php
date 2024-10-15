<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServiceDetail::join('services','services.id','=','service_details.service_id')
        ->select('service_details.*','services.service_name')->get();
        return view('admin.servicesdetails.services-details',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::where('status',1)->get();
        return view('admin.servicesdetails.add-services',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'service_title' => 'required|string|unique:service_details,service_title',
            'description' => 'required|string',
            'benefit_description' => 'required|string',
            'title_2' => 'required|string',
            'title_2_description' => 'required|string',
            'box_01_title' => 'required|string',
            'box_02_title' => 'required|string',
            'box_03_title' => 'required|string',
            'box_01_description' => 'required|string',
            'box_02_description' => 'required|string',
            'box_03_description' => 'required|string',
            'last_description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:service_details,priority',
            'service_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'benefit_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $service = new ServiceDetail();
    
        if ($request->hasFile('service_image')) {
            $filename = $request->file('service_image')->getClientOriginalExtension();
            $name = time() . '.' . $filename;
            $filepath = $request->file('service_image')->move(public_path('assets/dynamics'), $name);
            $service->service_image = $name;
        }
        if ($request->hasFile('benefit_image')) {
            $filename = $request->file('benefit_image')->getClientOriginalExtension();
            $name = (time() + 1) . '.' . $filename;
            $filepath = $request->file('benefit_image')->move(public_path('assets/dynamics'), $name);
            $service->benefit_image = $name;
        }
    
        // Assigning values from the request
       // $service->service_name = $request->input('service_name');
        $service->service_title = $request->input('service_title');
        $service->slug = Str::slug($request->input('service_title'));
        $service->description = $request->input('description');
        $service->benefit_description = $request->input('benefit_description');
        $service->title_2 = $request->input('title_2');
        $service->title_2_description = $request->input('title_2_description');
        $service->box_01_title = $request->input('box_01_title');
        $service->box_02_title = $request->input('box_02_title');
        $service->box_03_title = $request->input('box_03_title');
        $service->box_01_description = $request->input('box_01_description');
        $service->box_02_description = $request->input('box_02_description');
        $service->box_03_description = $request->input('box_03_description');
        $service->last_description = $request->input('last_description');
        $service->status = $request->input('status');
        $service->priority = $request->input('priority');
    
        // If service_id should be based on service_name or any other field, assign it appropriately
        $service->service_id = $request->input('service_name'); // Assuming service_name is unique or used as ID
    
        $service->save();
    
        return redirect()->route('service-details.index')->with('success', 'Service details added successfully');
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
        $services = Service::where('status',1)->get();
        $serv = ServiceDetail::find($id);
        return view('admin.servicesdetails.edit-services',compact('services','serv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'service_name' => 'required',
            'service_title' => 'required|string|unique:service_details,service_title,'.$id,
            'description' => 'required|string',
            'benefit_description' => 'required|string',
            'title_2' => 'required|string',
            'title_2_description' => 'required|string',
            'box_01_title' => 'required|string',
            'box_02_title' => 'required|string',
            'box_03_title' => 'required|string',
            'box_01_description' => 'required|string',
            'box_02_description' => 'required|string',
            'box_03_description' => 'required|string',
            'last_description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:service_details,priority,'.$id,
            'service_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'benefit_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $service =  ServiceDetail::find($id);
    
        if ($request->hasFile('service_image')) {
            $filename = $request->file('service_image')->getClientOriginalExtension();
            $name = time() . '.' . $filename;
            $filepath = $request->file('service_image')->move(public_path('assets/dynamics'), $name);
            $service->service_image = $name;
        }
        if ($request->hasFile('benefit_image')) {
            $filename = $request->file('benefit_image')->getClientOriginalExtension();
            $name = (time() + 1) . '.' . $filename;
            $filepath = $request->file('benefit_image')->move(public_path('assets/dynamics'), $name);
            $service->benefit_image = $name;
        }
    
        // Assigning values from the request
       // $service->service_name = $request->input('service_name');
        $service->service_title = $request->input('service_title');
        $service->slug = Str::slug($request->input('service_title'));
        $service->description = $request->input('description');
        $service->benefit_description = $request->input('benefit_description');
        $service->title_2 = $request->input('title_2');
        $service->title_2_description = $request->input('title_2_description');
        $service->box_01_title = $request->input('box_01_title');
        $service->box_02_title = $request->input('box_02_title');
        $service->box_03_title = $request->input('box_03_title');
        $service->box_01_description = $request->input('box_01_description');
        $service->box_02_description = $request->input('box_02_description');
        $service->box_03_description = $request->input('box_03_description');
        $service->last_description = $request->input('last_description');
        $service->status = $request->input('status');
        $service->priority = $request->input('priority');
    
        // If service_id should be based on service_name or any other field, assign it appropriately
        $service->service_id = $request->input('service_name'); // Assuming service_name is unique or used as ID
    
        $service->save();
    
        return redirect()->route('service-details.index')->with('success', 'Service details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = ServiceDetail::where('id',$id)->first();
        if($service){
            $oldImagePath2 = public_path('assets/dynamics/' . $service->service_image);
            $oldImagePath = public_path('assets/dynamics/' . $service->benefit_image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $service->delete();
            return redirect()->back()->with('success','Servics Details Image & records  delete successfully');
        }else{
            return redirect()->back()->with('error','Servics Image does not found successfully');
        }
    }
}
