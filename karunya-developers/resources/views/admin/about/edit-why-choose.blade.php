@extends('admin.layout.main')
@section('title') Edit WhyChooseUs  @endsection
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
               <form action="{{route('why-choose-us.update',$whyChooseUs->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Heading <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="heading" placeholder="Enter title " value="{{$whyChooseUs->heading}}">
                           @error('heading')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div> 
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="title" placeholder="Enter title " value="{{$whyChooseUs->title}}">
                           @error('title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                      <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Big  Image </label>
                           <input type="file" id="" class="form-control file-input" name="big_image"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,WEBP,SIZE:5MB )</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$whyChooseUs->big_image)}}">
                              <img src="{{asset('assets/dynamics/'.$whyChooseUs->big_image)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="description" placeholder="Enter description " >{{$whyChooseUs->description}}</textarea>
                           @error('description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Youtube Link <span class="text-danger">*</span> </label>
                           <input type="url" class="form-control"   name="youtube_link" placeholder="Enter youtube_link " value="{{$whyChooseUs->youtube_link}}">
                           @error('youtube_link')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Image  Small 1</label>
                           <input type="file" id="" class="form-control file-input" name="image_small_01"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,WEBP,SIZE:5MB )</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$whyChooseUs->image_small_01)}}">
                              <img src="{{asset('assets/dynamics/'.$whyChooseUs->image_small_01)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('image_small_01')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Image  Small 2</label>
                           <input type="file" id="" class="form-control file-input" name="image_small_02"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,WEBP,SIZE:5MB )</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$whyChooseUs->image_small_02)}}">
                              <img src="{{asset('assets/dynamics/'.$whyChooseUs->image_small_02)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('image_small_02')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                    
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Paragraph 1 <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="p_01" placeholder="Enter title " value="{{$whyChooseUs->p_01}}">
                           @error('p_01')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Paragraph 2 <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="p_02" placeholder="Enter title " value="{{$whyChooseUs->p_02}}">
                           @error('p_02')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Heading 1 <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="h_01" placeholder="Enter title " value="{{$whyChooseUs->h_01}}">
                           @error('h_01')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Heading 2 <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="h_02" placeholder="Enter title " value="{{$whyChooseUs->h_02}}">
                           @error('h_02')
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