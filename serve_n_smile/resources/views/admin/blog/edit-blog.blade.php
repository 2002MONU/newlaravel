@extends('admin.layout.main')
@section('title') Edit Blog  @endsection
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
               <form action="{{route('blogs.update',['blog'=>$blog->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="title" placeholder="Enter title " value="{{old('title',$blog->title)}}"> 
                           @error('title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Post By <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="post_by" placeholder="Enter post by " value="{{old('post_by',$blog->writer_name)}}"> 
                           @error('post_by')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog Image <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="image"  >
                           <span> ( Note:IMG TYPE:-JPEG,PNG,JPG,WEBP,SIZE:2MB, Dimension:- 1200X600 PX)</span>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$blog->image)}}" target="_blank">
                            <img src="{{asset('assets/dynamics/'.$blog->image)}}" style="width:80px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Like <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control "   name="like" placeholder="Enter like " value="{{old('like',$blog->like)}}"> 
                           @error('like')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Comments<span class="text-danger">*</span> </label>
                           <input type="number" class="form-control "   name="comments" placeholder="Enter comments " value="{{old('comments',$blog->comments)}}"> 
                           @error('comments')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                   
                     
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Priority <span class="text-danger">*</span></label>
                           <input type="number" class="form-control"  name="priority" placeholder="Enter priority " value="{{old('priority',$blog->priority)}}">
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
                              <option value="1" {{$blog->status == 1 ? 'selected' : ''}}>Active</option>
                              <option value="0" {{$blog->status == 0 ? 'selected' : ''}}>Inactive</option>
                           </select>
                           @error('status')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-12 col-lg-12 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="description" placeholder="Enter heading " value=""> {{old('description',$blog->description)}}</textarea>
                           @error('description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                      <div class="col-xxl-12 col-lg-12 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Blog Details  Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="blog_description" placeholder="Enter blog_description " value=""> {{old('blog_description',$blog->blog_description)}}</textarea>
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