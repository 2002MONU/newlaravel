@extends('admin.layout.main')
@section('title') Edit Site Setting  @endsection
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
                           <label class="form-label" for="a1">Footer About <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="footer_title" placeholder="Enter footer_title" >{{$site_setting->footer_title}}</textarea>
                           @error('footer_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">Product title <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="product_title" placeholder="Enter product_title" >{{$site_setting->product_title}}</textarea>
                           @error('product_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">Team title <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="team_title" placeholder="Enter team_title" >{{$site_setting->team_title}}</textarea>
                           @error('team_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">OTC title <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="otc_title" placeholder="Enter otc_title" >{{$site_setting->otc_title}}</textarea>
                           @error('otc_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                       <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a1">Ethical title <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="ethical_title" placeholder="Enter ethical_title" >{{$site_setting->ethical_title}}</textarea>
                           @error('ethical_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror  
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                     <div class="mb-3">
                        <label class="form-label" for="a2">Header Logo <span >( IMG-TYPE: JPG,PNG,JPEG,WEP, SIZE:2MB )</span></label>
                        <input type="file" class="form-control file-input"  id="fileInput1" name="header_logo" >
                       <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->header_logo)}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->header_logo)}}" style="width:120px;height:80px;" ></a>
                       <span id="messagefileInput2" class="text-danger"></span>
                       @error('header_logo')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                     <div class="mb-3">
                        <label class="form-label" for="a2">Footer Logo <span >( IMG-TYPE: JPG,PNG,JPEG, SIZE:2MB )</span> </label>
                        <input type="file" class="form-control file-input"  id="fileInput2" name="footer_logo" >
                        <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->footer_logo)}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->footer_logo)}}" style="width:120px;height:80px;" class="bg-dark p-1"></a>
                       <span id="messagefileInput2" class="text-danger"></span>
                        @error('footer_logo')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                     <div class="mb-3">
                        <label class="form-label" for="a2">Favicon  <span >( IMG-TYPE: JPG,PNG,JPEG, SIZE:2MB )</span></label>
                        <input type="file" class="form-control file-input"  id="fileInput3" name="favicon" >
                        <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->favicon)}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->favicon)}}" style="width:120px;height:80px;"></a>
                       <span id="messagefileInput3" class="text-danger"></span>
                        @error('favicon')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                     <div class="mb-3">
                        <label class="form-label" for="a2">Reach_out_image  <span >( IMG-TYPE: JPG,PNG,JPEG, SIZE:2MB )</span></label>
                        <input type="file" class="form-control file-input"  id="fileInput9" name="reach_out_image" >
                        <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->reach_out_image)}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->reach_out_image)}}" style="width:120px;height:80px;"></a>
                       <span id="messagefileInput9" class="text-danger"></span>
                        @error('reach_out_image')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                     <div class="mb-3">
                        <label class="form-label" for="a2">Achievemenmt background  <span >( IMG-TYPE: JPG,PNG,JPEG, SIZE:2MB )</span></label>
                        <input type="file" class="form-control file-input"  id="fileInput10" name="achieve_back" >
                        <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->achieve_back)}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->achieve_back)}}" style="width:120px;height:80px;"></a>
                       <span id="messagefileInput10" class="text-danger"></span>
                        @error('achieve_back')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">company_background <span >( IMG-TYPE: JPG,PNG,JPEG, SIZE:2MB )</span></label>
                           <input type="file" class="form-control file-input"  id="fileInput4" name="company_background" >
                          <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->company_background)}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->company_background)}}" style="width:120px;height:80px;"></a>
                         <span id="messagefileInput4" class="text-danger"></span>
                          @error('company_background')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Product_background<span >( IMG-TYPE: JPG,PNG,JPEG,WEBP, SIZE:2MB )</span></label>
                           <input type="file" class="form-control file-input"  id="fileInput5" name="product_background" >
                           <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->product_background)}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->product_background)}}" style="width:120px;height:80px;"></a>
                          <span id="messagefileInput5" class="text-danger"></span>
                           @error('product_background')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Export_background <span >( IMG-TYPE: JPG,PNG,JPEG,WEBP, SIZE:2MB )</span></label>
                           <input type="file" class="form-control file-input"  id="fileInput6" name="export_background" >
                           <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->export_background)}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->export_background)}}" style="width:120px;height:80px;"></a>
                           <span id="messagefileInput6" class="text-danger"></span>
                           @error('export_background')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Career background <span >( IMG-TYPE: JPG,PNG,JPEG,WEBP, SIZE:2MB )</span></label>
                           <input type="file" class="form-control file-input"  id="fileInput7" name="career_background">
                           <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->career_background)}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->career_background)}}" style="width:120px;height:80px;"></a>
                           <span id="messagefileInput7" class="text-danger"></span>
                           @error('career_background')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Contact background <span >( IMG-TYPE: JPG,PNG,JPEG,WEBP, SIZE:2MB )</span></label>
                           <input type="file" class="form-control file-input"  id="fileInput8" name="contact_background">
                          <a target="_blank" href="{{asset('assets/dynamics/setting/'.$site_setting->contact_background)}}"><img class="bg-dark p-1" src="{{asset('assets/dynamics/setting/'.$site_setting->contact_background)}}" style="width:120px;height:80px;"></a>
                            <span id="messagefileInput8" class="text-danger"></span>
                           @error('contact_background')
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