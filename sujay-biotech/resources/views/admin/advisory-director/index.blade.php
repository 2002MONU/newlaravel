@extends('admin.layout.app')

@section('maincontent')
<div class="col-12">
    <div class="card-group box-margin">
        <div class="card">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
                                <h5 class="ml-3">Advisory Directors Details</h5>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Advisory Directors Details</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3 ml-3">
                                <a href="{{ route('add-advisory-directors') }}" class="btn btn-primary">Add Advisory Directors</a>
                            </div>
                        </div>
                        @section('title')
                        Advisory Directors Details
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
                      <span class="font-weight-bold h5">{{ $message }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Designation</th>  
                                <th>Image</th>  
                                 <th>Status</th>  
                                 <th>Priority</th>  
                                
                                <th class="center" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php
                                $serial = 1;
                            @endphp
                            @foreach ($advisories as $data)
                            <tr>
                                 <td>{{ $serial++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->designation }}</td>
                                <td><a target="_blank" href="{{asset('admin/directors/'.$data->image)}}"><img src="{{asset('admin/directors/'.$data->image)}}" style="width: 100px;height:70px;"></a></td>
                                <td>{{ $data->status == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>{{ $data->priority }}</td>
                               <td class="d-flex justify-content-center">
                                    <a href="{{ route('edit-advisory-directors', $data->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <form method="POST" action="{{ route('delete-advisory-directors', $data->id) }}" class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>
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
@section('js_code')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection
