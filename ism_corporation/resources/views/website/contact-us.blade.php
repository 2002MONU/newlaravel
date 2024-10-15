@extends('website.layouts.app')
@section('mainwebsite')


<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->contact_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Contact</h2>
            <ul>
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>contact us</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end-->
<!-- Project area -->
<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="contact-info-wrap">
                    <div class="single-contact-info-wrap">
                        <div class="info-icon">
                            <i class="dlicon ui-1_home-51"></i>
                        </div>
                        <div class="info-content">
                            <h3 class="title">Address</h3>
                            {{ $contact->address }}
                        </div>
                    </div>
                    <div class="single-contact-info-wrap">
                        <div class="info-icon">
                            <i class="dlicon ui-2_phone"></i>
                        </div>
                        <div class="info-content">
                            <h3 class="title">Phone</h3>
                            <p> Mobile: <span>+91-{{$contact->mobile_no}}</span></p>
                            <p> Hotline: <span>+91-{{$contact->hotline_no}}</span></p>
                        </div>
                    </div>
                    <div class="single-contact-info-wrap">
                        <div class="info-icon">
                            <i class="dlicon ui-1_email-85"></i>
                        </div>
                        <div class="info-content">
                            <h3 class="title">Email</h3>
                            <p>{{$contact->email}}</p>
                        </div>
                    </div>
                    <div class="single-contact-info-wrap">
                        <div class="info-icon">
                            <i class="dlicon ui-2_share"></i>
                        </div>
                        <div class="info-content">
                            <h3 class="title">Follow us</h3>
                            <div class="social-icon-style mt-4">
                                <a class="facebook" target="_blank" href="{{$contact->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a class="twitter" target="_blank" href="{{$contact->twitter}}"><i class="fa fa-twitter"></i></a>
                                <a class="google-plus" target="_blank" href="{{$contact->google}}"><i class="fa fa-youtube"></i></a>
                                <a class="behance" target="_blank" href="{{$contact->instagram}}"><i class="fa fa-instagram"></i></a>
                                   <a class="facebook" target="_blank" href="{{$contact->behance}}"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="contact-from-wrap">
                <h4 class="mb-5">Fill Details</h4>
                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                    <form  method="POST" action="{{route('home.contact-post')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Enter Full Name</label>
                                <input name="full_name" type="text" value="{{old('name')}}">
                                @error('full_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Enter Email Address</label>
                                <input name="email" type="text" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-lg-12">
                                <label>Enter Subject</label>
                                <input name="subject" type="text" value="{{old('subject')}}">
                                @error('subject')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-lg-12">
                                <label>Enter Number</label>
                                <input name="mobile_no" type="text" value="{{old('number')}}">
                                @error('mobile_no')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-lg-12">
                                <label>Enter Message</label>
                                <textarea name="message">{{old('message')}}</textarea>
                                @error('message')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                                <input class="submit" type="submit" value="Send Message">
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="map mt-6 mt-md-12">
    <iframe src="{{$contact->map_link}}"></iframe>
    </div>
</div>
<!--Contact area end-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include jQuery -->
<script>
    $(document).ready(function() {
        // Function to validate form fields
        function validateForm() {
            let isValid = true;
    
            // Validate First Name
            if ($('input[name="full_name"]').val().trim() === '') {
                $('input[name="full_name"]').next('.text-danger').remove();
                $('input[name="full_name"]').after('<div class="text-danger">Full Name is required.</div>');
                isValid = false;
            } else {
                $('input[name="full_name"]').next('.text-danger').remove();
            }
    
            // Validate Last Name
            if ($('input[name="subject"]').val().trim() === '') {
                $('input[name="subject"]').next('.text-danger').remove();
                $('input[name="subject"]').after('<div class="text-danger">Subject is required.</div>');
                isValid = false;
            } else {
                $('input[name="subject"]').next('.text-danger').remove();
            }
    
            // Validate Mobile Number
            const mobileNo = $('input[name="mobile_no"]').val().trim();
            if (mobileNo === '') {
                $('input[name="mobile_no"]').next('.text-danger').remove();
                $('input[name="mobile_no"]').after('<div class="text-danger">Mobile Number is required.</div>');
                isValid = false;
            } else if (!/^\d{10}$/.test(mobileNo)) {
                $('input[name="mobile_no"]').next('.text-danger').remove();
                $('input[name="mobile_no"]').after('<div class="text-danger">Please enter a valid 10-digit mobile number.</div>');
                isValid = false;
            } else {
                $('input[name="mobile_no"]').next('.text-danger').remove();
            }
    
            // Validate Email
            const email = $('input[name="email"]').val().trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '') {
                $('input[name="email"]').next('.text-danger').remove();
                $('input[name="email"]').after('<div class="text-danger">Email is required.</div>');
                isValid = false;
            } else if (!emailPattern.test(email)) {
                $('input[name="email"]').next('.text-danger').remove();
                $('input[name="email"]').after('<div class="text-danger">Please enter a valid email address.</div>');
                isValid = false;
            } else {
                $('input[name="email"]').next('.text-danger').remove();
            }
    
            // Validate Message
            if ($('textarea[name="message"]').val().trim() === '') {
                $('textarea[name="message"]').next('.text-danger').remove();
                $('textarea[name="message"]').after('<div class="text-danger">Message is required.</div>');
                isValid = false;
            } else {
                $('textarea[name="message"]').next('.text-danger').remove();
            }
    
            return isValid;
        }
    
        // Form submission event
        $('form').on('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault(); // Prevent form submission if validation fails
            }
        });
    
        // Allow only numeric input for mobile number
        $('input[name="mobile_no"]').on('keypress', function(e) {
            if (e.which < 48 || e.which > 57) {
                e.preventDefault();
            }
        });
    });


    // message remove after 10 sec
	$(document).ready(function() {
        // Check if there's a success message
        if ($('.alert-success').length > 0) {
            // Set a timeout to remove the success message after 10 seconds
            setTimeout(function() {
                $('.alert-success').fadeOut('slow', function() {
                    $(this).remove(); // Optionally remove it from the DOM
                });
            }, 10000); // 10000 milliseconds = 10 seconds
        }
    });
    </script>
<!--Contact area end-->
@endsection