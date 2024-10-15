<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageDetail;
use Illuminate\Http\Request;

class PackageDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = PackageDetail::join('packages','packages.id','=','package_details.package_id')->orderBy('package_details.package_id','asc')
        ->select('package_details.*','packages.package_name')->get();
        return view('admin.package-details.packages-details',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::where('status',1)->get();
        return view('admin.package-details.add-packages',compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $package = new PackageDetail();
        $package->package_id = $request->package_name;
        $package->title = $request->title;
        $package->description = $request->description;
        $package->status = $request->status;
        $package->save();
        return redirect()->route('package-details.index')->with('success','Packages details added successfully');
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
        $packages = Package::where('status',1)->get();
        $pack = PackageDetail::find($id);
        return view('admin.package-details.edit-packages',compact('packages','pack'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'package_name' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $package =  PackageDetail::find($id);
        $package->package_id = $request->package_name;
        $package->title = $request->title;
        $package->description = $request->description;
        $package->status = $request->status;
        $package->save();
        return redirect()->route('package-details.index')->with('success','Packages details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PackageDetail::find($id)->delete();
        return redirect()->back()->with('success','Packages details delete successfully');
    }
}
