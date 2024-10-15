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
     */
    public function index()
    {
        $project_details = ProjectDetail::join('projects','projects.id','=','project_details.project_id')
        ->select('projects.project_type as project_status',
         'project_details.*')->get();
        return view('admin.projects.projects-details',compact('project_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::get();
        return view('admin.projects.add-projects',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'project_title' => 'required|string|unique:project_details,project_title',
            'built_up_area' => 'required|string',
            'project_category' => 'required|string',
            'project_type' => 'required|string',
            'clients' => 'required|string',
            'project_date' => 'required|string',
            'avenue_end_date' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'project_goal_description' => 'required|string',
            'project_challenge_description' => 'required|string',
            'project_small_image' => 'required|array|min:2',  // Ensure at least 2 small images
            'project_small_image.*' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'project_main_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'project_goal_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'project_challenge_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'priority' => 'required|string|unique:project_details,priority',
            'status' => 'required|string',
        ]);
        
        $project = new ProjectDetail(); 
        
        if ($request->hasFile('project_small_image')) {
            $imageNames = [];  // Array to store image names
            foreach ($request->file('project_small_image') as $image) {
                $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/dynamics'), $filename);
                $imageNames[] = $filename;
            }
            $project->project_small_image = json_encode($imageNames);
        }
        
        if($request->hasFile('project_main_image')){
            $filename = $request->file('project_main_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('project_main_image')->move(public_path('assets/dynamics'),$name);
            $project->project_main_image = $name;
        }
        
        if($request->hasFile('project_goal_image')){
            $filename = $request->file('project_goal_image')->getClientOriginalExtension();
            $name = (time()+2).'.'.$filename;
            $filepath = $request->file('project_goal_image')->move(public_path('assets/dynamics'),$name);
            $project->project_goal_image = $name;
        }
        
        if($request->hasFile('project_challenge_image')){
            $filename = $request->file('project_challenge_image')->getClientOriginalExtension();
            $name = (time()+3).'.'.$filename;
            $filepath = $request->file('project_challenge_image')->move(public_path('assets/dynamics'),$name);
            $project->project_challenge_image = $name;
        }
        
        $project->project_id = $request->project_name;  // Ensure this is correct
        $project->project_title = $request->project_title;
        $project->slug = Str::slug($request->project_title);
        $project->project_category = $request->project_category;
        $project->clients = $request->clients;
        $project->project_type = $request->project_type;
        $project->project_date = $request->project_date;
        $project->avenue_end_date = $request->avenue_end_date;
        $project->location = $request->location;
        $project->built_up_area = $request->built_up_area;
        $project->description = $request->description;
        $project->project_goal_description = $request->project_goal_description;
        $project->project_challenge_description = $request->project_challenge_description;
        $project->priority = $request->priority;
        $project->status = $request->status;
        $project->save();
        
        return redirect()->route('project-details.index')->with('success','Project details added successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projects = Project::get();
        $pro = ProjectDetail::find($id);
        return view('admin.projects.edit-project-details',compact('projects','pro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'project_name' => 'required',
            'project_title' => 'required|string|unique:project_details,project_title,'.$id,
            'built_up_area' => 'required|string',
            'project_category' => 'required|string',
            'project_type' => 'required|string',
            'clients' => 'required|string',
            'project_date' => 'required|string',
            'avenue_end_date' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'project_goal_description' => 'required|string',
            'project_challenge_description' => 'required|string',
            'project_small_image' => 'nullable|array|min:2',  // Ensure at least 2 small images
            'project_small_image.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'project_main_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'project_goal_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'project_challenge_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'priority' => 'required|string|unique:project_details,priority,'.$id,
            'status' => 'required|string',
        ]);
        
        $project =  ProjectDetail::find($id);
        
        if ($request->hasFile('project_small_image')) {
            $imageNames = [];  // Array to store image names
            foreach ($request->file('project_small_image') as $image) {
                $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/dynamics'), $filename);
                $imageNames[] = $filename;
            }
            $project->project_small_image = json_encode($imageNames);
        }
        
        if($request->hasFile('project_main_image')){
            $filename = $request->file('project_main_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('project_main_image')->move(public_path('assets/dynamics'),$name);
            $project->project_main_image = $name;
        }
        
        if($request->hasFile('project_goal_image')){
            $filename = $request->file('project_goal_image')->getClientOriginalExtension();
            $name = (time()+2).'.'.$filename;
            $filepath = $request->file('project_goal_image')->move(public_path('assets/dynamics'),$name);
            $project->project_goal_image = $name;
        }
        
        if($request->hasFile('project_challenge_image')){
            $filename = $request->file('project_challenge_image')->getClientOriginalExtension();
            $name = (time()+3).'.'.$filename;
            $filepath = $request->file('project_challenge_image')->move(public_path('assets/dynamics'),$name);
            $project->project_challenge_image = $name;
        }
        
        $project->project_id = $request->project_name;  
        $project->project_title = $request->project_title;
        $project->slug = Str::slug($request->project_title);
        $project->project_category = $request->project_category;
        $project->clients = $request->clients;
        $project->project_type = $request->project_type;
        $project->project_date = $request->project_date;
        $project->avenue_end_date = $request->avenue_end_date;
        $project->location = $request->location;
        $project->built_up_area = $request->built_up_area;
        $project->description = $request->description;
        $project->project_goal_description = $request->project_goal_description;
        $project->project_challenge_description = $request->project_challenge_description;
        $project->priority = $request->priority;
        $project->status = $request->status;
        $project->save();
        
        return redirect()->route('project-details.index')->with('success','Project details update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = ProjectDetail::where('id',$id)->first();
        if($project){
            $oldImagePath2 = public_path('assets/dynamics/' . $project->project_main_image);
            $oldImagePath = public_path('assets/dynamics/' . $project->project_small_image);
            $oldImagePath3 = public_path('assets/dynamics/' . $project->project_challenge_image);
            $oldImagePath4 = public_path('assets/dynamics/' . $project->project_goal_image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            if (file_exists($oldImagePath3)) {
                unlink($oldImagePath3);
            }
            if (file_exists($oldImagePath4)) {
                unlink($oldImagePath4);
            }
            $project->delete();
            return redirect()->back()->with('success','Project Details Image & records  delete successfully');
        }else{
            return redirect()->back()->with('error','Project Image does not found successfully');
        }
    }
}
