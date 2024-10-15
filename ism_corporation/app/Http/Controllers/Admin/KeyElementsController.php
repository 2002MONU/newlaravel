<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KeyElement;
use Illuminate\Http\Request;

class KeyElementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyfeatures = KeyElement::get();
        return view('admin.pharma.key-features',compact('keyfeatures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.pharma.add-key-features');
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
            'document' => 'required|mimes:docx,pdf|max:5120',
            'priority' => 'required|integer|unique:key_elements,priority',
            'status' => 'required|in:1,0',
        ]);

        $keyelement = new KeyElement();
        if($request->hasFile('document')){
            $filename = $request->file('document')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('document')->move(public_path('assets/dynamics/ourcompany'),$name);
            $keyelement->document = $name;
        }
        $keyelement->name = $request->name;
        $keyelement->priority = $request->priority;
        $keyelement->status = $request->status;
        $keyelement->save();

        return redirect()->route('keyelements.index')->with('success','Key elements add successfully');
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
       $keyelement = KeyElement::find($id);
       return view('admin.pharma.edit-key-features',compact('keyelement'));
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
            'document' => 'nullable|mimes:docx,pdf|max:5120',
            'priority' => 'required|integer|unique:key_elements,priority,'.$id,
            'status' => 'required|in:1,0',
        ]);

        $keyelement =  KeyElement::find($id);
        if($request->hasFile('document')){
            $filename = $request->file('document')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('document')->move(public_path('assets/dynamics/ourcompany'),$name);
            $keyelement->document = $name;
        }
        $keyelement->name = $request->name;
        $keyelement->priority = $request->priority;
        $keyelement->status = $request->status;
        $keyelement->save();

        return redirect()->route('keyelements.index')->with('success','Key elements update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keyelement = KeyElement::where('id', $id)->first();
        if ($keyelement) {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/ourcompany/' . $keyelement->document);
            
         // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) {
                // Delete the  image
                unlink($imagePath1);
            }
          $keyelement->delete();
           return redirect()->back()->with('success', 'Images and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}
