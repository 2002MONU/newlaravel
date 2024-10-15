@extends('admin.layout.main')
@section('title') Add Blog  @endsection
@section('maindashboard')
<!-- App container starts -->
<!-- App hero header starts -->
<div class="app-hero-header d-flex align-items-center">
   <!-- Breadcrumb starts -->
   <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
         <a href="{{route('admin.dashboard')}}">Home</a>
      </li>
      <li class="breadcrumb-item text-primary" aria-current="page">
         <a href="javascript:history.back()"> Back</a>
      </li>
      <li class="breadcrumb-item text-primary" aria-current="page">
         @yield('title')
      </li>
   </ol>
</div>
<!-- App Hero header ends -->
<!-- App body starts -->
<div class="app-body">
   
   <!-- Row starts -->
   <div class="row gx-3">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5 class="card-title"> @yield('title') </h5>
            </div>
            <div class="card-body">
               <form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="title" placeholder="Enter title " value="{{old('title')}}"> 
                           @error('title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                    
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog Small Image <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput2" class="form-control file-input" name="small_image"  >
                           <span> ( Note:IMG TYPE:-JPEG,PNG,JPG,WEBP,SIZE:2MB Dimension:- 250X210 PX)</span>
                           <span id="messagefileInput2" class="text-danger"></span>
                           @error('small_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog main Image <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="main_image"  >
                           <span> ( Note:IMG TYPE:-JPEG,PNG,JPG,WEBP,SIZE:2MB Dimension:- 840X400 PX)</span>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('main_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label" for="a2">Blog Image (<span class="text-danger">Please select 2 images</span>)</label>
                            <input type="file" id="fileInput3" class="form-control file-input" multiple name="image_02[]" >
                            <span> ( Note: IMG TYPE:- JPEG, PNG, JPG, WEBP, SIZE: 2MB, Dimension:- 340X250 PX)</span>
                            <span id="messagefileInput3" class="text-danger"></span>
                    
                            {{-- Loop through the errors for each image in the array --}}
                            @if ($errors->has('image_02'))
                                @foreach ($errors->get('image_02') as $message)
                                    <div class="error text-danger">{{ $message }}</div>
                                @endforeach
                            @endif
                            {{-- Check for individual image errors --}}
                            @foreach ($errors->get('image_02.*') as $messages)
                                @foreach ($messages as $message)
                                    <div class="error text-danger">{{ $message }}</div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Priority <span class="text-danger">*</span></label>
                           <input type="number" class="form-control"  name="priority" placeholder="Enter priority " value="{{old('priority')}}">
                           @error('priority')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Status <span class="text-danger">*</span></label>
                           <select name="status" id="" class="form-control">
                              <option value="" >Status</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                           </select>
                           @error('status')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-12 col-lg-12 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor" rows="6"   name="description" placeholder="Enter heading " value=""> {{old('description')}}</textarea>
                           @error('description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                      <div class="col-xxl-12 col-lg-12 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog Details  Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor" rows="6"  name="blog_description" placeholder="Enter blog_description " value=""> {{old('blog_description')}}</textarea>
                           @error('blog_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-sm-12">
                        <div class="d-flex gap-2 justify-content-end">
                           <button class="btn btn-primary" type="submit">
                           Submit
                           </button>
                        </div>
                     </div>
                  </div>
                  <!-- Row ends -->
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Row ends -->
</div>
<!-- App body ends -->
@endsection