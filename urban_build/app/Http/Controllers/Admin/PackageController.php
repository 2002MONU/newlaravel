<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::get();
        return view('admin.packages.packages-details',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.add-packages');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $package = new Package();
        $package->package_name = $request->package_name;
        $package->status = $request->status;
        $package->save();
        return redirect()->route('packages.index')->with('success','Packages Added successfully');
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
        $packages = Package::find($id);
        return view('admin.packages.edit-packages',compact('packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'package_name' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $package =  Package::find($id);
        $package->package_name = $request->package_name;
        $package->status = $request->status;
        $package->save();
        return redirect()->route('packages.index')->with('success','Packages updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Package::find($id)->delete();
        return redirect()->back()->with('success','Package delete successfully');
    }
}
