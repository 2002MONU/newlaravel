@extends('admin.layout.main')
@section('title') Blog Details @endsection
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
                <a href="{{route('blogs.create')}}" class="btn btn-primary ms-auto">Add Blog</a>
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Small Image</th>
                    <th>Main Image </th>
                    <th>Blog details small image </th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                  <tbody>
                     @foreach ($blog_details as $blog)
                       <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td >{{ $blog->title }}</td>
                             <td > <a href="{{ asset('assets/dynamics/' . $blog->small_image) }}" target="_blank">
                              <img src="{{ asset('assets/dynamics/' . $blog->small_image) }}" alt="Small Image" width="100">
                          </a></td>
                            <td ><a href="{{ asset('assets/dynamics/' . $blog->main_image) }}" target="_blank">
                              <img src="{{ asset('assets/dynamics/' . $blog->main_image) }}" alt="Main Image" width="150">
                          </a></td>
                             <td> @if ($blog->images_02)
                              @foreach (array_slice(json_decode($blog->images_02), 0, 2) as $image)
                                  <a href="{{ asset('assets/dynamics/' . $image) }}" target="_blank">
                                      <img src="{{ asset('assets/dynamics/' . $image) }}" alt="Blog Image" width="100">
                                  </a>
                              @endforeach
                              @endif</td>
                            <td> {{ $blog->priority }}</td>
                            <td> @if ($blog->status == 1)
                              <span class="badge bg-success">Active</span>
                              @else
                              <span class="badge bg-danger">Inactive</span>
                            @endif</td>
                            <td>{{ $blog->updated_at->format('d M Y h:i A') }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('blogs.edit', ['blog' => $blog->id]) }}" class="btn btn-outline-success btn-sm">
                                        <i class="ri-edit-box-line"></i>
                                    </a>
                                    <form id="delete-blog-{{ $blog->id }}" action="{{ route('blogs.destroy', ['blog' => $blog->id]) }}" method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                  </form>

                                  <!-- Delete Button -->
                                  <a href="{{ route('blogs.destroy', ['blog' => $blog->id]) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure? You want to Delete this row.')) { document.getElementById('delete-blog-{{ $blog->id }}').submit(); }">
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