@extends('admin.layout.main')
@section('title') Edit How it works  @endsection
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
               <form action="{{route('how-we-works.update',['how_we_work'=>$howItWork->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$howItWork->planning}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="planning" placeholder="Enter {{$howItWork->planning}} " value="{{$howItWork->planning}}">
                           @error('planning')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$howItWork->planning}} Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="planning_desc" placeholder="Enter {{$howItWork->planning_desc}} " >{{$howItWork->planning_desc}}</textarea>
                           @error('planning_desc')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$howItWork->design}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="design" placeholder="Enter {{$howItWork->design}} " value="{{$howItWork->design}}">
                           @error('design')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$howItWork->design}} Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="design_desc" placeholder="Enter {{$howItWork->design_desc}} " >{{$howItWork->design_desc}}</textarea>
                           @error('design_desc')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$howItWork->construct}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="construct" placeholder="Enter {{$howItWork->construct}} " value="{{$howItWork->construct}}">
                           @error('construct')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$howItWork->construct}} Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="construct_desc" placeholder="Enter {{$howItWork->construct_desc}} " >{{$howItWork->construct_desc}}</textarea>
                           @error('construct_desc')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$howItWork->finishing}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="finishing" placeholder="Enter {{$howItWork->finishing}} " value="{{$howItWork->finishing}}">
                           @error('finishing')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$howItWork->finishing}} Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="finishing_desc" placeholder="Enter {{$howItWork->finishing_desc}} " >{{$howItWork->finishing_desc}}</textarea>
                           @error('finishing_desc')
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