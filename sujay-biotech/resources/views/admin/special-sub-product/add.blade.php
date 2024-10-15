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
                                    <h5 style="margin-left: 19px;">Special Product Add</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a
                                                    href="route('admin.product.index')">Special Products</a></li>
                                            <li class="breadcrumb-item active">Add</li>

                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @section('title')
                        Special  Products
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title    -->
            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif
            <form method="POST" action="{{ route('admin.store-special-sub-category') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body  ">
                    <div class="row p-4">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Product Category</label>
                                <select name="category" id=""class="form-control">
                                    <option selected disabled >Setect Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->product_name }}</option>
                                    @endforeach

                                </select>

                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Sub Product Name</label>
                                <input type="text" name="title" value="{{ old('title') }}"class="form-control"
                                    placeholder="Sub Product Name" id="title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Short Description</label>
                                <textarea name="short_description" class="form-control" id="short_description"
                                    rows="
                                        3">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"class="form-control"
                                    placeholder="Enter Phone" id="phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Whatsapp</label>
                                <input type="text" name="whatsapp" value="{{ old('whatsapp') }}"class="form-control"
                                    placeholder="Enter Whatsapp" id="whatsapp">
                                @error('whatsapp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-6">

                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Choose Image</label>
                                <input class="form-control" type="file" name="image">
                                <span class="text-danger">*Max-Image-size:5MB,Image-type:PNG,JPEG,JPG,Dim:350X350</span>
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
                       


                        <div class="col-6">

                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Priority</label>
                                <input type="text" name="priority" value="{{ old('priority') }}"class="form-control"
                                    placeholder="Enter Priority">
                                @error('priority')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}"
                                    placeholder="Enter Meta Title">
                                @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="meta_keywords" class="col-form-label">Meta Keywords</label>
                                <textarea id="meta_keywords" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords">{{ old('meta_keywords') }}</textarea>
                                <span class="badge badge-danger">Please click enter tab for new keywords</span>
                                @error('meta_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="meta_description" class="col-form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control " placeholder="Enter Meta Description">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Soluble Concentrate</label>
                                <input type="text" name="soluable_concentrate" value="{{ old('soluable_concentrate') }}"class="form-control"
                                    placeholder="Enter Soluble Concentrate" id="soluable_concentrate">
                                @error('soluable_concentrate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Features</label>
                                <textarea name="features" id=""class="form-control ckeditor" placeholder="Enter Features">{{ old('features') }}</textarea>
                                @error('features')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="customFile1" class="col-form-label">Specification</label>
                                <textarea name="specification" id=""class="form-control ckeditor" placeholder="Enter Specification">{{ old('specification') }}</textarea>
                                @error('specification')
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
