@extends('admin.layout.main')
@section('title') Edit About  @endsection
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
   @if(session('success'))
   <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
       {{session('success')}}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif
   <!-- Row starts -->
   <div class="row gx-3">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5 class="card-title"> @yield('title') </h5>
            </div>
            <div class="card-body">
               <form action="{{route('abouts.update',['about'=>$about->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="title" placeholder="Enter title " value="{{$about->title}}">
                           @error('title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Experience <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="experience" placeholder="Enter experience " value="{{$about->experience}}">
                           @error('experience')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                      <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Top Image </label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="top_image"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,WEBP,SIZE:2MB Dimension:330X630)</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$about->top_image)}}">
                              <img src="{{asset('assets/dynamics/'.$about->top_image)}}" style="width: 100px;height:120px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('top_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Bottom Image </label>
                           <input type="file" id="fileInput2" class="form-control file-input" name="bottom_image"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,WEBP,SIZE:2MB Dimension:330X300 )</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$about->bottom_image)}}">
                              <img src="{{asset('assets/dynamics/'.$about->bottom_image)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput2" class="text-danger"></span>
                           @error('bottom_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="description" placeholder="Enter description " >{{$about->description}}</textarea>
                           @error('description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">mission_description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="mission_description" placeholder="Enter mission_description " >{{$about->mission_description}}</textarea>
                           @error('mission_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">vision_description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="vision_description" placeholder="Enter vision_description " >{{$about->vision_description}}</textarea>
                           @error('vision_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
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