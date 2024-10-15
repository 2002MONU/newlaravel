@extends('admin.layout.app')
@section('title')
@php
$page_title = 'Site Setting'    
@endphp
{{ $page_title }}
@endsection
@section('maincontent')
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- start page title -->
              <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 style="margin-left: 19px;">Site Settings</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"  style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Site Settings</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @section('title')
                        Site Settings
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert bg-success text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                         <span class="font-weight-bold h5">{{ $message }}</span>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Site Title</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                   
                                    <th>Facebook</th>
                                    <th>Logo</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sitesettings as $data)
                                    <tr>
                                        <td>{{ $data->site_title }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        
                                        <td>{{ $data->facebook }}</td>
                                        <td><a href="{{ asset('admin/siteImage/logo/' . $data->logo) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('admin/siteImage/logo/' . $data->logo) }}" alt=""
                                                style="width:50px;height:50px"></a></td>
                                        <td><a class="btn btn-success btn-sm" href="{{ route('sitesettings.edit',$data->id) }}"><i class="fa fa-pencil  mr-1"></i>Edit</a></td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_code')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection
