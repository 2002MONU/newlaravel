@extends('admin.layout.main')
@section('title') Edit OTC Product  @endsection
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
               <h5 class="card-title">@yield('title') </h5>
            </div>
            <div class="card-body">
               <form action="{{route('otcproducts.update',['otcproduct'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Name <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"  name="name" placeholder="Enter title " value="{{$product->name}}"> 
                           @error('name')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Product Image <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="image"   >
                           <span> ( Note:IMG TYPE:-JPEG,PNG,JPG,WEBP,SIZE:2MB)</span>
                           <a target="_blank" href="{{asset('assets/dynamics/product/'.$product->image)}}" target="_blank">
                            <img src="{{asset('assets/dynamics/product/'.$product->image)}}" style="width:80px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                           @error('image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Background Image <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput2" class="form-control file-input" name="back_image"   >
                           <span> ( Note:IMG TYPE:-JPEG,PNG,JPG,WEBP,SIZE:2MB)</span>
                           <a target="_blank" href="{{asset('assets/dynamics/product/'.$product->back_image)}}" target="_blank">
                            <img src="{{asset('assets/dynamics/product/'.$product->back_image)}}" style="width:80px;height:80px;"></a>
                           <span id="messagefileInput2" class="text-danger"></span>
                           @error('back_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Icon </label>
                           <textarea type="text" class="form-control ckeditor"  name="icon" placeholder="Enter icon " >{{$product->icon}}</textarea>
                           @error('icon')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Priority </label>
                           <input type="number" class="form-control"  name="priority" placeholder="Enter priority " value="{{$product->priority}}">
                           @error('priority')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Status <span class="text-danger">*</span></label>
                           <select name="status" id="" class="form-control">
                              <option default >Status</option>
                              <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Active</option>
                              <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Inactive</option>
                           </select>
                           @error('status')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Description </label>
                           <textarea type="text" class="form-control ckeditor"  name="description" placeholder="Enter description " >{{$product->description}}</textarea>
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