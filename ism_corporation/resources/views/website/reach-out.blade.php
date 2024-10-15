@extends('website.layouts.app')
@section('mainwebsite')

<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->career_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Reach Out HR</h2>
            <ul>
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>Careers</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end-->
<section class="reach-hr">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="contact-from-wrap">
                    <h4 class="mb-5">Fill Details</h4>
                    @if (session('success'))
                  <div class="alert alert-success">{{session('success')}}</div>                        
                    @endif
                    <form action="{{route('home.reach-out-post')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Enter First Name</label>
                                <input name="first_name" type="text" value="{{old('first_name')}}">
                                @error('first_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Enter Last Name</label>
                                <input name="last_name" type="text" value="{{old('last_name')}}">
                                @error('last_name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Enter Number</label>
                                <input name="mobile_no" type="text" value="{{old('mobile_no')}}">
                                @error('mobile_no')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Enter Email</label>
                                <input name="email" type="text" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-lg-12">
                                <label>Upload Resume</label>
                                <input name="resume" type="file">
                                @error('resume')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-lg-12">
                                <label>Select Role</label>
                                <select name="role">
                                    @foreach ($current_jobs as $current)
                                    <option value="{{$current->job_name}}">{{$current->job_name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-lg-12">
                                <label>Enter Message</label>
                                <textarea name="message">{{old('message')}}</textarea>
                                @error('message')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="col-lg-12">
                            <input class="submit" type="submit" value="Send Message" >
                            </div>
                        </div>
                    </form>
                    {{-- <p class="form-messege"></p> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="reac-hr">
                <img src="{{asset('assets/dynamics/setting/'.$site_setting->reach_out_image)}}" alt="img">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include jQuery -->
<script>
    $(document).ready(function() {
        // Function to validate form fields
        function validateForm() {
            let isValid = true;
    
            // Validate First Name
            if ($('input[name="first_name"]').val().trim() === '') {
                $('input[name="first_name"]').next('.text-danger').remove();
                $('input[name="first_name"]').after('<div class="text-danger">First Name is required.</div>');
                isValid = false;
            } else {
                $('input[name="first_name"]').next('.text-danger').remove();
            }
    
            // Validate Last Name
            if ($('input[name="last_name"]').val().trim() === '') {
                $('input[name="last_name"]').next('.text-danger').remove();
                $('input[name="last_name"]').after('<div class="text-danger">Last Name is required.</div>');
                isValid = false;
            } else {
                $('input[name="last_name"]').next('.text-danger').remove();
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
    
            // Validate Resume Upload
            if ($('input[name="resume"]').val().trim() === '') {
                $('input[name="resume"]').next('.text-danger').remove();
                $('input[name="resume"]').after('<div class="text-danger">Resume is required.</div>');
                isValid = false;
            } else {
                $('input[name="resume"]').next('.text-danger').remove();
            }
    
            // Validate Role Selection
            if ($('select[name="role"]').val().trim() === '') {
                $('select[name="role"]').next('.text-danger').remove();
                $('select[name="role"]').after('<div class="text-danger">Role selection is required.</div>');
                isValid = false;
            } else {
                $('select[name="role"]').next('.text-danger').remove();
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
    


@endsection