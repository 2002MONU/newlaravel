<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\ResearchDevelopment;
use App\ResearchType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ResearchTypeController extends Controller
{
    public function index()
    {
        $researchtype = ResearchType::where('status',1)->orderBy('created_at', 'desc')->get();
        return view('admin.researchtype.index', compact('researchtype'));

    }
    public function create()
    {

        return view('admin.researchtype.add');

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required',
            'priority' => 'required|numeric|max:255',
              'meta_title' => 'required|string|max:255',
               'meta_keywords' => 'required|string|max:255',
               'meta_description' => 'required|string',
         
           

        ]);
    
        $data = new ResearchType();
    
        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/researchtypeImage'), $name);
            $data->image = $name;
        }
        $data->title = $request->input('title');
        $data->slug = Str::slug($request->input('title'));
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
      
       $data->meta_title = $request->input('meta_title');
               $data->meta_keywords = json_encode(array_map('trim', explode("\n", $request->meta_keywords)));
               $data->meta_description = $request->input('meta_description');
        $data->save();
    
        return redirect()->route('admin.researchtype.index')
            ->with('success', 'Added Successfully.');
    }
    
    public function delete($id)
    {
        $enquiry = ResearchType::where('id', $id)->delete();
        ResearchDevelopment::where('researchtype_id', $id)->delete();
        return redirect()->route('admin.researchtype.index')->with('success', 'Deleted successfully.');
    }
    

    public function update(Request $request, $id)
    {

        // return $request;
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required',
            'priority' => 'required|numeric|max:255',
              'meta_title' => 'required|string|max:255',
               'meta_keywords' => 'required|string|max:255',
               'meta_description' => 'required|string',
           
        ]);

        $data = researchtype::where('id',$id)->first();


        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/researchtypeImage'), $name);
            $data->image = $name;
        }
        $data->title =$request->input('title');
  
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
           $data->meta_title = $request->input('meta_title');
               $data->meta_keywords = json_encode(array_map('trim', explode("\n", $request->meta_keywords)));
               $data->meta_description = $request->input('meta_description');

        $data->save();


        return redirect()->route('admin.researchtype.index')
            ->with('success', 'Updated Successfully.');
    }


    public function edit($id)
    {
        $researchtype = ResearchType::find($id);
        return view('admin.researchtype.edit',compact('researchtype'));
    }
}
