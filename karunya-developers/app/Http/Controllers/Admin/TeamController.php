<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $our_team = Team::get();
        return view('admin.ourteam.team-details',compact('our_team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ourteam.add-team');
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
            'name' =>'required|string',
            'designation' =>'required|string',
            'image' =>'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'status' =>'required|in:1,0',
            'priority' =>'required|integer|unique:teams,priority',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);
        
        $our_team = new Team();
        // client image update
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time() .'.'.$filename;  // send different name
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name); // image folder 
            $our_team->image = $name;
        } 

        $our_team->name = $request->name;
        $our_team->designation = $request->designation;
        $our_team->status = $request->status;
        $our_team->priority = $request->priority;
        $our_team->facebook = $request->facebook;
        $our_team->twitter = $request->twitter;
        $our_team->linkedin = $request->linkedin;
        $our_team->save();
        return redirect()->route('teams.index')->with('success','Team add   successfully');
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
        $our_team = Team::find($id);
        return view('admin.ourteam.edit-team',compact('our_team'));
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
            'name' =>'required|string',
            'designation' =>'required|string',
            'image' =>'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'status' =>'required|in:1,0',
            'priority' =>'required|integer|unique:teams,priority,'.$id,
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);
        
        $our_team =  Team::find($id);
        // client image update
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time() .'.'.$filename;  // send different name
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name); // image folder 
            $our_team->image = $name;
        } 

        $our_team->name = $request->name;
        $our_team->designation = $request->designation;
        $our_team->status = $request->status;
        $our_team->priority = $request->priority;
        $our_team->facebook = $request->facebook;
        $our_team->twitter = $request->twitter;
        $our_team->linkedin = $request->linkedin;
        $our_team->save();
        return redirect()->route('teams.index')->with('success','Team update   successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::where('id', $id)->first();
        if($team)
        {
            $imagePath1 = public_path('assets/dynamics/' . $team->image);
            if (file_exists($imagePath1)) {
                // Delete the first image
                unlink($imagePath1);
            }
        $team->delete();
            
        return redirect()->back()->with('success', 'Images and associated record deleted successfully.');
       }
         else
        {
        return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}
