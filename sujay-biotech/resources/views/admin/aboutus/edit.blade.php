@extends('admin.layout.app')

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
                                    <h5 style="margin-left: 19px;">About Us</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"  style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('admin.aboutus.index') }}">About Us</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title')
                            About Us
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                    @if (session('success'))
                        <span class="alert alert-success">{{ session('success') }}</span>
                    @endif
                    <form method="POST" action="{{ route('admin.aboutus.update', $aboutus->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body  ">
                            <div class="row p-4">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Title</label>
                                        <input type="text" name="title"
                                            value="{{ $aboutus->title }}"class="form-control"
                                            placeholder="Enter  Title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Choose Image</label>
                                        <input class="form-control" type="file" name="image">
                                        <img src="{{ asset('admin/aboutImage/' . $aboutus->image) }}" alt=""
                                            style="width:60px;height:60px;">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
  
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Choose Image Two</label>
                                        <input class="form-control" type="file" name="image_two">
                                        <img src="{{ asset('admin/aboutImage/'.$aboutus->image_2) }}" alt=""
                                            style="width:60px;height:60px;">
                                        @error('image_two')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
 
                               
                              
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Meta Title</label>
                                        <input type="text" name="meta_title"
                                            value="{{ $aboutus->meta_title }}"class="form-control"
                                            placeholder="Enter Meta Title">
                                        @error('meta_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="meta_keywords" class="col-form-label">Meta Keywords</label>
                                        <textarea id="meta_keywords" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords">{{ implode("\n", json_decode($aboutus->meta_keywords)) }}</textarea>
                                        <span class="badge badge-danger">Please click enter tab for new keywords</span>
                                        @error('meta_keywords')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="meta_description" class="col-form-label">Meta Description</label>
                                        <textarea name="meta_description" class="form-control " placeholder="Enter Meta Description">{{ $aboutus->meta_description }}</textarea>
                                        @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="mission" class="col-form-label">Our Mission</label>
                                        <textarea name="mission" class="form-control " placeholder="Enter  mission">{{ $aboutus->mission }}</textarea>
                                        @error('mission')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="vision" class="col-form-label">Our Vision</label>
                                        <textarea name="vision" class="form-control" placeholder="Enter  vision">{{ $aboutus->vision }}</textarea>
                                        @error('vision')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Description</label>
                                        <textarea name="description" class="form-control ckeditor" placeholder="Enter  Description">{{ $aboutus->description }}</textarea>
                                        @error('description')
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
