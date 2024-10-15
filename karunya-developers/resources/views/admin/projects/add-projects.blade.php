@extends('admin.layout.main')
@section('title') Add Service  @endsection
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
               <form action="{{route('project-details.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Row starts -->
                  <div class="row gx-3">
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label" for="a1">SElect Project Type  <span class="text-danger">* </span></label>
                            {{-- <input type="text" class="form-control" name="design_name" placeholder="Enter Design Name" value="{{old('design_name')}}"> 
                            --}}
                           
                           <select name="project_name" id="" class="form-control">
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_type}}</option>
                                @endforeach
                            </select>
                              @error('project_name')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror  
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label" for="a1">Design Name  <span class="text-danger">* </span></label>
                            <input type="text" class="form-control" name="design_name" placeholder="Enter Design Name" value="{{old('design_name')}}">
                            @error('design_name')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror  
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                      <div class="mb-3">
                          <label class="form-label" for="a1">Layout<span class="text-danger">* </span></label>
                          <input type="text" class="form-control" name="layout" placeholder="Enter layout" value="{{old('layout')}}">
                          @error('layout')
                          <div class="error text-danger">{{ $message }}</div>
                          @enderror  
                      </div>
                    </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="title" placeholder="Enter title " value="{{old('title')}}"> 
                           @error('title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Category: <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="project_category" placeholder="Enter Project Category " value="{{old('project_category')}}"> 
                           @error('project_category')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Image  <span class="text-danger">(You can select multiple image)</span></label>
                           <input type="file" id="fileInput2" class="form-control file-input" name="image[]" multiple>
                           <span> ( Note: IMG TYPE:-JPEG,PNG,JPG,WEBP,  Dimension: 1000X1000 PX)</span>
                           <span id="messagefileInput2" class="text-danger"></span>
                           
                           @error('image.*')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Clients Name<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="clients" placeholder="Enter clients " value="{{old('clients')}}"> 
                           @error('clients')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Date <span class="text-danger">*</span> </label>
                           <input type="date" class="form-control "   name="project_date" placeholder="Enter project_date " value="{{old('project_date')}}"> 
                           @error('project_date')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Avenue End Date: <span class="text-danger">*</span> </label>
                           <input type="date" class="form-control "   name="avenue_end_date" placeholder="Enter avenue_end_date " value="{{old('avenue_end_date')}}"> 
                           @error('avenue_end_date')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Locations<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="location" placeholder="Enter location " value="{{old('location')}}"> 
                           @error('location')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Price After<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="price_after" placeholder="Enter price_after " value="{{old('price_after')}}"> 
                           @error('price_after')
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
                              <option value="" >Status</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                           </select>
                           @error('status')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-12 col-lg-12 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="description" placeholder="Enter heading " value=""> {{old('description')}}</textarea>
                           @error('description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-12 col-lg-12 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Services Benefits: <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="service_benefits" placeholder="Enter service_benefits " value=""> {{old('service_benefits')}}</textarea>
                           @error('service_benefits')
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