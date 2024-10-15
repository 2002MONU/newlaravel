@extends('admin.layout.main')
@section('title') Contact Form Details  @endsection
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
    @if(session('error'))
    <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <!-- Row starts -->
    <div class="row gx-3">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title"> @yield('title')</h5>
                {{-- <a href="{{route('seosettings.create')}}" class="btn btn-primary ms-auto">Add seo </a> --}}
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Full Name </th>
                    <th>Mobile No </th>
                    <th>Email </th>
                    <th>Message</th>
                    <th>Created AT</th>
                   <th>Actions</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($contact_form  as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->full_name }} </td>
                        <td>{{ $message->mobile_no }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at }}</td>
                       <td>
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('admin.contact-delete', $message->id) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure? You want to delete this row?')) { window.location.href = this.href; }">
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