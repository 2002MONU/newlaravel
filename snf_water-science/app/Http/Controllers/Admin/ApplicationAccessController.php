<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\ApplicationAccess;
use Illuminate\Http\Request;

class ApplicationAccessController extends Controller
{
    public function index()
    {
        $application = ApplicationAccess::all();
        return view('admin.application-access.index', compact('application'));
    }

    public function create()
    {
        return view('admin.application-access.add');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'link' => 'required|string|url|unique:application_accesses,link',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:application_accesses,priority',
        ];

        $messages = [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'link.required' => 'The link is required.',
            'link.url' => 'The link must be a valid URL.',
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must be less than 2MB.',
            'status.required' => 'The status is required.',
            'status.in' => 'The status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new ApplicationAccess();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/applicationImage'), $imageName);
            $data->image = $imageName;
        }

        $data->name = $request->input('name');
        $data->link = $request->input('link');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
        $data->save();

        return redirect()->route('application-access.index')->with('success', 'Added Successfully.');
    }

    public function edit(ApplicationAccess $applicationAccess)
    {
        return view('admin.application-access.edit', compact('applicationAccess'));
    }

    public function update(Request $request, ApplicationAccess $applicationAccess)
    {
        $rules = [
            'name' => 'required|string',
           'link' => 'required|string|url|unique:application_accesses,link',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:application_accesses,priority,' . $applicationAccess->id,
        ];

        $messages = [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'link.required' => 'The link is required.',
            'link.url' => 'The link must be a valid URL.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must be less than 2MB.',
            'status.required' => 'The status is required.',
            'status.in' => 'The status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/applicationImage'), $imageName);
            $applicationAccess->image = $imageName;
        }

        $applicationAccess->name = $request->input('name');
        $applicationAccess->link = $request->input('link');
        $applicationAccess->status = $request->input('status');
        $applicationAccess->priority = $request->input('priority');
        $applicationAccess->save();

        return redirect()->route('application-access.index')->with('success', 'Updated Successfully.');
    }

    public function destroy(ApplicationAccess $applicationAccess)
    {
        if ($applicationAccess->image && file_exists(public_path('admin/applicationImage/' . $applicationAccess->image))) {
            unlink(public_path('admin/applicationImage/' . $applicationAccess->image));
        }
        $applicationAccess->delete();

        return redirect()->route('application-access.index')->with('success', 'Deleted Successfully.');
    }
}
