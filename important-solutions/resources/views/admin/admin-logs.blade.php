@extends('admin.layout.main')
@section('title') Admin Login Details @endsection
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
    {{-- @if(session('error'))
    <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif --}}
    <!-- Row starts -->
    <div class="row gx-3">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title"> @yield('title')</h5>
                {{-- <a href="{{route('homepages.create')}}" class="btn btn-primary ms-auto">Add Slider</a> --}}
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>IP Address</th>
                    <th>Created At</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                  <tbody>
                      @foreach($admin_logs as $admin)
                     <tr>
                            <td>{{ $loop->iteration }}</td>
                             <td>{{ $admin->admin_email }}
                            <td>{{ $admin->ip_address }}   </td>
                            <td>{{$admin->created_at}}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.logs-delete', $admin->id) }}" class="btn btn-outline-danger btn-sm" onclick="return confirmDeletion(event)">
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
            <script>
            function confirmDeletion(event) {
                if (!confirm('Are you sure? You want to Delete this row.')) {
                    event.preventDefault(); // Prevent the default action (navigation) if the user clicks "Cancel"
                }
            }
            </script>
  </div>
  <!-- App body ends -->
@endsection