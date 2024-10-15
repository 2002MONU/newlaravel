@extends('admin.layout.main')
@section('title') Edit Site Settings  @endsection
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
               <form action="{{route('sitesettings.update',['sitesetting' => $site_setting->id ])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">Site Name <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="site_name" placeholder="Enter Site name" value="{{$site_setting->site_name}}">
                           @error('site_name')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                       <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">Service heading<span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="service_heading" placeholder="Enter service_heading" >{{$site_setting->service_heading}}</textarea>
                           @error('service_heading')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">Service_title <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="service_title" placeholder="Enter service_title" >{{$site_setting->service_title}}</textarea>
                           @error('service_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">How it works title<span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="howit_title" placeholder="Enter howit_title" >{{$site_setting->howit_title}}</textarea>
                           @error('howit_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">blog_title <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="blog_title" placeholder="Enter blog_title" >{{$site_setting->blog_title}}</textarea>
                           @error('blog_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">Faq_title <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="faq_title" placeholder="Enter faq_title" >{{$site_setting->faq_title}}</textarea>
                           @error('faq_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                     <div class="mb-3">
                        <label class="form-label" for="a2">Header Logo <span >( IMG-TYPE: JPG,PNG,JPEG,WEP, SIZE:2MB )</span></label>
                        <input type="file" class="form-control file-input"  id="fileInput1" name="header_logo" >
                       <a target="_blank" href="{{asset('assets/dynamics/'.$site_setting->header_logo)}}">
                        <img src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" style="width:120px;height:80px;" ></a>
                       <span id="messagefileInput2" class="text-danger"></span>
                       @error('header_logo')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                 
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                     <div class="mb-3">
                        <label class="form-label" for="a2">Favicon  <span >( IMG-TYPE: JPG,PNG,JPEG, SIZE:2MB )</span></label>
                        <input type="file" class="form-control file-input"  id="fileInput3" name="favicon" >
                        <a target="_blank" href="{{asset('assets/dynamics/'.$site_setting->favicon)}}">
                           <img src="{{asset('assets/dynamics/'.$site_setting->favicon)}}" style="width:120px;height:80px;"></a>
                       <span id="messagefileInput3" class="text-danger"></span>
                        @error('favicon')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                     <div class="mb-3">
                        <label class="form-label" for="a2">About_banner  <span >( IMG-TYPE: JPG,PNG,JPEG, SIZE:2MB )</span></label>
                        <input type="file" class="form-control file-input"  id="fileInput9" name="about_banner" >
                        <a target="_blank" href="{{asset('assets/dynamics/'.$site_setting->about_banner)}}">
                           <img src="{{asset('assets/dynamics/'.$site_setting->about_banner)}}" style="width:120px;height:80px;"></a>
                       <span id="messagefileInput9" class="text-danger"></span>
                        @error('about_banner')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                     <div class="mb-3">
                        <label class="form-label" for="a2">Blog_banner  background  <span >( IMG-TYPE: JPG,PNG,JPEG, SIZE:2MB )</span></label>
                        <input type="file" class="form-control file-input"  id="fileInput10" name="blog_banner" >
                        <a target="_blank" href="{{asset('assets/dynamics/'.$site_setting->blog_banner)}}">
                           <img src="{{asset('assets/dynamics/'.$site_setting->blog_banner)}}" style="width:120px;height:80px;"></a>
                       <span id="messagefileInput10" class="text-danger"></span>
                        @error('blog_banner')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Service_banner <span >( IMG-TYPE: JPG,PNG,JPEG, SIZE:2MB )</span></label>
                           <input type="file" class="form-control file-input"  id="fileInput4" name="service_banner" >
                          <a target="_blank" href="{{asset('assets/dynamics/'.$site_setting->service_banner)}}">
                           <img src="{{asset('assets/dynamics/'.$site_setting->service_banner)}}" style="width:120px;height:80px;"></a>
                         <span id="messagefileInput4" class="text-danger"></span>
                          @error('service_banner')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Contact_banner<span >( IMG-TYPE: JPG,PNG,JPEG,WEBP, SIZE:2MB )</span></label>
                           <input type="file" class="form-control file-input"  id="fileInput5" name="contact_banner" >
                           <a target="_blank" href="{{asset('assets/dynamics/'.$site_setting->contact_banner)}}">
                              <img src="{{asset('assets/dynamics/'.$site_setting->contact_banner)}}" style="width:120px;height:80px;"></a>
                          <span id="messagefileInput5" class="text-danger"></span>
                           @error('contact_banner')
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