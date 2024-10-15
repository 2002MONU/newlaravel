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
                                <h5 style="margin-left: 19px;">Edit Why Choose Us</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><a href="{{ route('admin.whychooseus.index') }}">Why Choose Us</a></li>
                                        <li class="breadcrumb-item active">Edit</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @section('title')
                        Edit Why Choose Us
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card-body">
                @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
                @endif

                <form method="POST" action="{{ route('admin.whychooseus.update', $whychooseus->id) }}" enctype="multipart/form-data">
                    @csrf
              
                    <div class="row p-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $whychooseus->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                <img src="{{ asset('storage/' . $whychooseus->image) }}" alt="" style="width:100px;height:100px">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_2">Title 2</label>
                                <input type="text" class="form-control" name="title_2" id="title_2" value="{{ $whychooseus->title_2 }}">
                                @error('title_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image_2">Image 2</label>
                                <input type="file" class="form-control" name="image_2" id="image_2">
                                <img src="{{ asset('storage/' . $whychooseus->image_2) }}" alt="" style="width:100px;height:100px">
                                @error('image_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_3">Title 3</label>
                                <input type="text" class="form-control" name="title_3" id="title_3" value="{{ $whychooseus->title_3 }}">
                                @error('title_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image_3">Image 3</label>
                                <input type="file" class="form-control" name="image_3" id="image_3">
                                <img src="{{ asset('storage/' . $whychooseus->image_3) }}" alt="" style="width:100px;height:100px">
                                @error('image_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_1">Description 1</label>
                                <textarea class="form-control" name="description_1" id="description_1">{{ $whychooseus->description_1 }}</textarea>
                                @error('description_1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_2">Description 2</label>
                                <textarea class="form-control" name="description_2" id="description_2">{{ $whychooseus->description_2 }}</textarea>
                                @error('description_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_3">Description 3</label>
                                <textarea class="form-control" name="description_3" id="description_3">{{ $whychooseus->description_3 }}</textarea>
                                @error('description_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                        <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
