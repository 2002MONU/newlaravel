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
                                <h5 style="margin-left: 19px;"> Special Category  Add</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"  style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><a href="{{route('board-directors.index')}}">  Special Category</a></li>
                                        <li class="breadcrumb-item active">Add</li>
                                       
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @section('title')
                         Special Category
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->
                    @if (session('success'))
                        <span class="alert alert-success">{{ session('success') }}</span>
                    @endif
                    <form method="POST" action="{{ route('admin.store-special-category') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body  ">
                            <div class="row p-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Category</label>
                                        <select name="category" id="" class="form-control">
                                            <option value="">Select Category</option> 
                                            @foreach ($categories as $cate)
                                            <option value="{{$cate->id}}" >{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Product Name</label>
                                        <input type="text" name="product_name"
                                            value="{{ old('product_name') }}"class="form-control" placeholder="Enter product_name"
                                            id="product_name">
                                        @error('product_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                             <div class="col-6">
                                     <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Choose Image</label>
                                        <input class="form-control" type="file" name="image">

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="customFile1" class="col-form-label">Status</label>
                                       <select name="status" id=""class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                       </select>

                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Description</label>
                                        <textarea name="description" class="form-control ckeditor" placeholder="Enter  Description">{{ old('description') }}</textarea>
                                        @error('description')
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



    </div>
    </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
 
@endsection
