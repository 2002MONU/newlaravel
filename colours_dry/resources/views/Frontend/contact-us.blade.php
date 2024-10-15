@extends('Frontend.layouts.app')
@section('content')

<div class="breadcumb-wrapper background-image" style="background-image: url('{{ asset('frontend/assets/images/breadcumb-bg.jpg') }}');">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('frontend.index')}}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<div class="space pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-md-4 col-lg-4">
                                <div class="contact-info text-center">
                                    <div class="contact-info_icon">
                                        <i class="fa-light fa-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="contact-info_title">Mobile Number</h6>
                                        <span class="contact-info_text">
                                            <a href="tel:{{ $sitesetting->phone }}">{{ $sitesetting->phone }}</a>
                                            <a href="tel:{{ $sitesetting->whatsapp }}">{{ $sitesetting->whatsapp }}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="contact-info text-center">
                                    <div class="contact-info_icon">
                                        <i class="fa-light fa-envelope"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="contact-info_title">Email Address</h6>
                                        <span class="contact-info_text">
                                            <a href="mailto:{{ $sitesetting->email }}">{{ $sitesetting->email }}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="contact-info text-center">
                                    <div class="contact-info_icon"><i class="fa-light fa-location-dot"></i></div>
                                    <div class="media-body">
                                        <h6 class="contact-info_title">Location</h6>
                                        <span class="contact-info_text">
                                            <a href="{{ $sitesetting->site_location }}" target="_blank">{{ $sitesetting->address }}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="contact-form input-smoke " method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <h2 class="sec-title mb-30">Get In Touch</h2>
                            @if ($message = Session::get('message'))
                            <div class="alert bg-success text-white">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                <span class="font-weight-bold h5 text-white">{{ $message }}</span>
                            </div>
                        @endif
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Your Name">
                                    <i class="fal fa-user"></i>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control"  value="{{ old('email') }}" name="email" id="email" placeholder="Email Address">
                                    <i class="fal fa-envelope"></i>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="tel" class="form-control"  value="{{ old('phone') }}" name="phone" id="number" placeholder="Phone Number">
                                    <i class="fal fa-phone"></i>
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror</div>
                                <div class="form-group col-md-6">
                                    <select name="service" id="subject" class="form-select nice-select">
                                        <option value="" disabled="disabled" selected="selected" hidden>Select Service</option>
                                        @foreach ($service as $data )
                                            
                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                        @endforeach
                                      
                                    </select>
                                    @error('service')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-12">
                                    <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message"> {{ old('message') }}</textarea> <i class="fal fa-pencil"></i>
                                    @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-btn col-12">
                                    <button class="th-btn btn-fw th-radius">Send Message</button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                          
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <iframe src="{{ $sitesetting->map_address }}" style="border:0; width:100%; height:550px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <section class="overflow-hidden mb-5" id="process-sec">
            <div class="container">
                <div class="title-area text-center">
                    <h3 class="sec-title">Our Branches</h3>
                </div>
                <div class="row gy-4 justify-content-center">
                    @if ($branch && $branch->isNotEmpty())
                        @foreach ($branch as $data)
                            <div class="col-xl-3 col-md-6 process-box-wrap">
                                <div class="process-box">
                                    <h3 class="box-title">{{ $data->name }}</h3>
                                    <!-- Add more branch details here if needed -->
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-xl-3 col-md-6 process-box-wrap">
                            <div class="process-box">
                                <h3 class="box-title">No branches</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        
    
@endsection