@extends('website.layouts.app')
@section('website')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->service_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{$service->service_title}}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>{{$service->service_title}}</li>
            </ul>
        </div>
    </div>
</div>
<section class="space-top space-extra2-bottom">
    <div class="container">
        <div class="main--content">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single">
                        <div class="page-img mb-30">
                            <img src="{{asset('assets/dynamics/'.$service->service_image)}}" alt="Service Image">
                        </div>
                        <div class="page-content">
                            <h2 class="h3 page-title">{{$service->service_title}}</h2>
                            {!! $service->description !!}
                            <div class="row gy-30 align-items-center">
                                <div class="col-xl-6">
                                    <div class="page-img"><img class="w-100" src="{{asset('assets/dynamics/'.$service->benefit_image)}}" alt="Service Image" /></div>
                                </div>
                                <div class="col-xl-6">
                                    <h4 class="box-title">Services Benefits:</h4>
                                    {!! $service->benefit_description !!}
                                </div>
                            </div>
                            <h3 class="h5 mt-30">{{$service->title_2}}</h3>
                            <p class="mb-25">{{ $service->title_2_description }}</p>
                            
                            <br>
                            <div class="row gy-40 justify-content-between">
                                <div class="col-sm-6 col-lg-auto process-card2-wrap">
                                    <div class="process-card2">
                                        <div class="process-card2_icon"><i class="fal fa-file-lines"></i></div>
                                        <h2 class="process-card2_title">{{$service->box_01_title}}</h2>
                                        <p class="process-card2_text">{{$service->box_01_description}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-auto process-card2-wrap">
                                    <div class="process-card2">
                                        <div class="process-card2_icon"><i class="fal fa-pen-ruler"></i></div>
                                        <h2 class="process-card2_title">{{$service->box_02_title}}</h2>
                                        <p class="process-card2_text">{{$service->box_02_description}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-auto process-card2-wrap">
                                    <div class="process-card2">
                                        <div class="process-card2_icon"><i class="fal fa-sack-dollar"></i></div>
                                        <h2 class="process-card2_title">{{$service->box_03_title}}</h2>
                                        <p class="process-card2_text">{{$service->box_03_description}}</p>
                                    </div>
                                </div>
                            </div><br>
                            {!! $service->last_description !!}
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4 fixcontent">
                    <aside class="sidebar-area">
                        <div class="widget widget_categories">
                            <h3 class="widget_title">Related Services</h3>
                            <ul>
                                @if($related_services->isEmpty())
                                 <h6>No Related Services</h6>
                                @else
                                @foreach ($related_services as $serv)
                                <li><a href="{{route('website.service',$serv->slug)}}">{{$serv->service_title}}</a></li>
                                @endforeach
                               @endif
                            </ul>
                        </div>
                        <form class="th-comment-form" action="{{route('website.enquiry-form')}}" method="POST" onsubmit="return validateForm();">
                            @csrf
                            <div class="form-title pb-30">
                                <h3 class="widget_title">Enquiry Form</h3>
                                @if (session('success'))
                                    <div class="alert alert-success">{{session('success')}}</div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" id="full_name" name="full_name" placeholder="Full Name*" class="form-control style-white">
                                        <i class="far fa-user"></i>
                                        <div class="text-danger" id="full_name_error"></div> <!-- Error message area -->
                                        @error('full_name')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" placeholder="Your Email*" class="form-control style-white">
                                        <i class="far fa-envelope"></i>
                                        <div class="text-danger" id="email_error"></div> <!-- Error message area -->
                                        @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" id="subject" name="subject" placeholder="Subject*" class="form-control style-white">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    <div class="text-danger" id="subject_error"></div> <!-- Error message area -->
                                    @error('subject')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <textarea placeholder="Message*" id="message" name="message" class="form-control style-white"></textarea>
                                    <i class="fal fa-pencil"></i>
                                    <div class="text-danger" id="message_error"></div> <!-- Error message area -->
                                    @error('message')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-12 form-group mb-0">
                                    <button class="th-btn">Submit Message <i class="fas fa-arrow-right ms-1"></i></button>
                                </div>
                            </div>
                        </form>
                      </aside>
                </div>
            </div>
        </div>
        
    </div>
</section>
<script>
    function validateForm() {
        // Clear previous error messages
        document.getElementById("full_name_error").innerText = "";
        document.getElementById("email_error").innerText = "";
        document.getElementById("subject_error").innerText = "";
        document.getElementById("message_error").innerText = "";
    
        // Get form field values
        let fullName = document.getElementById("full_name").value.trim();
        let email = document.getElementById("email").value.trim();
        let subject = document.getElementById("subject").value.trim();
        let message = document.getElementById("message").value.trim();
    
        let isValid = true;
    
        // Validate Full Name
        if (fullName === "") {
            document.getElementById("full_name_error").innerText = "Full Name is required.";
            isValid = false;
        }
    
        // Validate Email
        if (email === "") {
            document.getElementById("email_error").innerText = "Email is required.";
            isValid = false;
        } else {
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                document.getElementById("email_error").innerText = "Please enter a valid email address.";
                isValid = false;
            }
        }
    
        // Validate Subject
        if (subject === "") {
            document.getElementById("subject_error").innerText = "Subject is required.";
            isValid = false;
        }
    
        // Validate Message
        if (message === "") {
            document.getElementById("message_error").innerText = "Message is required.";
            isValid = false;
        }
    
        return isValid; // Only return true if all validations pass
    }
    </script>
    
    
@endsection