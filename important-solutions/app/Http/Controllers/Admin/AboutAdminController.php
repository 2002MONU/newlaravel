<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Abouts;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = Abouts::find(1);
        return view('admin.homepage.about-details',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $about = Abouts::find($id);
        return view('admin.homepage.edit-about',compact('about'));
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
            'title' =>'required|string',
            'description' =>'required|string',
            'experince_image' =>'nullable|image|mimes:png,jpg,jpeg|max:1024',
            'experince' =>'required|integer',
//            'service_image' =>'nullable|image|mimes:png,jpg,jpeg|max:1024',
//            'service' =>'required|integer',
           
        ]);
        $about =  Abouts::find($id);
        // about  experince_image image
        if($request->hasFile('experince_image'))
        {
            $filename = $request->file('experince_image')->getClientOriginalExtension();
            $image_name = time().'.'.$filename; // send unique name
            $filepath = $request->file('experince_image')->move(public_path('assets/dynamics/slider'),$image_name);
            //  when image update old image delete
            $oldImagePath2 = public_path('assets/dynamics/slider/' . $about->experince_image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $about->experince_image = $image_name;
         }
            // about service image
//        if($request->hasFile('service_image'))
//        {
//            $filename1 = $request->file('service_image')->getClientOriginalExtension();
//            $image_name1 = (time() + 1).'.'.$filename1; // send unique name
//            $filepath1 = $request->file('service_image')->move(public_path('assets/dynamics/slider'),$image_name1);
//             //  when image update old image delete
//            $oldImagePath = public_path('assets/dynamics/slider/' . $about->service_image);
//            if (file_exists($oldImagePath)) {
//                unlink($oldImagePath);
//            }
//            $about->service_image = $image_name1;
//       }
        $about->title = $request->title;
        $about->description = $request->description;
        $about->experince = $request->experince;
//        $about->service = $request->service;
       
        $about->save();
        return redirect()->route('abouts.index')->with('success','About update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
