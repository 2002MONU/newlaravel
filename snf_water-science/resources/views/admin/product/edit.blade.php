@extends('admin.layout.app')
@section('title', 'products')
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
                                    <h5 style="margin-left: 19px;">@yield('title') Edit</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">@yield('title')</a></li>
                                            <li class="breadcrumb-item active">@yield('title') Edit</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @if (session('success'))
                    <span class="alert alert-success">{{ session('success') }}</span>
                @endif

                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter name" id="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                         
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description" class="col-form-label"> Description</label>
                                    <textarea name="description" class="form-control ckeditor" placeholder="Enter  Description">{!!  $product->description !!}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image" class="col-form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    <a href="{{ asset('admin/productImage/' . $product->image) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('admin/productImage/' . $product->image) }}" alt="" style="width:60px;height:60px;"></a>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image_2" class="col-form-label">Image-2</label>
                                    <input type="file" name="image_2" class="form-control" id="image_2">
                                    <img src="{{ asset('admin/productImage/' . $product->image_2) }}" alt="" style="width:60px;height:60px;"></a>
                                    @error('image_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="background_image" class="col-form-label">Background Image</label>
                                    <input type="file" name="background_image" class="form-control" id="background_image">
                                    <img src="{{ asset('admin/productImage/' . $product->background_image) }}" alt="" style="width:60px;height:60px;"></a>
                                    @error('background_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="breadcum_image" class="col-form-label">Breadcum Image</label>
                                    <input type="file" name="breadcum_image" class="form-control" id="breadcum_image">
                                    <img src="{{ asset('admin/productImage/' . $product->breadcum_image) }}" alt="" style="width:60px;height:60px;"></a>
                                    @error('breadcum_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
    

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" @if($product->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($product->status == 0) selected @endif>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="priority" class="col-form-label">Priority</label>
                                    <input type="text" name="priority" value="{{ $product->priority }}" class="form-control" placeholder="Enter Priority" id="priority">
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Meta Title</label>
                                    <input type="text" name="meta_title"
                                        value="{{ $product->meta_title }}"class="form-control"
                                        placeholder="Enter Meta Title">
                                    @error('meta_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="meta_keywords" class="col-form-label">Meta Keywords</label>
                                    <textarea id="meta_keywords" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords">{{ implode("\n", json_decode($product->meta_keywords)) }}</textarea>
                                    <span class="badge badge-danger">Please click enter tab for new keywords</span>
                                    @error('meta_keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="meta_description" class="col-form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control " placeholder="Enter Meta Description">{{ $product->meta_description }}</textarea>
                                    @error('meta_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                        </div>

                        <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
