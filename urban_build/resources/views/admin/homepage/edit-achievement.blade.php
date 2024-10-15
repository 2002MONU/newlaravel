@extends('admin.layout.main')
@section('title') Edit  Achievement  @endsection
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
               <form action="{{route('achievements.update',['achievement'=>$our_Achievement->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                        
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Years Experience<span class="text-danger">*</span> </label>
                           <input type="number" class="form-control "   name="experience" placeholder="Enter experience " value="{{$our_Achievement->experience}}">
                           @error('experience')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                       
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Completed Projects <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control"   name="completed_project" placeholder="Enter completed_project " value="{{$our_Achievement->completed_project}}">
                           @error('completed_project')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                    
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Ongoing Projects <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control "   name="ongoing_project" placeholder="Enter ongoing_project " value="{{$our_Achievement->ongoing_project}}">
                           @error('ongoing_project')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                      
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Skilled Workforce <span class="text-danger">*</span> </label>
                           <input type="number" class="form-control "   name="skilled_worker" placeholder="Enter skilled_worker " value="{{$our_Achievement->skilled_worker}}">
                           @error('skilled_worker')
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