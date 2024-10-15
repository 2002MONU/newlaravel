@extends('admin.layout.main')
@section('title') Edit Our Achievement  @endsection
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
               <form action="{{route('ourachievements.update',['ourachievement'=>$our_Achievement->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Row starts -->
                  <div class="row gx-3">
                         <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->projact_worked_text}} Text<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="projact_worked_text" placeholder="Enter projact_worked_text " value="{{$our_Achievement->projact_worked_text}}">
                           @error('projact_worked_text')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->projact_worked_text}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="projact_worked" placeholder="Enter projact_worked " value="{{$our_Achievement->projact_worked}}">
                           @error('projact_worked')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                       <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->expert_worker_text}} Text <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="expert_worker_text" placeholder="Enter expert_worker_text " value="{{$our_Achievement->expert_worker_text}}">
                           @error('expert_worker_text')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->expert_worker_text}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control"   name="expert_worker" placeholder="Enter expert_worker " value="{{$our_Achievement->expert_worker}}">
                           @error('expert_worker')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->happy_client_text}} Text<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="happy_client_text" placeholder="Enter happy_client_text " value="{{$our_Achievement->happy_client_text}}">
                           @error('happy_client_text')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->happy_client_text}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="happy_client" placeholder="Enter happy_client " value="{{$our_Achievement->happy_client}}">
                           @error('happy_client')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                       <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->upcoming_project_text}} Text<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="upcoming_project_text" placeholder="Enter upcoming_project_text " value="{{$our_Achievement->upcoming_project_text}}">
                           @error('upcoming_project_text')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->upcoming_project_text}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="upcoming_project" placeholder="Enter upcoming_project " value="{{$our_Achievement->upcoming_project}}">
                           @error('upcoming_project')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                      <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->text_05_text}} Text<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="text_05_text" placeholder="Enter text_05_text " value="{{$our_Achievement->text_05_text}}">
                           @error('text_05_text')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->text_05_text}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="text_05_text_report" placeholder="Enter text_05_text_report " value="{{$our_Achievement->text_05_text_report}}">
                           @error('text_05_text_report')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->text_06_text}} Text<span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="text_06_text" placeholder="Enter text_05_text " value="{{$our_Achievement->text_06_text}}">
                           @error('text_06_text')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                     </div>
                     <div class="col-xxl-6 col-lg-6 col-sm-12">
                        <div class="mb-3">
                           <label class="form-label" for="a2">{{$our_Achievement->text_06_text}} <span class="text-danger">*</span> </label>
                           <input type="text" class="form-control "   name="text_06_text_report" placeholder="Enter text_06_text_report " value="{{$our_Achievement->text_06_text_report}}">
                           @error('text_06_text_report')
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