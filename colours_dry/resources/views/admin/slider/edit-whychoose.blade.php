@extends('admin.layout.app')
@section('title', 'Edit Why Choose Us')

@section('maincontent')
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 style="margin-left: 19px;">@yield('title')</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            {{-- <li class="breadcrumb-item"><a
                                                    href="{{ route('sitesettings.index') }}">@yield('title')</a></li>
                                            <li class="breadcrumb-item active">Edit</li> --}}
                                        </ol>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                {{-- @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif --}}
                @if ($message = Session::get('success'))
                    <div class="alert bg-success text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="font-weight-bold h5">{{ $message }}</span>
                    </div>
                @endif
                <form method="POST" action="{{ route('whychooses.update',['whychoose'=>$whyChoose->id] ) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body  ">
                        <div class="row p-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Title</label>
                                    <input type="text" name="title"
                                        value="{{ old('title', $whyChoose->title) }}"class="form-control"
                                        placeholder="Enter Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Image</label>
                                    <input class="form-control" type="file" name="image">
                                    <span>Image <code>Width: 680px & Height: 700px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/aboutImage/' . $whyChoose->image) }}" target="_blank"
                                        rel="noopener noreferrer"><img
                                            src="{{ asset('admin/aboutImage/' . $whyChoose->image) }}" alt=""
                                            style="width:100px;"></a>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 1 Title</label>
                                    <input type="text" name="step_01_title"
                                        value="{{ old('step_01_title', $whyChoose->step_01_title) }}"class="form-control"
                                        placeholder="Enter Title">
                                    @error('step_01_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 1 Description</label>
                                    <textarea type="text" name="step_01_desc"
                                        value=""class="form-control"
                                        placeholder="Enter Short Description">{{  $whyChoose->step_01_desc }}</textarea>
                                    @error('step_01_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                          
                           <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 2 Title </label>
                                    <input type="text" name="step_02_title"
                                        value="{{ old('step_02_title', $whyChoose->step_02_title) }}"class="form-control"
                                        placeholder="Enter Title-1">
                                    @error('step_02_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 2 Description </label>
                                    <textarea type="text" name="step_02_desc"
                                        value=""class="form-control"
                                        placeholder="Enter Short step_02_desc-1">{{ $whyChoose->step_02_desc }}</textarea>
                                    @error('step_02_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 3 Title </label>
                                    <input type="text" name="step_03_title"
                                        value="{{ old('step_03_title', $whyChoose->step_03_title) }}"class="form-control"
                                        placeholder="Enter Title-2">
                                    @error('step_03_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 3 Description</label>
                                    <textarea type="text" name="step_03_desc"
                                        value=""class="form-control"
                                        placeholder="Enter Short Description-2">{{ $whyChoose->step_03_desc }}</textarea>
                                    @error('step_03_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             

                        </div>
                        <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                            {{-- <button type="submit" class="btn btn-danger rounded text-capitalize">cancel</button> --}}
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
  
@endsection
