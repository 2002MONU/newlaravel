@extends('admin.layout.main')
@section('title') Our Achievement Details @endsection
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
                    <th>{{ $our_Achievement->projact_worked_text }}</th>
                    <th>{{ $our_Achievement->expert_worker_text }}</th>
                    <th>{{ $our_Achievement->happy_client_text }}</th>
                    <th>{{ $our_Achievement->upcoming_project_text }}</th>
                    <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td>{{ $our_Achievement->id }}</td>
                            <td >{{ $our_Achievement->projact_worked }}</td>
                            <td>{{ $our_Achievement->expert_worker }}</td>
                            <td>{{ $our_Achievement->happy_client }}</td>
                            <td>{{ $our_Achievement->upcoming_project }}</td>
                            <td>{{ $our_Achievement->updated_at }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('ourachievements.edit', ['ourachievement' => $our_Achievement->id]) }}" class="btn btn-outline-success btn-sm">
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