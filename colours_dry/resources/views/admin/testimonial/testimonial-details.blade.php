@extends('admin.layout.app')
@section('title', 'Testimonials')

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
                                    <h5 style="margin-left: 19px;">@yield('title')</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">@yield('title')</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                    <a href="{{ route('testimonials.create') }}" class="btn btn-primary"><i class="fa fa-plus mr-1"></i>Add Testimonials</a>
                                    
                                </div>
                            </div>
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
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($testimonials as $data)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->designation }}</td>
                                        <td><a target="_blank" href="{{asset('admin/serviceImage/'.$data->image)}}">
                                            <img src="{{asset('admin/serviceImage/'.$data->image)}}" style="width: 100px;height:70px;"></a></td>
                                        <td>{{ $data->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $data->priority }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('testimonials.edit', $data->id) }}" class="btn btn-sm btn-success mb-2"><i class="fa fa-pencil  mr-1"></i>Edit</a>
                                            <form method="POST" action="{{ route('testimonials.destroy', $data->id) }}" class="delete-form ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger delete-btn mb-2"><i class="fa fa-times-rectangle  mr-1"></i>Delete</button>
                                                
                                            </form>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this item!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            event.target.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection

