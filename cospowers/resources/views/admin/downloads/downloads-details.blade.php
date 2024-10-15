@extends('admin.layout.main')
@section('title') Downloads Details @endsection
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
                <a href="{{route('downloads.create')}}" class="btn btn-primary ms-auto">Add Downloads</a>
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Pdf</th>
                    <th>Status</th>
                    <th>Priority</th>
                     <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($downloads as $download)
                      
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $download->title }}</td>
                      <td>
                             <a href="{{ asset('assets/dynamics/' . $download->pdf) }}" target="_blank">
                                 <img src="{{ asset('https://cdn-icons-png.freepik.com/256/16425/16425681.png?semt=ais_hybrid') }}" style="width:80px; height:80px;">
                             </a>
                      </td>
                     <td> @if ($download->status == 1)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-danger">Inactive</span>
                      @endif</td>
                      <td>{{$download->priority}}</td>
                      <td>{{ $download->updated_at->format('d M Y h:i A')}}</td>
                           <td>
                               <div class="d-inline-flex gap-1">
                                   <a href="{{ route('downloads.edit', ['download' => $download->id]) }}" class="btn btn-outline-success btn-sm">
                                       <i class="ri-edit-box-line"></i>
                                   </a>
                                   <form id="delete-download-{{ $download->id }}" action="{{ route('downloads.destroy', ['download' => $download->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <!-- Delete Button -->
                                <a href="{{ route('downloads.destroy', ['download' => $download->id]) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure? You want to Delete this row.')) { document.getElementById('delete-download-{{ $download->id }}').submit(); }">
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