<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;  
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = Branch::all();
        return view('admin.branch.index', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:branches,priority',
           
            
        ];

        $messages = [
            'name.required' => 'The branch name is required.',
          
            'status.required' => 'The branch status is required.',
            'status.in' => 'The branch status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      

        $data = new Branch();
       
        
       
       
        $data->name = $request->input('name');
       
       
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
       
        $data->save();

        return redirect()->route('branches.index')->with('success', 'Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('admin.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $rules = [
            'name' => 'required|string|max:255',
            
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:branches,priority,' . $branch->id, 
           
            
        ];

        $messages = [
            'name.required' => 'The branch name is required.',
          
            'status.required' => 'The branch status is required.',
            'status.in' => 'The branch status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      

       
        
       
       
       $branch->name = $request->input('name');
       
       
       $branch->status = $request->input('status');
       $branch->priority = $request->input('priority');
       
       $branch->save();
        return redirect()->route('branches.index')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
  


        return redirect()->route('branches.index')->with('success', 'Deleted Successfully.');
    }
}
