@extends('Admin.layout.main') 
@section('title') Admin  @endsection
@section('maindashboard')
 <!-- App container starts -->


    <!-- App hero header starts -->
    <div class="app-hero-header d-flex align-items-center">
     
      <!-- Breadcrumb starts -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
          <a href="">Home</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
          Dashboard
        </li>
      </ol>
      <!-- Breadcrumb ends -->
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
    @if(session('error'))
    <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
      <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-xl-3 col-sm-6 col-12">
        {{-- <a href="{{route('homepages.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-success rounded-circle me-3">
                  <div class="icon-box md bg-success-subtle rounded-5">
                    <i class="ri-home-4-fill fs-4 text-success"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$banner}}</h2>
                  <p class="m-0">Slider</p>
                </div>
              </div>
             </div>
          </div>
        </a> --}}
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
         {{-- <a href="{{route('portfolios.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-primary rounded-circle me-3">
                  <div class="icon-box md bg-primary-subtle rounded-5">
                    {{-- <i class="ri-lungs-line fs-4 text-primary"></i> --}}
                    {{-- <i class="ri-building-line fs-4 text-primary"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$our_portfolio}}</h2>
                  <p class="m-0">Our Portfolio</p>
                </div>
              </div>
              
            </div>
          </div>
         </a> --}} 
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            {{-- <a href="{{route('testimonials.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-danger rounded-circle me-3">
                  <div class="icon-box md bg-danger-subtle rounded-5">
                    <i class="ri-user-heart-fill  fs-4 text-success"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$testi}}</h2>
                  <p class="m-0">Testimonial</p>
                </div>
              </div>
              
            </div>
          </div>
            </a> --}}
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
        {{-- <a href="{{route('ourmedias.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-warning rounded-circle me-3">
                  <div class="icon-box md bg-warning-subtle rounded-5">
                    {{-- <i class="ri-money-dollar-circle-line fs-4 text-warning"></i> --}}
                    {{-- <i class="ri-speaker-2-fill fs-4 text-warning"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$media}}</h2>
                  <p class="m-0">Photos</p>
                </div>
              </div>
              
            </div>
          </div>
        </a> --}} 
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
        {{-- <a href="{{route('videos.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-warning rounded-circle me-3">
                  <div class="icon-box md bg-warning-subtle rounded-5">
                    
                    <i class="ri-speaker-2-fill fs-4 text-warning"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$video}}</h2>
                  <p class="m-0">Videos</p>
                </div>
              </div>
              
            </div>
          </div>
        </a> --}}
        </div>
    <div class="col-xl-3 col-sm-6 col-12">
        {{-- <a href="{{route('ourteams.index')}}">
      <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="p-2 border border-danger rounded-circle me-3">
              <div class="icon-box md bg-warning-subtle rounded-5">
                <i class="ri-product-hunt-fill fs-4 text-danger"></i>
              </div>
            </div>
            <div class="d-flex flex-column">
              <h2 class="lh-1">{{$our_team}}</h2>
              <p class="m-0">Our Team</p>
            </div>
          </div>
          
        </div>
      </div>
        </a> --}}
    </div>
    
      </div>
      <!-- Row ends -->
   </div>
    <!-- App body ends -->
    @endsection