@extends('admin.layout.app')
@section('title', 'Edit Achievement')

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
                                            {{-- <li class="breadcrumb-item"><a
                                                    href="{{ route('sitesettings.index') }}">@yield('title')</a></li>
                                         --}}   <li class="breadcrumb-item active">Edit</li> 
                                        </ol>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                {{-- @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif --}}
                @if ($message = Session::get('success'))
                    <div class="alert bg-success text-white">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="font-weight-bold h5">{{ $message }}</span>
                    </div>
                @endif
                <form method="POST" action="{{ route('achievements.update',['achievement'=>$achievement->id] ) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body  ">
                        <div class="row p-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Laundry & Dry Complete</label>
                                    <input type="text" name="dry_complete"
                                        value="{{ $achievement->dry_complete }}"class="form-control"
                                        placeholder="Enter Title">
                                    @error('dry_complete')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Garments in Circulation</label>
                                    <input type="text" name="garments_circulation"
                                        value="{{ $achievement->garments_circulation}}"class="form-control"
                                        placeholder="Enter Title">
                                    @error('garments_circulation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Satisfied Our Customer</label>
                                    <input type="text" name="satisfied_customer"
                                        value="{{$achievement->satisfied_customer}}"class="form-control"
                                        placeholder="Enter Short Description">
                                    @error('satisfied_customer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                          
                           
                         
                              
                            
                             

                        </div>
                        <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                            <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                            {{-- <button type="submit" class="btn btn-danger rounded text-capitalize">cancel</button> --}}
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
  
@endsection
