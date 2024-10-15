<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ResearchDevelopment;
use App\ResearchType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ResearchDevelopmentController extends Controller
{
    public function index()
    {
        $research = ResearchDevelopment::where('status',1)->orderBy('created_at', 'desc')->get();
        return view('admin.research-development.index', compact('research'));

    }
    public function create()
    {
        $researchtype = ResearchType::all();

        return view('admin.research-development.add',compact('researchtype'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
   
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required',
            'priority' => 'required|numeric|max:255',
            'researchtype_id' => 'required|numeric|max:255',
         
           

        ]);
    
        $data = new ResearchDevelopment();
    
        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/ResearchDevelopmentImage'), $name);
            $data->image = $name;
        }
          $data->title = $request->input('title');
      $data->slug = Str::slug($request->input('title'));
 
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
        $data->researchtype_id = $request->input('researchtype_id');
        $data->description = $request->input('description');
      
    
        $data->save();
    
        return redirect()->route('admin.research_development.index')
            ->with('success', 'Added Successfully.');
    }
    
    public function delete($id)
    {
        $enquiry = ResearchDevelopment::where('id', $id)->delete();
        return redirect()->route('admin.research_development.index')->with('success', 'Deleted successfully.');
    }
    

    public function update(Request $request, $id)
    {

        // return $request;
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required',
            'priority' => 'required|numeric|max:255',
            'researchtype_id' => 'required|numeric|max:255',
            'description' => 'required',

           
        ]);

        $data = ResearchDevelopment::where('id',$id)->first();


        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/ResearchDevelopmentImage'), $name);
            $data->image = $name;
        }
        $data->title =$request->input('title');
          $data->slug = Str::slug($request->input('title'));
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
        $data->researchtype_id = $request->input('researchtype_id');
        $data->description = $request->input('description');

        $data->save();


        return redirect()->route('admin.research_development.index')
            ->with('success', 'Updated Successfully.');
    }


    public function edit($id)
    {
        $researchtypes = ResearchType::all();
        $research = ResearchDevelopment::findOrFail($id);
        return view('admin.research-development.edit',compact('research','researchtypes'));
    }
}
