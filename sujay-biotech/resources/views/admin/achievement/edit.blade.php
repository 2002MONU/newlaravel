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
                                    <h5 style="margin-left: 19px;">Achievement</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a
                                                    href="{{ route('admin.achievement.index') }}">Achievement</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @section('title')
                            Achievement
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif
            <form method="POST" action="{{ route('admin.achievement.update', $achievement->id) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="card-body  ">
                    <div class="row p-4">
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dealers">Dealers</label>
                                <input type="text" class="form-control" name="dealers"
                                    id="
                                    dealers"
                                    value="{{ $achievement->dealers }}">
                                @error('dealers')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="services">Services</label>
                                <input type="text" class="form-control" name="services"
                                    id="
                                            services"
                                    value="{{ $achievement->services }}">
                                @error('services')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="happy_farmers">Happy Farmers</label>
                                <input type="text" class="form-control" name="happy_farmers"
                                    id="happy_farmers"
                                    value="{{ $achievement->happy_farmers }}">
                                @error('happy_farmers')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="products">Products</label>
                                <input type="text" class="form-control" name="products"
                                    id="
                                                            products"
                                    value="{{ $achievement->products }}">
                                @error('products')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" class="form-control" name="unit" id="unit" value="{{ $achievement->unit  }}">
                                @error('unit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="work">Work</label>
                                <input type="text" class="form-control" name="work" id="work" value="{{ $achievement->work  }}">
                                @error('work')
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
