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
                                    <h5 style="margin-left: 19px;">Home</h5>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" style="margin-left: -19px;">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><a
                                                    href="{{ route('admin.home.index') }}">Home</a></li>
                                            <li class="breadcrumb-item active">Home Edit</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @section('title')
                            Home Edit
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif
            <form method="POST" action="{{ route('admin.home.update', $home->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="about_title" class="col-form-label">About Title</label>
                                <input type="text" name="about_title" value="{{ $home->about_title }}"
                                    class="form-control" placeholder="Enter About Title">
                                @error('about_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="about_heading" class="col-form-label">About Heading</label>
                                <input type="text" name="about_heading" value="{{ $home->about_heading }}"
                                    class="form-control" placeholder="Enter About Heading">
                                @error('about_heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="about_description" class="col-form-label">About Description</label>
                                <textarea name="about_description" class="form-control" placeholder="Enter About Description">{{ $home->about_description }}</textarea>
                                @error('about_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="about_image" class="col-form-label">About Image</label>
                                <input type="file" name="about_image" class="form-control">
                                @if ($home->about_image)
                                    <a href="{{ asset('admin/homeImage/' . $home->about_image) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('admin/homeImage/' . $home->about_image) }}" alt=""
                                        style="width:60px;height:60px;"></a>
                                @endif
                                @error('about_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Continue adding form fields for each column in your schema -->
                          <div class="col-6">
                            <div class="form-group">
                                <label for="consulting_success_title" class="col-form-label">Consulting Success Title</label>
                                <input type="text" name="consulting_success_title" value="{{ $home->consulting_success_title }}"
                                    class="form-control" placeholder="Enter Consulting Success Title">
                                @error('consulting_success_title') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="consulting_success" class="col-form-label">Consulting Success</label>
                                <input type="text" name="consulting_success" value="{{ $home->consulting_success }}"
                                    class="form-control" placeholder="Enter Consulting Success">
                                @error('consulting_success')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-6">
                            <div class="form-group">
                                <label for="consulting_success_operator" class="col-form-label">Consulting Success Operator</label>
                                <input type="text" name="consulting_success_operator" value="{{ $home->consulting_success_operator }}"
                                    class="form-control" placeholder="Enter Consulting Success Operator">
                                @error('consulting_success_operator')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                              <div class="col-6">
                            <div class="form-group">
                                <label for="consulting_success_icon" class="col-form-label">Consulting Success Icon</label>
                                <input type="text" name="consulting_success_icon" value="{{ $home->consulting_success_icon }}"
                                    class="form-control" placeholder="flaticon-license">
                                @error('consulting_success_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-6">
                            <div class="form-group">
                                <label for="worldwide_clients_title" class="col-form-label">Worldwide Clients Title</label>
                                <input type="text" name="worldwide_clients_title" value="{{ $home->worldwide_clients_title }}"
                                    class="form-control" placeholder="Enter Worldwide Clients title">
                                @error('worldwide_clients_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="worldwide_clients" class="col-form-label">Worldwide Clients</label>
                                <input type="text" name="worldwide_clients" value="{{ $home->worldwide_clients }}"
                                    class="form-control" placeholder="Enter Worldwide Clients">
                                @error('worldwide_clients')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                              <div class="col-6">
                            <div class="form-group">
                                <label for="worldwide_clients_icon" class="col-form-label">Worldwide Clients Icon</label>
                                <input type="text" name="worldwide_clients_icon" value="{{ $home->worldwide_clients_icon }}"
                                    class="form-control" placeholder="flaticon-license">
                                @error('worldwide_clients_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                           <div class="col-6">
                            <div class="form-group">
                                <label for="worldwide_clients_operator" class="col-form-label">Worldwide Clients Operaror</label>
                                <input type="text" name="worldwide_clients_operator" value="{{ $home->worldwide_clients_operator }}"
                                    class="form-control" placeholder="Enter Worldwide Clients operator">
                                @error('worldwide_clients_operator')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="map_image" class="col-form-label">Map Image</label>
                                <input type="file" name="map_image" class="form-control">
                                @if ($home->map_image)
                                    <img src="{{ asset('admin/homeImage/' . $home->map_image) }}" alt=""
                                        style="width:60px;height:60px;">
                                @endif
                                @error('map_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add the rest of the fields similarly -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_heading" class="col-form-label">Solution Heading</label>
                                <input type="text" name="solution_heading" value="{{ $home->solution_heading }}"
                                    class="form-control" placeholder="Enter Solution Heading">
                                @error('solution_heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_heading_2" class="col-form-label">Solution Heading 2</label>
                                <input type="text" name="solution_heading_2"
                                    value="{{ $home->solution_heading_2 }}" class="form-control"
                                    placeholder="Enter Solution Heading">
                                @error('solution_heading_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Continue with the rest of your fields... -->
                        <!-- Solution Section -->

                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_title" class="col-form-label">Solution Title</label>
                                <input type="text" name="solution_title" value="{{ $home->solution_title }}"
                                    class="form-control" placeholder="Enter Solution Title">
                                @error('solution_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_number" class="col-form-label">Solution Number</label>
                                <input type="text" name="solution_number" value="{{ $home->solution_number }}"
                                    class="form-control" placeholder="Enter Solution Number">
                                @error('solution_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_description" class="col-form-label">Solution Description</label>
                                <textarea name="solution_description" class="form-control" placeholder="Enter Solution Description">{{ $home->solution_description }}</textarea>
                                @error('solution_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_image" class="col-form-label">Solution Image</label>
                                <input type="file" name="solution_image" class="form-control">
                                @if ($home->solution_image)
                                    <img src="{{ asset('admin/homeImage/' . $home->solution_image) }}" alt=""
                                        style="width:60px;height:60px;">
                                @endif
                                @error('solution_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_title_2" class="col-form-label">Solution Title 2</label>
                                <input type="text" name="solution_title_2" value="{{ $home->solution_title_2 }}"
                                    class="form-control" placeholder="Enter Solution Title 2">
                                @error('solution_title_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_number_2" class="col-form-label">Solution Number 2</label>
                                <input type="text" name="solution_number_2"
                                    value="{{ $home->solution_number_2 }}" class="form-control"
                                    placeholder="Enter Solution Number 2">
                                @error('solution_number_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_description_2" class="col-form-label">Solution Description
                                    2</label>
                                <textarea name="solution_description_2" class="form-control" placeholder="Enter Solution Description 2">{{ $home->solution_description_2 }}</textarea>
                                @error('solution_description_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_image" class="col-form-label">Solution Image 2</label>
                                <input type="file" name="solution_image_2" class="form-control">
                                @if ($home->solution_image_2)
                                    <img src="{{ asset('admin/homeImage/' . $home->solution_image_2) }}"
                                        alt="" style="width:60px;height:60px;">
                                @endif
                                @error('solution_image_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_title_3" class="col-form-label">Solution Title 3</label>
                                <input type="text" name="solution_title_3" value="{{ $home->solution_title_3 }}"
                                    class="form-control" placeholder="Enter Solution Title 3">
                                @error('solution_title_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_number_3" class="col-form-label">Solution Number 3</label>
                                <input type="text" name="solution_number_3"
                                    value="{{ $home->solution_number_3 }}" class="form-control"
                                    placeholder="Enter Solution Number 3">
                                @error('solution_number_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_description_3" class="col-form-label">Solution Description
                                    3</label>
                                <textarea name="solution_description_3" class="form-control" placeholder="Enter Solution Description 3">{{ $home->solution_description_3 }}</textarea>
                                @error('solution_description_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="solution_image_3" class="col-form-label">Solution Image 3</label>
                                <input type="file" name="solution_image_3" class="form-control">
                                @if ($home->solution_image_3)
                                    <img src="{{ asset('admin/homeImage/' . $home->solution_image_3) }}"
                                        alt="" style="width:60px;height:60px;">
                                @endif
                                @error('solution_image_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Add the rest of the fields similarly -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_heading" class="col-form-label">Product Heading </label>
                                <input type="text" name="product_heading" value="{{ $home->product_heading }}"
                                    class="form-control" placeholder="Enter Product Heading">
                                @error('product_heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_heading_2" class="col-form-label">Product Heading 2</label>
                                <input type="text" name="product_heading_2"
                                    value="{{ $home->product_heading_2 }}" class="form-control"
                                    placeholder="Enter Product Heading">
                                @error('product_heading_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Continue with the rest of your fields... -->
                         <div class="col-6">
                            <div class="form-group">
                                <label for="brand_heading" class="col-form-label"> Brands Heading</label>
                                <input type="text" name="brand_heading" value="{{ $home->brand_heading }}"
                                    class="form-control" placeholder="Enter Number Of Brands">
                                @error('brand_heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="number_of_brands" class="col-form-label">Number Of Brands</label>
                                <input type="text" name="number_of_brands" value="{{ $home->number_of_brands }}"
                                    class="form-control" placeholder="Enter Number Of Brands">
                                @error('number_of_brands')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                            <div class="col-6">
                            <div class="form-group">
                                <label for="brand_heading_2" class="col-form-label"> Brands Heading 2 </label>
                                <input type="text" name="brand_heading_2" value="{{ $home->brand_heading_2 }}"
                                    class="form-control" placeholder="Enter Number Of Brands">
                                @error('brand_heading_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="team_heading" class="col-form-label">Team Heading </label>
                                <input type="text" name="team_heading" value="{{ $home->team_heading }}"
                                    class="form-control" placeholder="Enter Team Heading">
                                @error('team_heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="team_heading_2" class="col-form-label">Team Heading 2</label>
                                <input type="text" name="team_heading_2" value="{{ $home->team_heading_2 }}"
                                    class="form-control" placeholder="Enter Team Heading">
                                @error('team_heading_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Continue with the rest of your fields... -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="business_clients" class="col-form-label">Business Clients</label>
                                <input type="text" name="business_clients" value="{{ $home->business_clients }}"
                                    class="form-control" placeholder="Enter Business Clients">
                                @error('business_clients')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                                <div class="col-6">
                            <div class="form-group">
                                <label for="business_clients_title" class="col-form-label">Business Clients Title</label>
                                <input type="text" name="business_clients_title" value="{{ $home->business_clients_title }}"
                                    class="form-control" placeholder="Enter Business Clients Title">
                                @error('business_clients_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                            <div class="col-6">
                            <div class="form-group">
                                <label for="business_clients_operator" class="col-form-label">Business Clients Operator</label>
                                <input type="text" name="business_clients_operator" value="{{ $home->business_clients_operator }}"
                                    class="form-control" placeholder="Enter Business Clients Operator">
                                @error('business_clients_operator')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="business_achieved" class="col-form-label">Business Achieved</label>
                                <input type="text" name="business_achieved" value="{{ $home->business_achieved }}"
                                    class="form-control" placeholder="Enter Business Achieved">
                                @error('business_achieved')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                         
                        <div class="col-6">
                            <div class="form-group">
                                <label for="business_achieved_title" class="col-form-label">Business Achieved Title</label>
                                <input type="text" name="business_achieved_title" value="{{ $home->business_achieved_title }}"
                                    class="form-control" placeholder="Enter Business Achieved Title">
                                @error('business_achieved_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-6">
                            <div class="form-group">
                                <label for="business_achieved_operator" class="col-form-label">Business Achieved Operator</label>
                                <input type="text" name="business_achieved_operator" value="{{ $home->business_achieved_operator }}"
                                    class="form-control" placeholder="Enter Business Achieved Operator">
                                @error('business_achieved_operator')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-6">
                            <div class="form-group">
                                <label for="business_title" class="col-form-label">Business  Title</label>
                                <input type="text" name="business_title" value="{{ $home->business_title }}"
                                    class="form-control" placeholder="Enter Business  Title">
                                @error('business_title')
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
