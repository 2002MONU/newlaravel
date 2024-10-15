<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ethical;
use Illuminate\Http\Request;

class EthicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ethicals = Ethical::get();
        return view('admin.ethicals.ethicals-details',compact('ethicals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ethicals.add-ethicals');
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
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'priority' => 'required|integer|unique:ethicals,priority',
            'status' => 'required|in:0,1',
            'image' => 'required|image|mimes:png,jpeg,jpeg,webp|max:2048',
            'back_image' => 'required|image|mimes:png,jpeg,jpeg,webp|max:2048',
        ]);

        $ethical = new  Ethical();
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics/product'),$name);
           $ethical->image = $name;
        }
        if($request->hasFile('back_image')){
            $filename = $request->file('back_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('back_image')->move(public_path('assets/dynamics/product'),$name);
           $ethical->back_image = $name;
        }
        $ethical->name = $request->name;
        $ethical->icon = $request->icon;
        $ethical->description = $request->description;
        $ethical->priority = $request->priority;
        $ethical->status = $request->status;
        $ethical->save();
        return redirect()->route('ethicals.index')->with('success','Ethicals product add successfully');
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
        $ethical = Ethical::find($id);
        return view('admin.ethicals.edit-ethicals',compact('ethical'));
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
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'priority' => 'required|integer|unique:ethicals,priority,'.$id,
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:png,jpeg,jpeg,webp|max:2048',
            'back_image' => 'nullable|image|mimes:png,jpeg,jpeg,webp|max:2048',
        ]);

        $ethical = Ethical::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics/product'),$name);
           $ethical->image = $name;
        }
        if($request->hasFile('back_image')){
            $filename = $request->file('back_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('back_image')->move(public_path('assets/dynamics/product'),$name);
           $ethical->back_image = $name;
        }
        $ethical->name = $request->name;
        $ethical->icon = $request->icon;
        $ethical->description = $request->description;
        $ethical->priority = $request->priority;
        $ethical->status = $request->status;
        $ethical->save();
        return redirect()->route('ethicals.index')->with('success','Ethicals product add successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ethical = Ethical::where('id', $id)->first();
        if ($ethical)
        {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/product/' . $ethical->image);
             if (file_exists($imagePath1)) 
            {
                // Delete the  image
                unlink($imagePath1);
            }
          $ethical->delete();
           return redirect()->back()->with('success', 'Images and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}
