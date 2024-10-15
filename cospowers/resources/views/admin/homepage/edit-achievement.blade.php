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
                           <label class="form-label" for="a2">Years of Group Experience<span class="text-danger">*</span> </label>
                           <input type="number" class="form-control "   name="experience" placeholder="Enter experience " value="{{$our_Achievement->experience}}">
                           @error('experience')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">After-sales Service Centers <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control "   name="after_sale" placeholder="Enter after_sale " value="{{$our_Achievement->after_sale}}">
                           @error('after_sale')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                       
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Field-service Engineers  <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control"   name="field_service" placeholder="Enter field_service " value="{{$our_Achievement->field_service}}">
                           @error('field_service')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Telecom Sites Installed & Maintained  <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control"   name="telecom_sites" placeholder="Enter telecom_sites " value="{{$our_Achievement->telecom_sites}}">
                           @error('telecom_sites')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">High-profile Clients <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control"   name="high_profile" placeholder="Enter high_profile " value="{{$our_Achievement->high_profile}}">
                           @error('high_profile')
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