@extends('admin.layout.main')
@section('title') Edit Vision & Mission   @endsection
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
               <form action="{{route('ourvisions.update',['ourvision'=>$our_vision->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Vision Icon <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="vision_icon"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,SIZE:1MB)</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/slider/'.$our_vision->vision_icon)}}"><img src="{{asset('assets/dynamics/slider/'.$our_vision->vision_icon)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('vision_icon')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Vision Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="our_vision" placeholder="Enter our_vision " >{{$our_vision->our_vision}}</textarea>
                           @error('our_vision')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                      <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Mission Icon <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput2" class="form-control file-input" name="mission_icon"   >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,SIZE:1MB)</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/slider/'.$our_vision->mission_icon)}}"><img src="{{asset('assets/dynamics/slider/'.$our_vision->mission_icon)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput2" class="text-danger"></span>
                           @error('mission_icon')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Mission Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="our_mission" placeholder="Enter our_mission " >{{$our_vision->our_mission}}</textarea>
                           @error('our_mission')
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