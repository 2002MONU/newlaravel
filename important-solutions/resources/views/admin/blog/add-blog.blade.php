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
   {{-- @if ($errors->any())
   <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif --}}
   <!-- Row starts -->
   <div class="row gx-3">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5 class="card-title"> @yield('title') </h5>
            </div>
            <div class="card-body">
               <form action="{{route('blogdetails.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="title" placeholder="Enter title " value="{{old('title')}}"> 
                           @error('title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog Post By <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="post_by" placeholder="Enter title " value="{{old('post_by')}}"> 
                           @error('post_by')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label" for="a2">Blog Post Date <span class="text-danger">*</span> </label>
                            <input type="date" class="form-control" id="blog_post_date" name="blog_post_date" placeholder="Enter title" value="{{ old('blog_post_date') }}"> 
                            {{-- <input type="hidden" id="month_name" name="month_name" value="{{ old('month_name') }}"> --}}
                            @error('blog_post_date')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror 
                        </div>
                    </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog Image </label>
                           <input type="file" id="fileInput2" class="form-control file-input" name="blog_image"   >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,SIZE:2MB)</span>
                           <span id="messagefileInput2" class="text-danger"></span>
                           @error('blog_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Priority </label>
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
                              <option default >Status</option>
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
                            <textarea type="text" class="form-control ckeditor" id="description" name="description" placeholder="Enter description" > {{ old('description') }}</textarea>
                            
                            @error('description')
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
   {{-- <script>
    document.getElementById('blog_post_date').addEventListener('change', function() {
        var date = new Date(this.value);
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var monthName = monthNames[date.getMonth()];
        document.getElementById('month_name').value = monthName;
    });
</script> --}}
</div>
<!-- App body ends -->
@endsection