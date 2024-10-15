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
                                    <h5 style="margin-left: 19px;">Breadcums Edit</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"  style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a href="{{ route('admin.breadcum.index') }}">Breadcums</a></li>
                                            <li class="breadcrumb-item active">breadcum Edit</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            @section('title')
                            Breadcum Edit
                            @endsection
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                    @if (session('success'))
                        <span class="alert alert-success">{{ session('success') }}</span>
                    @endif
                    <form method="POST" action="{{ route('admin.breadcum.update', $breadcum->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body  ">
                            <div class="row p-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">Page-Name <b></b> {{ $breadcum->page_name }} </label>
                                       
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">Image </label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <a href="{{ asset('admin/breadcumImage/' . $breadcum->image) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('admin/breadcumImage/' . $breadcum->image) }}" alt="" style="width:60px;height:60px;"></a>
                                        
                                        @error('image')
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
