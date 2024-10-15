@extends('admin.layout.app')
@section('title', 'Edit how it works')

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
                                            --}}<li class="breadcrumb-item active">Edit</li> 
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
                <form method="POST" action="{{ route('howitworks.update',['howitwork'=>$howitwork->id] ) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body  ">
                        <div class="row p-4">
                           
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Image  1</label>
                                    <input class="form-control" type="file" name="image_1">
                                    <span>Image <code>Width: 300px & Height: 300px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/aboutImage/' . $howitwork->box_01_image) }}" target="_blank"
                                        rel="noopener noreferrer"><img
                                            src="{{ asset('admin/aboutImage/' . $howitwork->box_01_image) }}" alt=""
                                            style="width:100px;"></a>
                                    @error('image_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 1 Title</label>
                                    <input type="text" name="title_1"
                                        value="{{ old('title_1', $howitwork->box_01_title) }}"class="form-control"
                                        placeholder="Enter Title">
                                    @error('title_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Image  2</label>
                                    <input class="form-control" type="file" name="image_2">
                                    <span>Image <code>Width: 300px & Height: 300px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/aboutImage/' . $howitwork->box_02_image) }}" target="_blank"
                                        rel="noopener noreferrer"><img
                                            src="{{ asset('admin/aboutImage/' . $howitwork->box_02_image) }}" alt=""
                                            style="width:100px;"></a>
                                    @error('image_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 2 Title</label>
                                    <input type="text" name="title_2"
                                        value="{{ old('title_2', $howitwork->box_02_title) }}"class="form-control"
                                        placeholder="Enter Title">
                                    @error('title_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Image  3</label>
                                    <input class="form-control" type="file" name="image_3">
                                    <span>Image <code>Width: 300px & Height: 300pxx</code></span>
                                    <br />
                                    <a href="{{ asset('admin/aboutImage/' . $howitwork->box_03_image) }}" target="_blank"
                                        rel="noopener noreferrer"><img
                                            src="{{ asset('admin/aboutImage/' . $howitwork->box_03_image) }}" alt=""
                                            style="width:100px;"></a>
                                    @error('image_3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 3 Title</label>
                                    <input type="text" name="title_3"
                                        value="{{ old('title_3', $howitwork->box_03_title) }}"class="form-control"
                                        placeholder="Enter Title">
                                    @error('title_3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                          
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Image 4</label>
                                    <input class="form-control" type="file" name="image_4">
                                    <span>Image <code>Width: 300px & Height: 300px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/aboutImage/' . $howitwork->box_04_image) }}" target="_blank"
                                        rel="noopener noreferrer"><img
                                            src="{{ asset('admin/aboutImage/' . $howitwork->box_04_image) }}" alt=""
                                            style="width:100px;"></a>
                                    @error('image_4')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Step 4 Title</label>
                                    <input type="text" name="title_4"
                                        value="{{ old('title_4', $howitwork->box_04_title) }}"class="form-control"
                                        placeholder="Enter Title">
                                    @error('title_4')
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
