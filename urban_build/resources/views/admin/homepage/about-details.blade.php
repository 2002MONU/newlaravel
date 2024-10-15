@extends('admin.layout.main')
@section('title') About Details @endsection
@section('maindashboard')

  <!-- App hero header starts -->
     <div class="app-hero-header d-flex align-items-center">
       
        <!-- Breadcrumb starts -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
            <a href="{{route('admin.dashboard')}}">Home</a>
          </li>
          <li class="breadcrumb-item text-primary" aria-current="page">
            @yield('title')
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
    
    <!-- Row starts -->
    <div class="row gx-3">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title"> @yield('title')</h5>
                
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Experience</th>
                    <th>Top Image</th>
                    <th>Middle Image </th>
                    <th>Bottom Image </th>
                     <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td>{{ $about->id }}</td>
                            <td >{{ $about->title }}</td>
                            <td >{{ $about->experience }}</td>
                            <td><a target="_blank" href="{{asset('assets/dynamics/'.$about->top_image)}}" target="_blank">
                              <img src="{{asset('assets/dynamics/'.$about->top_image)}}" style="width:80px;height:80px;"></a></td>
                            <td><a target="_blank" href="{{asset('assets/dynamics/'.$about->middle_image)}}" target="_blank">
                              <img src="{{asset('assets/dynamics/'.$about->middle_image)}}" style="width:80px;height:80px;"></a></td>
                            <td><a target="_blank" href="{{asset('assets/dynamics/'.$about->bottom_image)}}" target="_blank">
                              <img src="{{asset('assets/dynamics/'.$about->bottom_image)}}" style="width:80px;height:80px;"></a></td>
                            <td>{{ $about->updated_at->format('d M Y h:i A') }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('abouts.edit', ['about' => $about->id]) }}" class="btn btn-outline-success btn-sm">
                                        <i class="ri-edit-box-line"></i>
                                    </a>
                                    
                                </div>
                            </td>
                        </tr>
                    </tbody>
              </table>
            </div>
            <!-- Table ends -->

           
          </div>
        </div>
      </div>
    </div>
    <!-- Row ends -->

  </div>
  <!-- App body ends -->
@endsection