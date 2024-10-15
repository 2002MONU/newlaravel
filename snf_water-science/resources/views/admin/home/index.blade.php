@extends('admin.layout.app')

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
                                    <h5 style="margin-left: 19px;">Home</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Home</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title')
                                Home
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
                                   
                                    
                                    <th>Heading</th>
                                    <th>Title</th>
                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($home as $data)
                                    <tr>
                                        
                                      
                                        <td>{{ $data->about_title }}</td>
                                        <td>{{ $data->about_heading }}</td>
                                        <td><a  class="btn btn-success btn-sm" href="{{ route('admin.home.edit', $data->id) }}"><i class="fa fa-pencil mr-2">Edit</a></td>
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

{{-- @section('js_code')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection --}}
