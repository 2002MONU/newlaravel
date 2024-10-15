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
                                    <h5 style="margin-left: 19px;">Gallery Add</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('galleries.index') }}">Gallery</a></li>
                                            <li class="breadcrumb-item active">Gallery Add</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title')
                            Gallery Add
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @if (session('success'))
                    <span class="alert alert-success">{{ session('success') }}</span>
                @endif

                <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter title">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image" class="col-form-label">Select Images</label>
                                    <input type="file" name="images[]" class="form-control" id="image" multiple>
                                    
                                    <!-- Display validation error for the main images field -->
                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            
                                    <!-- Loop through each image file's validation errors -->
                                    @if($errors->has('images.*'))
                                        @foreach ($errors->get('images.*') as $key => $messages)
                                            @foreach ($messages as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            
                            

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="priority" class="col-form-label">Priority</label>
                                    <input type="text" name="priority" value="{{ old('priority') }}" class="form-control" placeholder="Enter Priority" id="priority">
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
