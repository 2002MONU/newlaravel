<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institutional;
use Illuminate\Http\Request;

class InstitutionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutional = Institutional::find(1);
        return view('admin.insti.insti-details',compact('institutional'));
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
        $insti = Institutional::find($id);
        return view('admin.insti.edit-insti',compact('insti'));
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
            'description' => 'required|string',
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048'
        ]);

        $insti = Institutional::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics/product'),$name);
              // older image delete after update
            $oldImagePath = public_path('assets/dynamics/product/' . $insti->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $insti->image = $name;
        }

        $insti->description = $request->description;
        $insti->title = $request->title;
        $insti->save();
        return redirect()->route('institutionals.index')->with('success','Institutionals update successfully');
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
