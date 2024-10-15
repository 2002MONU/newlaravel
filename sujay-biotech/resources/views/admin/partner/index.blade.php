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
                                    <h5 style="margin-left: 19px;">Partner</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Galleries</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 ml-5 d-flex justify-content-left">
                                    <a href="{{ route('admin.partner.add') }}" class="btn btn-primary">Add Partner</a>
                                </div>
                            </div>
                            @section('title')
                            Partner
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert bg-primary">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                          <span class="font-weight-bold h5">{{ $message }}</span>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped iq-table1" data-toggle="data-table">
                            <thead>
                                <tr>  
                                     <th>Sl No</th>
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
                                @foreach ($partner as $data)
                                    <tr>
                                           <td>{{ $serial++ }}</td>
                                        <td><img src="{{ asset('admin/partnerImage/' . $data->image) }}" alt="" style="width:100px;height:100px"></td>
                                        <td>{{ $data->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $data->priority }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('admin.partner.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                            <form method="POST" action="{{ route('admin.partner.delete', $data->id) }}" class="delete-form ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger delete-btn">Delete</button>
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
        document.addEventListener('DOMContentLoaded', function () {
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
