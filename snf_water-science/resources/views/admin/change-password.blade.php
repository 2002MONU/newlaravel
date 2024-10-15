@extends('admin.layout.app')

@section('title', 'Change Password')

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
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">@yield('title')</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @if (session('success'))
                    <span class="alert alert-success">{{ session('success') }}</span>
                @endif
                @if (session('error'))
                    <div class="alert bg-danger text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Change Password Form -->
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="current_password" class="col-form-label">Current Password</label>
                                            <input type="password" name="current_password" id="current_password"
                                                class="form-control">
                                            @error('current_password')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="new_password" class="col-form-label">New Password</label>
                                            <input type="password" name="new_password" id="new_password"
                                                class="form-control">
                                            @error('new_password')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="confirm_password" class="col-form-label">Confirm New
                                                Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password"
                                                class="form-control">
                                            @error('confirm_password')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                                        <button type="submit" class="btn btn-primary rounded text-capitalize">Change
                                            Password</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3"></div>

                        </div>

                    </div>
                </form>
                <!-- End Change Password Form -->
            </div>
        </div>
    </div>
@endsection
