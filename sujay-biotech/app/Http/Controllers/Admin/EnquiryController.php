<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Contact;

use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $contact = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.enquiry.index', 
        compact('contact')
    );

    }

    public function delete($id)
    {
         Contact::where('id', $id)->delete();
        return redirect()->route('admin.enquiry.index')->with('success', 'Deleted successfully.');
    }
}
