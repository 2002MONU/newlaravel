@extends('admin.layout.app')
@section('title', 'Site Settings')

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
                                            <li class="breadcrumb-item"><a
                                                    href="{{ route('sitesettings.index') }}">@yield('title')</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
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
                <form method="POST" action="{{ route('sitesettings.update', $sitesettings->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body  ">
                        <div class="row p-4">
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Site Title</label>
                                    <input type="text" name="site_title"
                                        value="{{ old('site_title', $sitesettings->site_title) }}"class="form-control"
                                        placeholder="Enter Site Title">
                                    @error('site_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Email</label>
                                    <input type="email" name="email"
                                        value="{{ old('email', $sitesettings->email) }}"class="form-control"
                                        placeholder="Enter email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Site Logo</label>
                                    <input class="form-control" type="file" name="logo">
                                    <span>Image <code>Width: 500px & Height: 500px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/siteImage/logo/' . $sitesettings->logo) }}" target="_blank"
                                        rel="noopener noreferrer"><img
                                            src="{{ asset('admin/siteImage/logo/' . $sitesettings->logo) }}" alt=""
                                            style="width:200px;"></a>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Favicon</label>
                                    <input class="form-control" type="file" name="favicon">
                                    <span>Image <code>Width: 500px & Height: 500px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/siteImage/favicon/' . $sitesettings->favicon) }}"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('admin/siteImage/favicon/' . $sitesettings->favicon) }}"
                                            alt="" style="width:150px;height:150px;"></a>
                                    @error('favicon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Footer Logo</label>
                                    <input class="form-control" type="file" name="ftlogo">
                                    <span>Image <code>Width: 500px & Height: 500px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/siteImage/ftlogo/' . $sitesettings->ftlogo) }}"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('admin/siteImage/ftlogo/' . $sitesettings->ftlogo) }}"
                                            alt="" style="width:150px;height:150px;"></a>
                                    @error('flogo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Address</label>
                                    <textarea name="address" class="form-control" placeholder="Enter Address" rows="6">{{ $sitesettings->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Phone</label>
                                    <input type="text" name="phone"
                                        value="{{ old('phone', $sitesettings->phone) }}"class="form-control"
                                        placeholder="Enter Phone Number">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Whatsapp</label>
                                    <input type="text" name="whatsapp"
                                        value="{{ old('whatsapp', $sitesettings->whatsapp) }}"class="form-control"
                                        placeholder="Enter Whatsapp ">
                                    @error('whatsapp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Instagram</label>
                                    <input type="text" name="instagram"
                                        value="{{ old('instagram', $sitesettings->instagram) }}"class="form-control"
                                        placeholder="Enter Instagram">
                                    @error('instagram')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Twitter</label>
                                    <input type="text" name="twitter"
                                        value="{{ old('twitter', $sitesettings->twitter) }}"class="form-control"
                                        placeholder="Enter Twitter">
                                    @error('twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Facebook</label>
                                    <input type="text" name="facebook"
                                        value="{{ old('facebook', $sitesettings->facebook) }}"class="form-control"
                                        placeholder="Enter Facebook">
                                    @error('facebook')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Youtube</label>
                                    <input type="text" name="youtube"
                                        value="{{ old('youtube', $sitesettings->youtube) }}"class="form-control"
                                        placeholder="Enter Youtube">
                                    @error('youtube')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">OG Title</label>
                                    <input type="text" name="og_title"
                                        value="{{ old('og_title', $sitesettings->og_title) }}"class="form-control"
                                        placeholder="Enter OG Title">
                                    @error('og_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Description</label>
                                    <input id="og_description" name="og_description" class="form-control"
                                        placeholder="Enter OG Description" value=" {{ $sitesettings->og_description }}">
                                    @error('og_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Type</label>
                                    <input id="og_description" name="og_type" class="form-control "
                                        placeholder="Enter OG Type" value="{{ old('og_type', $sitesettings->og_type) }}">
                                    @error('og_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Url</label>
                                    <input id="og_description" name="og_url" class="form-control "
                                        placeholder="Enter OG Url" value="{{ old('og_url', $sitesettings->og_url) }}">
                                    @error('og_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Site Name</label>
                                    <input id="og_description" name="og_site_name" class="form-control "
                                        placeholder="Enter OG Site Name"
                                        value="{{ old('og_site_name', $sitesettings->og_site_name) }}">
                                    @error('og_site_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose OG Image</label>
                                    <input class="form-control" type="file" name="og_image">
                                    <span>Image <code>Width: 500px & Height: 500px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/siteImage/og-image/' . $sitesettings->og_image) }}"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('admin/siteImage/og-image/' . $sitesettings->og_image) }}"
                                            alt="" style="width:150px;height:150px;"></a>
                                    @error('og_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Width</label>
                                    <input id="og_description" name="og_width" class="form-control "
                                        placeholder="Enter OG Width"
                                        value="{{ old('og_width', $sitesettings->og_width) }}">
                                    @error('og_width')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="og_description" class="col-form-label">OG Height</label>
                                    <input id="og_description" name="og_height" class="form-control "
                                        placeholder="Enter OG Height"
                                        value="{{ old('og_height', $sitesettings->og_height) }}">
                                    @error('og_height')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="twitter_card" class="col-form-label">Twitter Card</label>
                                    <input id="twitter_card" name="twitter_card" class="form-control "
                                        placeholder="Enter Twitter Card"
                                        value="{{ old('twitter_card', $sitesettings->twitter_card) }}">
                                    @error('twitter_card')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="twitter_title" class="col-form-label">Twitter Title</label>
                                    <input id="twitter_title" name="twitter_title" class="form-control"
                                        placeholder="Enter Twitter Title"
                                        value="{{ old('twitter_title', $sitesettings->twitter_title) }}">
                                    @error('twitter_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customFile1" class="col-form-label">Choose Twitter Image</label>
                                    <input class="form-control" type="file" name="twitter_image">
                                    <span>Image <code>Width: 500px & Height: 500px</code></span>
                                    <br />
                                    <a href="{{ asset('admin/siteImage/twitter-image/' . $sitesettings->twitter_image) }}"
                                        target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('admin/siteImage/twitter-image/' . $sitesettings->twitter_image) }}"
                                            alt="" style="width:150px;height:150px;"></a>
                                    @error('twitter_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="site_location" class="col-form-label">Site Location</label>
                                    <input id="site_location" name="site_location" class="form-control "
                                        placeholder="Enter Site Location"
                                        value="{{ old('site_location', $sitesettings->site_location) }}">
                                    @error('site_location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="site_about" class="col-form-label">Site About</label>
                                    <input id="site_about" name="site_about" class="form-control"
                                        placeholder="Enter Site About"
                                        value="{{ old('site_about', $sitesettings->site_about) }}">
                                    @error('site_about')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="map_address" class="col-form-label">Map Address</label>
                                    <input id="map_address" name="map_address" class="form-control"
                                        placeholder="Enter Map Address"
                                        value="{{ old('map_address', $sitesettings->map_address) }}">
                                    @error('map_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="open_timing" class="col-form-label">Open-Timing</label>
                                    <input id="open_timing" name="open_timing" class="form-control"
                                        placeholder="Enter Open Timing"
                                        value="{{ old('open_timing', $sitesettings->open_timing) }}">
                                    @error('open_timing')
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
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('.'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
