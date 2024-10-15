@extends('admin.layout.app')
@section('title', 'Sliders')
@section('maincontent')
<div class="col-12">
    <div class="card-group box-margin">
        <div class="card">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 style="margin-left: 19px;">@yield('title') Edit</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><a href="{{ route('services.index') }}">@yield('title')</a></li>
                                        <li class="breadcrumb-item active">@yield('title') Edit</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- End page title -->

            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif

            <form method="POST" action="{{ route('sliders.update',['slider'=>$slider->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Title</label>
                                <input type="text" name="title" value="{{ $slider->title }}" class="form-control" placeholder="Enter title" >
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Heading</label>
                                <input type="text" name="heading" value="{{ $slider->heading }}" class="form-control" placeholder="Enter Heading" >
                                @error('heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="description" class="col-form-label"> Description</label>
                                <textarea name="description" class="form-control " placeholder="Enter  Description">{{ $slider->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="image" class="col-form-label">Banner Image</label>
                                <input type="file" name="banner_image" class="form-control" id="banner_image">
                                <a target="_blank" href="{{asset('admin/serviceImage/'.$slider->banner_image)}}">
                                    <img src="{{asset('admin/serviceImage/'.$slider->banner_image)}}" style="width: 100px;height:70px;"></a>
                                @error('banner_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status" class="col-form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="priority" class="col-form-label">Priority</label>
                                <input type="text" name="priority" value="{{ $slider->priority }}" class="form-control" placeholder="Enter Priority" id="priority">
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
