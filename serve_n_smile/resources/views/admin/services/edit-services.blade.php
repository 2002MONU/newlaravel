@extends('admin.layout.main')
@section('title') Edit Service  @endsection
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
               <form action="{{route('services.update',['service'=>$service->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="title" placeholder="Enter title " value="{{old('title',$service->title)}}"> 
                           @error('title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Price <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="price" placeholder="Enter price " value="{{old('price',$service->price)}}"> 
                           @error('price')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Service small image <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="service_image_small"  >
                           <span> ( Note:IMG TYPE:-JPEG,PNG,JPG,WEBP,SIZE:2MB  ,Dimension:-520X520 PX)</span>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$service->service_image_small)}}" target="_blank">
                            <img src="{{asset('assets/dynamics/'.$service->service_image_small)}}" style="width:80px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('service_image_small')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Service big image  <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput2" class="form-control file-input" name="service_image_big"  >
                           <span> ( Note:IMG TYPE:-JPEG,PNG,JPG,WEBP,SIZE:2MB  ,Dimension:-750X450 PX)</span>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$service->service_image_big)}}" target="_blank">
                            <img src="{{asset('assets/dynamics/'.$service->service_image_big)}}" style="width:80px;height:80px;"></a>
                           <span id="messagefileInput2" class="text-danger"></span>
                           @error('service_image_big')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Cleaning Hours <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="cleaning_hour" placeholder="Enter cleaning_hour " value="{{old('cleaning_hour',$service->cleaning_hour)}}"> 
                           @error('cleaning_hour')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Number of Cleaners <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="no_of_cleaner" placeholder="Enter no_of_cleaner " value="{{old('no_of_cleaner',$service->no_of_cleaner)}}"> 
                           @error('no_of_cleaner')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Visiting Hours <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="visiting_hours" placeholder="Enter visiting_hours " value="{{old('visiting_hours',$service->visiting_hours)}}"> 
                           @error('visiting_hours')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Contact<span class="text-danger">*</span> </label>
                           <input type="number" class="form-control "   name="contact" placeholder="Enter contact " value="{{old('contact',$service->contact)}}"> 
                           @error('contact')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">E-mail<span class="text-danger">*</span> </label>
                           <input type="email" class="form-control "   name="email" placeholder="Enter email " value="{{old('email',$service->email)}}"> 
                           @error('email')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Priority <span class="text-danger">*</span></label>
                           <input type="number" class="form-control"  name="priority" placeholder="Enter priority " value="{{old('priority',$service->priority)}}">
                           @error('priority')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Status <span class="text-danger">*</span></label>
                           <select name="status" id="" class="form-control">
                              <option value="" >Status</option>
                              <option value="1" {{$service->status == 1 ? 'selected' : ''}}>Active</option>
                              <option value="0" {{$service->status == 0 ? 'selected' : ''}}>Inactive</option>
                           </select>
                           @error('status')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-12 col-lg-12 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="description" placeholder="Enter heading " value=""> {{old('description',$service->description)}}</textarea>
                           @error('description')
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