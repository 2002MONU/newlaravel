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
                                    <h5 style="margin-left: 19px;">Team About-us</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a
                                                    href="{{ route('admin.teamabout.index') }}">Team About-us</a></li>
                                            <li class="breadcrumb-item active">Team About-us Edit</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @section('title')
                        Team About-us Edit
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif
            <form method="POST" action="{{ route('admin.teamabout.update', $teamabout->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row p-4">
                       
                        <div class="col-6">
                            <div class="form-group">
                                <label for="heading" class="col-form-label">About Heading</label>
                                <input type="text" name="heading" value="{{ $teamabout->heading }}"
                                    class="form-control" placeholder="Enter About Heading">
                                @error('heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-6">
                            <div class="form-group">
                                <label for="year_of_exprience_title" class="col-form-label"> Year Of Exprience Title</label>
                                <input type="text" name="year_of_exprience_title" value="{{ $teamabout->year_of_exprience_title }}"
                                    class="form-control" placeholder="Enter Year Of Exprience">
                                @error('year_of_exprience_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="year" class="col-form-label">Year</label>
                                <input type="text" name="year" value="{{ $teamabout->year }}"
                                    class="form-control" placeholder="Enter Year">
                                @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="description" class="col-form-label">About Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter About Description">{{ $teamabout->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                                @if ($teamabout->image)
                                <a href="{{ asset('admin/teamaboutImage/' . $teamabout->image) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('admin/teamaboutImage/' . $teamabout->image) }}" alt=""
                                        style="width:60px;height:60px;"></a>
                                @endif
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="image_2" class="col-form-label">Image 2</label>
                                <input type="file" name="image_2" class="form-control">
                                @if ($teamabout->image_2)
                                <a href="{{ asset('admin/teamaboutImage/' . $teamabout->image_2) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('admin/teamaboutImage/' . $teamabout->image_2) }}" alt=""
                                        style="width:60px;height:60px;"></a>
                                @endif
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                       
                        <!-- Continue with the rest of your fields... -->
                    </div>
                    <div class="d-flex align-items-right gap-5 flex-wrap ml-4 mb-5">
                        <button type="submit" class="btn btn-primary rounded text-capitalize">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
