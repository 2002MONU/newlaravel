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
                                    <h5 style="margin-left: 19px;">Change Password</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Change Password</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title')
                            Change Password
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @if (session('success'))
                    <span class="alert alert-success">{{ session('success') }}</span>
                @endif

                <!-- Change Password Form -->
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="current_password" class="col-form-label">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control" >
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="new_password" class="col-form-label">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="new_password_confirmation" class="col-form-label">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" >
                                    @error('new_password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Change Password</button>
                        </div>
                    </div>
                </form>
                <!-- End Change Password Form -->

            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
