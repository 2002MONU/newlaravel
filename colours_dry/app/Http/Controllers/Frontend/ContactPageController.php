<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Contact;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        $service = Service::where('status',1)->get();
        $sitesetting = SiteSetting::find(1);
        $branch = Branch::where('status',1)->orderBy('priority')->get();
        return view('Frontend.contact-us',compact('sitesetting','service','branch'));
    }
    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
            'service' => ['required', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
            'email' => ['required', 'email', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
            'phone' => ['required', 'numeric','regex:/^\d{10}$/', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
            'message' => ['required', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
           
        ]);
    
        $data = new Contact;
        $data->name = $request->input('name');
        $data->service = $request->input('service');
       
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->message = $request->input('message');
    
    
        $data->save();
    
        return redirect()->back()->with('message', 'Submitted successfully');

    }
}
