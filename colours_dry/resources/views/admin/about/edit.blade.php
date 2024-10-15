@extends('admin.layout.app')
@section('title', 'Site Settings')

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
                                            <li class="breadcrumb-item"><a
                                                    href="{{ route('sitesettings.index') }}">@yield('title')</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
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
                <form method="POST" action="{{ route('abouts.update', $about->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body  ">
                        <div class="row p-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Title</label>
                                    <input type="text" name="title"
                                        value="{{ old('title', $about->title) }}"class="form-control"
                                        placeholder="Enter Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Short Description</label>
                                    <input type="text" name="short_description"
                                        value="{{ old('short_description', $about->short_description) }}"class="form-control"
                                        placeholder="Enter Short Description">
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                          
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Image</label>
                                    <input class="form-control" type="file" name="image">
                                    <span>Image <code>Width: 500px & Height: 500px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/aboutImage/' . $about->image) }}" target="_blank"
                                        rel="noopener noreferrer"><img
                                            src="{{ asset('admin/aboutImage/' . $about->image) }}" alt=""
                                            style="width:200px;"></a>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Image-2</label>
                                    <input class="form-control" type="file" name="image_2">
                                    <span>Image <code>Width: 500px & Height: 500px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/aboutImage/' . $about->image_2) }}" target="_blank"
                                        rel="noopener noreferrer"><img
                                            src="{{ asset('admin/aboutImage/' . $about->image_2) }}" alt=""
                                            style="width:200px;"></a>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control ckeditor">{!! $about->description !!}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Title-1</label>
                                    <input type="text" name="title_1"
                                        value="{{ old('title_1', $about->title_1) }}"class="form-control"
                                        placeholder="Enter Title-1">
                                    @error('title_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Short Description-1</label>
                                    <input type="text" name="short_description_1"
                                        value="{{ old('short_description_1', $about->short_description_1) }}"class="form-control"
                                        placeholder="Enter Short Description-1">
                                    @error('short_description_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Title-2</label>
                                    <input type="text" name="title_2"
                                        value="{{ old('title_2', $about->title_2) }}"class="form-control"
                                        placeholder="Enter Title-2">
                                    @error('title_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Short Description-2</label>
                                    <input type="text" name="short_description_2"
                                        value="{{ old('short_description_2', $about->short_description_2) }}"class="form-control"
                                        placeholder="Enter Short Description-2">
                                    @error('short_description_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Title-3</label>
                                    <input type="text" name="title_3"
                                        value="{{ old('title_3', $about->title_3) }}"class="form-control"
                                        placeholder="Enter Title-3">
                                    @error('title_3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Short Description-3</label>
                                    <input type="text" name="short_description_3"
                                        value="{{ old('short_description_3', $about->short_description_3) }}"class="form-control"
                                        placeholder="Enter Short Description-3">
                                    @error('short_description_3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Year Of Exprience</label>
                                    <input type="text" name="year_of_exprience"
                                        value="{{ old('year_of_exprience', $about->year_of_exprience) }}"class="form-control"
                                        placeholder="Enter Year Of Exprience">
                                    @error('year_of_exprience')
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
