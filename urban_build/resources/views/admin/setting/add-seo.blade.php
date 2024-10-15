@extends('admin.layout.main')
@section('title') ADD SEO  @endsection
@section('maindashboard')
 <!-- App container starts -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet">
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
        @if ($errors->any())
        <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
      <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
            <form action="{{route('seosettings.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="a1">Page Url <span class="text-danger">*</span>( Page name same as url name EX-: services/concept-development)</label>
                        <input type="text" class="form-control" name="page_name" placeholder="Enter Name" value="">
                        @error('page_name')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror  
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="a1">Page Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="">
                        @error('title')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror  
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a2">Description <span class="text-danger">*</span></label>
                    <textarea type="text" class="form-control " name="description" placeholder="Enter Description"></textarea>
                    @error('image')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror 
                </div>
              </div>
              <div class="col-xxl-6 col-lg-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="a2">Keywords <span class="text-danger">*</span></label>
                  <input type="text" class="form-control text-dark" data-role="tagsinput" name="keywords" placeholder="Enter keywords">
                  <span>After typing one keyword please press Enter</span> Key</span>
                  @error('keywords')
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

    <!-- Include necessary CSS and JS files for bootstrap-tagsinput -->
   
    <!-- Initialize the tagsinput -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script>
      $(document).ready(function() {
          $('input[data-role="tagsinput"]').tagsinput();
      });
  </script>
  <style>
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: white;
        background-color: #007bff;
        padding: 0.2em 0.6em 0.3em;
        font-size: 0.9em;
        border-radius: 0.25rem;
    }
    .bootstrap-tagsinput {
        width: 100%;
    }
    a {
        list-style-type: none;
    }
</style>
@endsection
