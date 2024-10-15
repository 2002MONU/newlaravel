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
               <h5 class="card-title">@yield('title') </h5>
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
                           <label class="form-label" for="a2">Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="description" placeholder="Enter description " >{{$about->description}}</textarea>
                           @error('description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Experience Icon <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="experince_image"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,SIZE:1MB)</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/slider/'.$about->experince_image)}}"><img src="{{asset('assets/dynamics/slider/'.$about->experince_image)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('experince_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Years Of Experience </label>
                           <input type="number" class="form-control"  name="experince" placeholder="Enter experince " value="{{$about->experince}}">
                           @error('experince')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
<!--                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Services Icon <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="service_image"   >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,SIZE:2MB)</span><br>
                           <a target="_blank" href=""><img src="{{asset('assets/dynamics/slider/'.$about->service_image)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('service_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>-->
<!--                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Total Services </label>
                           <input type="text" class="form-control"  name="service" placeholder="Enter priority " value="{{$about->service}}">
                           @error('service')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>-->
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