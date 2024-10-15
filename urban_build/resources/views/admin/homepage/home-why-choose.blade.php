@extends('admin.layout.main')
@section('title') Edit Home WhyChooseUs  @endsection
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
               <form action="{{route('why-chooses.update',$whyChooseUs->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                    
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
                           <label class="form-label" for="a2">Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control " rows="4"  name="description" placeholder="Enter description " >{{$whyChooseUs->description}}</textarea>
                           @error('description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 1 Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="box_01_title" placeholder="Enter box_01_title " value="{{$whyChooseUs->box_01_title}}">
                           @error('box_01_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 1 Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="box_01_description" placeholder="Enter box_01_description " >{{$whyChooseUs->box_01_description}}</textarea>
                           @error('box_01_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 2 Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="box_02_title" placeholder="Enter box_02_title " value="{{$whyChooseUs->box_02_title}}">
                           @error('box_02_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 2 Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="box_02_description" placeholder="Enter box_02_description " >{{$whyChooseUs->box_02_description}}</textarea>
                           @error('box_02_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 3 Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="box_03_title" placeholder="Enter box_03_title " value="{{$whyChooseUs->box_03_title}}">
                           @error('box_03_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 3 Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="box_03_description" placeholder="Enter box_03_description " >{{$whyChooseUs->box_03_description}}</textarea>
                           @error('box_03_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 4 Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="box_04_title" placeholder="Enter box_04_title " value="{{$whyChooseUs->box_04_title}}">
                           @error('box_04_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 4 Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="box_04_description" placeholder="Enter box_04_description " >{{$whyChooseUs->box_04_description}}</textarea>
                           @error('box_04_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 5 Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="box_05_title" placeholder="Enter box_05_title " value="{{$whyChooseUs->box_05_title}}">
                           @error('box_05_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 5 Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control "   name="box_05_description" placeholder="Enter box_05_description " >{{$whyChooseUs->box_05_description}}</textarea>
                           @error('box_05_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Side  Image </label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="side_image"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,WEBP,SIZE:5MB )</span><br>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$whyChooseUs->side_image)}}">
                              <img src="{{asset('assets/dynamics/'.$whyChooseUs->side_image)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('side_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Year <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="year" placeholder="Enter year " value="{{$whyChooseUs->year}}">
                           @error('year')
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