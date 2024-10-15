@extends('admin.layout.app')

@section('title', 'About-Us')

@section('maincontent')
    <div class="col-12">
        <div class="card-group box-margin">
            <div class="card">
                <!-- Start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                    <h5 class="ml-3">About-Us</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">About-Us</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End page title -->

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
                                    <th>Title</th>
                                    <th>Short-Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($about as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->short_description }}</td>
                                        <td>
                                            <a href="{{ asset('admin/aboutImage/' . $data->image) }}" target="_blank" rel="noopener noreferrer">
                                                <img src="{{ asset('admin/aboutImage/' . $data->image) }}" alt="Image" style="width:50px;height:50px">
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-success btn-sm d-flex" href="{{ route('abouts.edit', $data->id) }}">
                                                <i class="fa fa-pencil mr-1 mt-1"></i> Edit
                                            </a>
                                        </td>
                                        
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
