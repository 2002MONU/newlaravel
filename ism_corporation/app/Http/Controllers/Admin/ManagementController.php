<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managements = Management::get();
        return view('admin.management.management-details',compact('managements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.management.add-management');
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
            'name' => 'required|string',
            'post' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'priority' => 'required|integer|unique:management,priority',
            'status' => 'required|in:0,1',
        ]);

        $management = new Management();
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics/ourcompany'),$name);
            $management->image = $name;
        }
        $management->name = $request->name;
        $management->post = $request->post;
        $management->description = $request->description;
        $management->priority = $request->priority;
        $management->status = $request->status;
        $management->save();
        return redirect()->route('managements.index')->with('success','Management add successfully');
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
        $management = Management::find($id);
       return view('admin.management.edit-management',compact('management'));
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
            'name' => 'required|string',
            'post' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'priority' => 'required|integer|unique:management,priority,'.$id,
            'status' => 'required|in:0,1',
        ]);

        $management =  Management::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics/ourcompany'),$name);
            $oldImagePath = public_path('assets/dynamics/ourcompany/' . $management->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $management->image = $name;
        }
        $management->name = $request->name;
        $management->post = $request->post;
        $management->description = $request->description;
        $management->priority = $request->priority;
        $management->status = $request->status;
        $management->save();
        return redirect()->route('managements.index')->with('success','Management update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $management = Management::where('id', $id)->first();
        if ($management) {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/ourcompany/' . $management->image);
            
         // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) {
                // Delete the  image
                unlink($imagePath1);
            }
          $management->delete();
           return redirect()->back()->with('success', 'Images and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}
