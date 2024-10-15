<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharma;
use Illuminate\Http\Request;

class PharmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharma = Pharma::find(1);
         return view('admin.pharma.pharma-details',compact('pharma'));
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
        $pharma = Pharma::find($id);
        return view('admin.pharma.edit-pharma',compact('pharma'));
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
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'title'=> 'required|string',
            'description' =>'required|string',
        ]);

        $pharma = Pharma::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics/ourcompany'),$name);
            $oldImagePath = public_path('assets/dynamics/ourcompany/' . $pharma->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $pharma->image = $name;
        }
        $pharma->title = $request->title;
        $pharma->description = $request->description;
        $pharma->save();
        return redirect()->route('pharmas.index')->with('success','Pharmacovigilance update successfully');
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
