@extends('admin.layout.app')
@section('title', 'Career Opportunities')
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
                                    <h5 style="margin-left: 19px;">@yield('title') Edit</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('careers.index') }}">@yield('title')</a></li>
                                            <li class="breadcrumb-item active">@yield('title') Edit</li>
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

                <form method="POST" action="{{ route('careers.update', $career->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="job_name" class="col-form-label">Job Title</label>
                                    <input type="text" name="job_name" value="{{ $career->job_name }}" class="form-control" placeholder="Enter Job Title" id="job_name">
                                    @error('job_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="job_description" class="col-form-label">Job Description</label>
                                    <textarea name="job_description" class="form-control" placeholder="Enter Job Description">{{ $career->job_description }}</textarea>
                                    @error('job_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            
                        <div class="col-6">
                            <div class="form-group">
                                <label for="job_date" class="col-form-label">Job Publish Date</label>
                                <input type="date" name="job_date"  value="{{ $career->job_date }}" class="form-control" placeholder="Enter Job Publish Date" id="job_date">
                                @error('job_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="job_image" class="col-form-label">Job Image</label>
                                <input type="file" name="job_image" class="form-control" id="job_image">
                                <a href="{{ asset('admin/careerImage/' . $career->job_image) }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('admin/careerImage/' . $career->job_image) }}" alt="" style="width:60px;height:60px;"></a>
                                @error('job_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="job_salary" class="col-form-label">Salary</label>
                                <input type="text" name="job_salary" value="{{ $career->job_salary }}" class="form-control" placeholder="Enter Salary" id="job_salary">
                                @error('job_salary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="job_exprience" class="col-form-label">Experience</label>
                                <input type="text" name="job_exprience" value="{{ $career->job_exprience }}" class="form-control" placeholder="Enter Experience" id="job_exprience">
                                @error('job_exprience')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" @if($career->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($career->status == 0) selected @endif>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="priority" class="col-form-label">Priority</label>
                                    <input type="text" name="priority" value="{{ $career->priority }}" class="form-control" placeholder="Enter Priority" id="priority">
                                    @error('priority')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
