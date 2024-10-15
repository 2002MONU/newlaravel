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
                                    <h5 style="margin-left: 19px;">Service</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"  style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('admin.service.index') }}">Service</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
                                           
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title')
                            Service
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                    @if (session('success'))
                        <span class="alert alert-success">{{ session('success') }}</span>
                    @endif
                    <form method="POST" action="{{ route('admin.service.update', $service->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body  ">
                            <div class="row p-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Name</label>
                                        <input type="text" name="name"
                                            value="{{ $service->name }}"class="form-control"
                                            placeholder="Enter Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Phone</label>
                                        <input type="text" name="phone"
                                            value="{{ $service->phone }}"class="form-control"
                                            placeholder="Enter Phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Choose Image</label>
                                        <input class="form-control" type="file" name="image">
                                        <img src="{{ asset('admin/serviceImage/' . $service->image) }}" alt=""
                                            style="width:60px;height:60px;">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>   
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="short_description" class="col-form-label">Short Description</label>
                                        <textarea name="short_description" class="form-control" placeholder="Enter Short Description">{{ $service->short_description }}</textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                               
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Status</label>
                                       <select name="status" id=""class="form-control">
                                        <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Inactive</option>
                                       </select>

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Priority</label>
                                        <input type="text" name="priority"
                                            value="{{ $service->priority }}"class="form-control" placeholder="Enter Priority"
                                            id="priority">
                                        @error('priority')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Meta Title</label>
                                        <input type="text" name="meta_title"
                                            value="{{ $service->meta_title }}"class="form-control"
                                            placeholder="Enter Meta Title">
                                        @error('meta_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="meta_keywords" class="col-form-label">Meta Keywords</label>
                                        <textarea id="meta_keywords" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords">{{ implode("\n", json_decode($service->meta_keywords)) }}</textarea>
                                        <span class="badge badge-danger">Please click enter tab for new keywords</span>
                                        @error('meta_keywords')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="meta_description" class="col-form-label">Meta Description</label>
                                        <textarea name="meta_description" class="form-control " placeholder="Enter Meta Description">{{ $service->meta_description }}</textarea>
                                        @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Choose Service Image</label>
                                        <input class="form-control" type="file" name="service_image">
                                        <img src="{{ asset('admin/serviceImage/' . $service->service_image) }}" alt=""
                                        style="width:60px;height:60px;">
                                        @error('service_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Choose Destination Image</label>
                                        <input class="form-control" type="file" name="destination_image">
                                        <img src="{{ asset('admin/serviceImage/' . $service->destination_image) }}" alt=""
                                        style="width:60px;height:60px;">
                                        @error('destination_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Icon</label>
                                        <input class="form-control" type="text" name="icon" placeholder="fas fa-water">
                                      
                                        @error('icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="service_description" class="col-form-label">Service Description</label>
                                        <textarea id="service_description" name="service_description" class="form-control ckeditor" placeholder="Enter Service Description">{!! $service->service_description !!}</textarea>
                                        @error('service_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="advantage" class="col-form-label">Advantage</label>
                                        <textarea id="advantage" name="advantage" class="form-control ckeditor" placeholder="Enter Advantage">{!! $service->advantage !!}</textarea>
                                        @error('advantage')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="destination_charge" class="col-form-label">Destination Charges</label>
                                        <textarea id="destination_charge" name="destination_charge" class="form-control ckeditor" placeholder="Enter Destination Charges">{!! $service->destination_charge !!}</textarea>
                                        @error('destination_charge')
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
