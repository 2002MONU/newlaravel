@extends('admin.layout.main')
@section('title') Add Services Details  @endsection
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
               <form action="{{route('service-details.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Service Name <span class="text-danger">*</span> </label>
                           <select name="service_name"  class="form-control">
                            @foreach ($services as $service)
                            <option value="{{$service->id}}">{{$service->service_name}}</option>
                            @endforeach
                           </select>
                           @error('service_name')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="service_title" placeholder="Enter service_title " value="{{old('service_title')}}">
                           @error('service_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor" rows="4"  name="description" placeholder="Enter description " ></textarea>
                           @error('description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Service  Image </label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="service_image"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,WEBP,SIZE:5MB )</span><br>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('service_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Services Benefits Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor" rows="4"  name="benefit_description" placeholder="Enter benefit_description" ></textarea>
                           @error('benefit_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Services Benefits  Image </label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="benefit_image"  >
                           <span> ( Note:IMG TYPE:- JPEG,PNG,JPG,WEBP,SIZE:5MB )</span><br>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('benefit_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Title 2<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="title_2" placeholder="Enter title_2 " value="{{old('title_2')}}">
                           @error('title_2')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Description 2<span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control " rows="4"  name="title_2_description" placeholder="Enter title_2_description " >{{old('title_2_description')}}</textarea>
                           @error('title_2_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 1 Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="box_01_title" placeholder="Enter box_01_title " value="{{old('box_01_title')}}">
                           @error('box_01_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 1 Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control" rows="3"  name="box_01_description" placeholder="Enter box_01_description" >{{old('box_01_description')}}</textarea>
                           @error('box_01_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 2 Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="box_02_title" placeholder="Enter box_02_title " value="{{old('box_02_title')}}">
                           @error('box_02_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 2 Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control" rows="3"  name="box_02_description" placeholder="Enter box_02_description " >{{old('box_02_description')}}</textarea>
                           @error('box_02_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 3 Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="box_03_title" placeholder="Enter box_03_title " value="{{old('box_03_title')}}">
                           @error('box_03_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Box 3 Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control" rows="3"  name="box_03_description" placeholder="Enter box_03_description" >{{old('box_03_description')}}</textarea>
                           @error('box_03_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Last Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control" rows="4"  name="last_description" placeholder="Enter last_description" >{{old('last_description')}}</textarea>
                           @error('last_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Priority <span class="text-danger">*</span></label>
                           <input type="number" class="form-control"  name="priority" placeholder="Enter priority " value="{{old('priority')}}">
                           @error('priority')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Status <span class="text-danger">*</span></label>
                           <select name="status" id="" class="form-control">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                           </select>
                           @error('status')
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