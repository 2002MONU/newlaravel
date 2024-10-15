<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Partner;
use Illuminate\Validation\Rule;
class PartnerController extends Controller

{
    public function index()
    {
        $partner = Partner::orderBy('created_at', 'desc')->get();
        return view('admin.partner.index', compact('partner'));

    }
    public function create()
    {

        return view('admin.partner.add');

    }

    public function store(Request $request)
    {
        $request->validate([
   
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required',
            'priority' => 'required|integer|unique:partners,priority',
                   
           

        ]);
    
        $data = new Partner();
    
        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/partnerImage'), $name);
            $data->image = $name;
        }
    
       
      
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
      
      
    
        $data->save();
    
        return redirect()->route('admin.partner.index')
            ->with('success', 'Added Successfully.');
    }
    
    public function delete($id)
    {
        $enquiry = Partner::where('id', $id)->delete();
        return redirect()->route('admin.partner.index')->with('success', 'Deleted successfully.');
    }
    

    public function update(Request $request, $id)
    {

        // return $request;
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required',
              'priority' => [
    'required',
    'integer',
    Rule::unique('partners', 'priority')->ignore($id)
],
          
           
        ]);

        $data = Partner::where('id',$id)->first();


        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/partnerImage'), $name);
            $data->image = $name;
        }
    
     
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
      

        $data->save();


        return redirect()->route('admin.partner.index')
            ->with('success', 'Updated Successfully.');
    }


    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.partner.edit',compact('partner'));
    }
}
