<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::get();
        return view('admin.about.certificate-details',compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.add-certificate');
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
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:certificates,priority',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $blog = new Certificate();
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $blog->image = $name;
        }
        
        $blog->status = $request->status;
        $blog->priority = $request->priority;
        $blog->save();
        return redirect()->route('certificates.index')->with('success','Blogs add successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificates = Certificate::where('id',$id)->first();
        if($certificates){
            $oldImagePath2 = public_path('assets/dynamics/' . $certificates->image);
           
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
           
            $certificates->delete();
            return redirect()->back()->with('success','Certificates image  delete   successfully');
        }else{
            return redirect()->back()->with('error','Blog Image does not found successfully');
        }
    }
}
