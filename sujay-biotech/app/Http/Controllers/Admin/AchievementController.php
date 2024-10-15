<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    function index(){

        $achievement = Achievement::get();
            
            return view('admin.achievement.index',compact('achievement'));
        
       }
    public function update(Request $request,$id)
    {

       // return $request;
       $request->validate([
        'dealers' => 'required',
        'services' => 'required',
        'happy_farmers' => 'required',
        
        'work' => 'required',
        
    ]);
 
        $data= Achievement::find($id);
      $data->dealers = $request->input('dealers');
      $data->services = $request->input('services');
      $data->happy_farmers = $request->input('happy_farmers');
      $data->products = $request->input('products');
      $data->unit = $request->input('unit');
      $data->work = $request->input('work');
 
        
        $data->save();

        return redirect()->route('admin.achievement.index')
                        ->with('success','Updated Successfully.');
    }


public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('admin.achievement.edit', compact('achievement'));
    }
}
