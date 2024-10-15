<?php

namespace App\Http\Controllers\Admin;

use App\BoardDirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoradDirectorController extends Controller
{
    public function index(){
        $advisories = BoardDirector::get();
        return view('admin.board-director.index',compact('advisories'));
    }

    public function create(){
        return view('admin.board-director.add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
             'designation'=>'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'status'=>'required',
            'priority' => 'required|numeric|max:255|unique:board_directors,priority',
           
            
        ]);

        $data = new BoardDirector();


        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/directors'), $name);
            $data->image = $name;
        }
       
    $data->name = $request->input('name');
    $data->designation = $request->input('designation');
    $data->status = $request->input('status');
    $data->priority = $request->input('priority');
    $data->save();
    return redirect()->route('board-directors.index')
            ->with('success', 'Added Successfully.');

    }

    public function edit($id){
        $director = BoardDirector::find($id);
        return view('admin.board-director.edit',compact('director'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
             'designation'=>'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:5120',
            'status'=>'required',
            'priority' => 'required|numeric|max:255|unique:board_directors,priority,'.$id,
           
            
        ]);

        $data =  BoardDirector::find($id);
        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/directors'), $name);
            $data->image = $name;
        }
       
    $data->name = $request->input('name');
    $data->designation = $request->input('designation');
    $data->status = $request->input('status');
    $data->priority = $request->input('priority');
    $data->save();
    return redirect()->route('board-directors.index')
            ->with('success', 'Update Successfully.');
    }


    public function delete($id){
        BoardDirector::find($id)->delete();
        return redirect()->back()->with('success','Delete successfully');
    }
}
