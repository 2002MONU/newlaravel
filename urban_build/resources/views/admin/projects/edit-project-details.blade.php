@extends('admin.layout.main')
@section('title') Add Project Details  @endsection
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
               <form action="{{route('project-details.update',$pro->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                    <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label" for="a1">Select Project Type  <span class="text-danger">* </span></label>
                           <select name="project_name" id="" class="form-control">
                                @foreach ($projects as $project)
                                <option value="{{$project->id}}" {{$pro->project_id == $project->id ? 'selected' : ''}}>{{$project->project_type}}</option>
                                @endforeach
                            </select>
                              @error('project_name')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror  
                        </div>
                    </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Title <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="project_title" placeholder="Enter project_title " value="{{$pro->project_title}}"> 
                           @error('project_title')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Category: <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="project_category" placeholder="Enter Project Category " value="{{$pro->project_category}}"> 
                           @error('project_category')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project main  Image  <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput1" class="form-control file-input" name="project_main_image" >
                           <span> ( Note: IMG TYPE:-JPEG,PNG,JPG,WEBP,  Dimension: 1300X600 PX)</span>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$pro->project_main_image)}}">
                              <img src="{{asset('assets/dynamics/'.$pro->project_main_image)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput1" class="text-danger"></span>
                          @error('project_main_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Small  Image  <span class="text-danger">(Please Seelct 2 Image)</span></label>
                           <input type="file" id="fileInput2" class="form-control file-input" name="project_small_image[]" multiple>
                           <span> ( Note: IMG TYPE:-JPEG,PNG,JPG,WEBP,  Dimension: 500X500 PX)</span>
                           <span id="messagefileInput2" class="text-danger"></span>
                           @if ($pro->project_small_image)
                                @foreach (array_slice(json_decode($pro->project_small_image), 0, 2) as $image)
                                    <a href="{{ asset('assets/dynamics/' . $image) }}" target="_blank">
                                        <img src="{{ asset('assets/dynamics/' . $image) }}" alt="project_small_image Image" width="100">
                                    </a>
                                @endforeach
                            @endif
                           @error('project_small_image.*')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="description" placeholder="Enter heading " value=""> {{$pro->description}}</textarea>
                           @error('description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Clients Name<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="clients" placeholder="Enter clients " value="{{$pro->clients}}"> 
                           @error('clients')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">Built Up Area<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="built_up_area" placeholder="Enter built_up_area " value="{{$pro->built_up_area}}"> 
                           @error('built_up_area')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">Project Type :<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="project_type" placeholder="Enter project_type" value="{{$pro->project_type}}"> 
                           @error('project_type')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Date <span class="text-danger">*</span> </label>
                           <input type="date" class="form-control "   name="project_date" placeholder="Enter project_date " value="{{$pro->project_date}}"> 
                           @error('project_date')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Avenue End Date: <span class="text-danger">*</span> </label>
                           <input type="date" class="form-control "   name="avenue_end_date" placeholder="Enter avenue_end_date " value="{{$pro->avenue_end_date}}"> 
                           @error('avenue_end_date')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Locations<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="location" placeholder="Enter location " value="{{$pro->location}}"> 
                           @error('location')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Goal  Image  <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput3" class="form-control file-input" name="project_goal_image" >
                           <span> ( Note: IMG TYPE:-JPEG,PNG,JPG,WEBP,  Dimension: 1300X600 PX)</span>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$pro->project_goal_image)}}">
                              <img src="{{asset('assets/dynamics/'.$pro->project_goal_image)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput3" class="text-danger"></span>
                          @error('project_goal_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Goal Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="project_goal_description" placeholder="Enter project_goal_description " > {{$pro->project_goal_description}}</textarea>
                           @error('project_goal_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Challenge  Image  <span class="text-danger">*</span></label>
                           <input type="file" id="fileInput4" class="form-control file-input" name="project_challenge_image" >
                           <span> ( Note: IMG TYPE:-JPEG,PNG,JPG,WEBP,  Dimension: 1300X600 PX)</span>
                           <a target="_blank" href="{{asset('assets/dynamics/'.$pro->project_challenge_image)}}">
                              <img src="{{asset('assets/dynamics/'.$pro->project_challenge_image)}}" style="width: 120px;height:80px;"></a>
                           <span id="messagefileInput4" class="text-danger"></span>
                          @error('project_challenge_image')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Project Challenge Description <span class="text-danger">*</span> </label>
                           <textarea type="text" class="form-control ckeditor"   name="project_challenge_description" placeholder="Enter project_challenge_description " value=""> {{$pro->project_challenge_description}}</textarea>
                           @error('project_challenge_description')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Priority <span class="text-danger">*</span></label>
                           <input type="number" class="form-control"  name="priority" placeholder="Enter priority " value="{{$pro->priority}}">
                           @error('priority')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">Status <span class="text-danger">*</span></label>
                           <select name="status" id="" class="form-control">
                             <option value="1" {{$pro->status == 1 ? 'selected' : ''}}>Active</option>
                              <option value="0" {{$pro->status == 0 ? 'selected' : ''}}>Inactive</option>
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