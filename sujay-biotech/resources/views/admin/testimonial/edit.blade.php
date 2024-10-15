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
                                    <h5 style="margin-left: 19px;">Testimonial Edit</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"  style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a href="route('admin.customers.index')">Testimonial</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
                                           
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title')
                            Testimonial
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                    @if (session('success'))
                        <span class="alert alert-success">{{ session('success') }}</span>
                    @endif
                    <form method="POST" action="{{ route('admin.testimonial.update', $testimonials->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body  ">
                            <div class="row p-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Name</label>
                                        <input type="text" name="name" 
                                            value="{{ $testimonials->name }}"class="form-control"
                                            placeholder="Enter Name" id="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Designation</label>
                                        <input type="text" name="designation"
                                        value="{{ $testimonials->name }}"class="form-control" placeholder="Enter Designation"
                                            id="designation">
                                        @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Choose Image</label>
                                        <input class="form-control" type="file" name="image">
                                        <img src="{{ asset('admin/imgTestimonial/' . $testimonials->image) }}" alt=""
                                            style="width:60px;height:60px;">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                        
                               
                           
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $testimonials->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $testimonials->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Priority</label>
                                        <input type="text" name="priority"
                                            value="{{ $testimonials->priority }}"class="form-control" placeholder="Enter Priority"
                                            id="priority">
                                        @error('priority')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                     <div class="col-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Description</label>
                                        <textarea name="description" class="form-control ckeditor" placeholder="Enter Description">
                                          
                                                {!! $testimonials->description !!}   
                                        </textarea>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   

@endsection
