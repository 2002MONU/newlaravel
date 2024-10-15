@extends('admin.layout.main')
@section('title') Edit Meta Tags  @endsection
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
               <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
               <form action="{{route('metatags.update',['metatag' => $meta_tags->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">OG Description </label>
                           <input type="text" class="form-control" name="og_description" placeholder="Enter og_description" value="{{$meta_tags->og_description}}">
                           @error('og_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">OG Site Name </label>
                           <input type="text" class="form-control" name="og_site_name" placeholder="Enter og_site_name" value="{{$meta_tags->og_site_name}}">
                           @error('og_site_name')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">OG Title </label>
                           <input type="text" class="form-control " name="og_title" placeholder="Enter og_title" value="{{$meta_tags->og_title}}">
                           @error('og_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">OG Url </label>
                           <input type="text" class="form-control text-dark"  name="og_url" placeholder="Enter og_url" value="{{$meta_tags->og_url}}">
                           @error('og_url')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">OG Type</label>
                           <input type="text" class="form-control text-dark"  name="og_type" placeholder="Enter og_type" value="{{$meta_tags->og_type}}">
                           @error('og_type')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Twitter Card </label>
                           <input type="text" class="form-control text-dark"  name="twitter_card" placeholder="Enter twitter_card" value="{{$meta_tags->twitter_card}}">
                           @error('twitter_card')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Twitter_type </label>
                           <input type="text" class="form-control text-dark"  name="twitter_type" placeholder="Enter twitter_type" value="{{$meta_tags->twitter_type}}">
                           @error('twitter_type')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Twitter_site </label>
                           <input type="text" class="form-control text-dark"  name="twitter_site" placeholder="Enter twitter_site" value="{{$meta_tags->twitter_site}}">
                           @error('twitter_site')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                        <div class="col-xxl-6 col-lg-6 col-sm-12">
                           <div class="mb-3">
                              <label class="form-label" for="a2">Twitter_creator </label>
                              <input type="text" class="form-control text-dark"  name="twitter_creator" placeholder="Enter twitter_creator" value="{{$meta_tags->twitter_creator}}">
                              @error('twitter_creator')
                              <div class="error text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-sm-12">
                           <div class="mb-3">
                              <label class="form-label" for="a2">Twitter_title </label>
                              <input type="text" class="form-control text-dark"  name="twitter_title" placeholder="Enter twitter_title" value="{{$meta_tags->twitter_title}}">
                              @error('twitter_title')
                              <div class="error text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-sm-12">
                           <div class="mb-3">
                              <label class="form-label" for="a2">Twitter_description </label>
                              <input type="text" class="form-control text-dark"  name="twitter_description" placeholder="Enter twitter_description" value="{{$meta_tags->twitter_description}}">
                              @error('twitter_description')
                              <div class="error text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-sm-12">
                           <div class="mb-3">
                              <label class="form-label" for="a2">Twitter_image </label>
                              <input type="file" class="form-control text-dark"  name="twitter_image"  value="{{$meta_tags->twitter_image}}">
                             <a href="{{asset('assets/dynamics/'.$meta_tags->twitter_image)}}">
                                  <img src="{{asset('assets/dynamics/'.$meta_tags->twitter_image)}}" style="width: 100px;height:80px;"></a>
                              @error('twitter_description')
                              <div class="error text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-sm-12">
                           <div class="mb-3">
                              <label class="form-label" for="a2">OG image </label>
                              <input type="file" class="form-control text-dark"  name="og_image"  value="{{$meta_tags->og_image}}">
                              <a href="{{asset('assets/dynamics/'.$meta_tags->og_image)}}">
                                  <img src="{{asset('assets/dynamics/'.$meta_tags->og_image)}}" style="width: 100px;height:80px;"></a>
                              @error('og_image')
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
<!-- Include necessary CSS and JS files for bootstrap-tagsinput -->
@endsection