@extends('admin.layout.main')
@section('title') Joins With Us Details @endsection
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
                <a href="{{route('join-with-us.create')}}" class="btn btn-primary ms-auto">Add Jobs</a>

              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Job Name</th>
                    <th>Location</th>
                    <th>Salary </th>
                    <th>Job logo</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                    <tbody>
                        @foreach ($joinWithUs as $jobs)
                        <tr>
                            <td>{{ $jobs->id }}</td>
                            <td>{{ $jobs->title }}</td>
                            <td>{{ $jobs->location }}</td>
                            <td>{{ $jobs->salary }}</td>
                            <td><a target="_blank" href="{{asset('assets/dynamics/'.$jobs->job_logo)}}">
                              <img src="{{asset('assets/dynamics/'.$jobs->job_logo)}}" style="width: 100px;height:80px"></a>
                            </td>
                            <td>{{ $jobs->priority }}</td>
                            <td>@if($jobs->status == 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $jobs->updated_at }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('join-with-us.edit', $jobs->id) }}" class="btn btn-outline-success btn-sm">
                                        <i class="ri-edit-box-line"></i>
                                    </a>
                                    <form id="delete-form-{{ $jobs->id }}" action="{{ route('join-with-us.destroy', $jobs->id) }}" method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                  </form>
                                  
                                  <!-- Delete Button -->
                                  <a href="#" class="btn btn-outline-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this row?')) { document.getElementById('delete-form-{{ $jobs->id }}').submit(); }">
                                      <i class="ri-delete-bin-line"></i>
                                  </a>
                                  
                                </div>
                            </td>
                        </tr>
                        @endforeach
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