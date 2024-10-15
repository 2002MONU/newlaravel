@extends('admin.layout.main')
@section('title') Edit Contact  @endsection
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
               <form action="{{route('contactdetails.update',['contactdetail'=>$contact->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Mobile No <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="mobile_no" placeholder="Enter mobile no " value="{{$contact->mobile_no}}"> 
                           @error('mobile_no')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Hotline No <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="hotline_no" placeholder="Enter hotline no " value="{{$contact->hotline_no}}"> 
                           @error('hotline_no')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Email <span class="text-danger">*</span> </label>
                           <input type="email" class="form-control "   name="email" placeholder="Enter email " value="{{$contact->email}}"> 
                           @error('email')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Facebook  </label>
                           <input type="url" class="form-control "   name="facebook" placeholder="Enter facebook link " value="{{$contact->facebook}}"> 
                           @error('facebook')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Twitter </label>
                           <input type="url" class="form-control"  name="twitter" placeholder="Enter twitter link " value="{{$contact->twitter}}">
                           @error('twitter')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Youtube </label>
                           <input type="url" class="form-control"  name="google" placeholder="Enter youtube link " value="{{$contact->google}}">
                           @error('google')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Instagram </label>
                           <input type="url" class="form-control"  name="instagram" placeholder="Enter instagram link " value="{{$contact->instagram}}">
                           @error('instagram')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Linkedin </label>
                           <input type="url" class="form-control"  name="behance" placeholder="Enter behance url " value="{{$contact->behance}}">
                           @error('behance')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Map Link <span class="text-danger">*</span> </label>
                           <textarea type="url" class="form-control"  name="map_link" placeholder="Enter map_link " value="">{{$contact->map_link}}</textarea>
                           @error('map_link')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Address <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "  name="address" placeholder="Enter address " value="">{{$contact->address}}</textarea>
                           @error('address')
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