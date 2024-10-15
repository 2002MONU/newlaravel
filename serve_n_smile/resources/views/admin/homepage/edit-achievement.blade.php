@extends('admin.layout.main')
@section('title') Edit Our Achievement  @endsection
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
               <form action="{{route('achievements.update',['achievement'=>$our_Achievement->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                         <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Title<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="title" placeholder="Enter title " value="{{$our_Achievement->title}}">
                           @error('title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Done <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control "   name="project_done" placeholder="Enter project_done " value="{{$our_Achievement->project_done}}">
                           @error('project_done')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                       
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Happy Clients  <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control"   name="happy_clients" placeholder="Enter happy_clients " value="{{$our_Achievement->happy_clients}}">
                           @error('happy_clients')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Background Image (Please select image left  side plane and  right side image ) </label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="image"  placeholder="Enter banner link " >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,WEBP,SIZE:2MB  ,Dimension:-1100X650 PX)</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$our_Achievement->image)}}">
                              <img src="{{asset('assets/dynamics/'.$our_Achievement->image)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('image')
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