<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_details = ProjectDetail::join('projects','projects.id','=','project_details.project_id')
        ->select('projects.*',
         'project_details.*')->get();
        return view('admin.projects.projects-details',compact('project_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::get();
        return view('admin.projects.add-projects',compact('projects'));
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
            'project_name' => 'required',
            'design_name' => 'required|string',
            'layout' => 'required|string',
            'title' => 'required|string|unique:project_details,title',
            'project_category' => 'required|string',
            'clients' => 'required|string',
            'project_date' => 'required|string',
            'avenue_end_date' => 'required|string',
            'location' => 'required|string',
            'price_after' => 'required|string',
            'description' => 'required|string',
            'service_benefits' => 'required|string',
            'image.*' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'priority' => 'required|string|unique:project_details,priority',
            'status' => 'required|string',
        ]);

        $project = new ProjectDetail(); 
         
       if ($request->hasFile('image')) {
        $imageNames = [];  // Array to store image names
       foreach ($request->file('image') as $image) {
       // Generate a unique filename for each image
       $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
      
      // Move the image to the public directory
       $image->move(public_path('assets/dynamics'), $filename);

      // Save the image filename in the array
       $imageNames[] = $filename;
       // Optionally, remove the old image if it exists
      
   }
   // Save the image names to the database as a JSON or serialized array
   $project->image = json_encode($imageNames);
}

        $project->design_name = $request->design_name;
        $project->project_id = $request->project_name;
        $project->layout = $request->layout;
        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->project_category = $request->project_category;
        $project->clients = $request->clients;
        $project->project_date = $request->project_date;
        $project->avenue_end_date = $request->avenue_end_date;
        $project->location = $request->location;
        $project->price_after = $request->price_after;
        $project->description = $request->description;
        $project->service_benefits = $request->service_benefits;
        $project->priority = $request->priority;
        $project->status = $request->status;
        $project->save();
        return redirect()->route('project-details.index')->with('success','Project details add successfully');
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
        $project = ProjectDetail::find($id);
        $projects = Project::get();
        return view('admin.projects.edit-project-details',compact('project','projects'));
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
            'project_name' => 'required',
            'design_name' => 'required|string',
            'layout' => 'required|string',
             'title' => 'required|string|unique:project_details,title,'.$id,
            'project_category' => 'required|string',
            'clients' => 'required|string',
            'project_date' => 'required|string',
            'avenue_end_date' => 'required|string',
            'location' => 'required|string',
            'price_after' => 'required|string',
            'description' => 'required|string',
            'service_benefits' => 'required|string',
            'image.*' => 'nullable|image|mimes:jpeg,jpg,png,webp',
            'priority' => 'required|string|unique:project_details,priority,'.$id,
            'status' => 'required|string',
        ]);

        $project =  ProjectDetail::find($id); 
        if ($request->hasFile('image')) {
            $imageNames = [];  // Array to store image names
   
           foreach ($request->file('image') as $image) {
           // Generate a unique filename for each image
           $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
          
          // Move the image to the public directory
           $image->move(public_path('assets/dynamics/'), $filename);
   
          // Save the image filename in the array
           $imageNames[] = $filename;
           // Optionally, remove the old image if it exists
           $oldImagePath = public_path('assets/dynamics/' . $project->image);
           if (file_exists($oldImagePath) && !is_dir($oldImagePath)) {
               unlink($oldImagePath);
           }
       }
       // Save the image names to the database as a JSON or serialized array
       $project->image = json_encode($imageNames);
   }

        $project->design_name = $request->design_name;
        $project->project_id = $request->project_name;
        $project->layout = $request->layout;
        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->project_category = $request->project_category;
        $project->clients = $request->clients;
        $project->project_date = $request->project_date;
        $project->avenue_end_date = $request->avenue_end_date;
        $project->location = $request->location;
        $project->price_after = $request->price_after;
        $project->description = $request->description;
        $project->service_benefits = $request->service_benefits;
        $project->priority = $request->priority;
        $project->status = $request->status;
        $project->save();
        return redirect()->route('project-details.index')->with('success','Project details update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = ProjectDetail::find($id);
        if($project){
            $oldImagePath2 = public_path('assets/dynamics/' . $project->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $project->delete();
            return redirect()->back()->with('success','Project Image & records  delete successfully');
        }else{
            return redirect()->back()->with('error','Project Image does not found successfully');
        }
    }
}
