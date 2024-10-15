<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::get();
        return view('admin.services.services-details',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.add-services');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string',
            'priority' => 'required|integer|min:1|unique:services,priority',
            'status' => 'required|in:0,1',
        ]);

        $service = new Service();
        $service->service_name = $request->service_name;
        $service->priority = $request->priority;
        $service->status = $request->status;
        $service->save();
        return redirect()->route('services.index')->with('success','Service added successfully');
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
        $service = Service::find($id);
        return view('admin.services.edit-service',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'service_name' => 'required|string',
            'priority' => 'required|integer|min:1|unique:services,priority,'.$id,
            'status' => 'required|in:0,1',
        ]);

        $service =  Service::find($id);
        $service->service_name = $request->service_name;
        $service->priority = $request->priority;
        $service->status = $request->status;
        $service->save();
        return redirect()->route('services.index')->with('success','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Service::find($id)->delete();
        return redirect()->back()->with('success','Service delete successfully');
    }
}
