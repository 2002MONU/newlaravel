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
                                <h5 style="margin-left: 19px;">About Us</h5>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">About Us</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @section('title')
                        About Us
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-primary">
                    <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span>
                    <span class="font-weight-bold h5">{{ $message }}</span>
                </div>
                @endif

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                              
                                <th>Image Two</th>
                               
                                <th>Meta Title</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aboutus as $data)
                            <tr>
                                <td>{{ $data->title }}</td>
                                <td><img src="{{ asset('admin/aboutImage/' . $data->image) }}" alt="" style="width:100px;height:100px"></td>
                            
                                <td><img src="{{ asset('admin/aboutImage/' . $data->image_2) }}" alt="" style="width:100px;height:100px"></td>
                              
                                <td>{{ $data->meta_title }}</td>
                               <td>{{ $data->updated_at->format('d-F-Y h:i A') }}</td>
                                <td><a href="{{ route('admin.aboutus.edit', $data->id) }}" class="btn btn-success btn-sm">Edit</a></td>
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



