<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Validation\Rule;
class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::orderBy('created_at', 'desc')->get();
        return view('admin.banner.index', compact('banner'));

    }
    public function create()
    {

        return view('admin.banner.add');

    }

    public function store(Request $request)
    {
        $request->validate([
   
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required',
            'priority' => 'required|integer|unique:banners,priority',
         
         
           

        ]);
    
        $data = new Banner();
    
        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/bannerImage'), $name);
            $data->image = $name;
        }
    
       
       
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
      
    
        $data->save();
    
        return redirect()->route('admin.banner.index')
            ->with('success', 'Added Successfully.');
    }
    
    public function delete($id)
    {
        $enquiry = Banner::where('id', $id)->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Deleted successfully.');
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
    Rule::unique('banners', 'priority')->ignore($id)
],

           
        ]);

        $data = Banner::where('id',$id)->first();


        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/bannerImage'), $name);
            $data->image = $name;
        }
    
       
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');

        $data->save();


        return redirect()->route('admin.banner.index')
            ->with('success', 'Updated Successfully.');
    }


    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit',compact('banner'));
    }
}
