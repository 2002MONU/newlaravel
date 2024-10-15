@extends('website.layouts.app')
@section('website')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->contact_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-area-2 space" id="contact-sec">
            <div class="container">
                <div class="title-area text-center"><h2 class="sec-title">Our Contact Information</h2></div>
                <div class="row gy-4 justify-content-center">
                    <div class="col-xl-4 col-lg-6">
                        <div class="contact-feature">
                            <div class="contact-feature-icon"><i class="fal fa-location-dot"></i></div>
                            <div class="media-body">
                                <p class="contact-feature_label">Our Address</p>
                                <a href="https://www.google.com/maps" class="contact-feature_link">{{$contact->address}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="contact-feature">
                            <div class="contact-feature-icon"><i class="fal fa-phone"></i></div>
                            <div class="media-body">
                                <p class="contact-feature_label">Contact Number</p>
                                <a href="tel:+91{{$contact->mobile_no}}" class="contact-feature_link">+91 {{$contact->mobile_no}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="contact-feature">
                            <div class="contact-feature-icon"><i class="fa-regular fa-envelope"></i></div>
                            <div class="media-body">
                                <p class="contact-feature_label">Mail Us</p>
                                <a href="mailto:{{$contact->email}}" class="contact-feature_link">{{$contact->email}}</a>
                                <a href="mailto:{{$contact->alter_email}}" class="contact-feature_link">{{$contact->alter_email}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-wrap2">
                            <div class="contact-form-wrap">
                                @if (session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>                                    
                                @endif
                                <h2 class="title h3 text-center mt-n1"> Book Your Free Consultation.</h2>
                                <form class="contact-form" action="{{ route('contact-form-submit') }}" method="POST" onsubmit="return validateForm()">
                                    @csrf
                                    <div class="row">
                                        <!-- Full Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Your Name*">
                                                <i class="fal fa-user"></i>
                                                <div class="text-danger" id="name_error">@error('full_name') {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address*">
                                                <i class="fal fa-envelope"></i>
                                                <div class="text-danger" id="email_error">@error('email') {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                
                                        <!-- Phone Number -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="tel" class="form-control" name="phone_no" id="phone_no" placeholder="Phone Number*" onkeypress="return isNumberKey(event)">
                                                <i class="fal fa-phone"></i>
                                                <div class="text-danger" id="phone_error">@error('phone_no') {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                
                                        <!-- Package Select -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="package" id="package" class="single-select nice-select form-select mb-2">
                                                    <option value="" disabled="disabled" selected="selected" hidden>Select Package</option>
                                                    @foreach($packages as $package)
                                                        <option value="{{ $package->package_name }}">{{ $package->package_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="text-danger" id="package_error">@error('package') {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                
                                        <!-- Message -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Write Your Message*"></textarea>
                                                <i class="fal fa-pen"></i>
                                                <div class="text-danger" id="message_error">@error('message') {{ $message }} @enderror</div>
                                            </div>
                                        </div>
                                
                                        <!-- Submit Button -->
                                        <div class="form-btn col-12">
                                            <button class="th-btn w-100">Send Message<i class="fas fa-long-arrow-right ms-2"></i></button>
                                        </div>
                                    </div>
                                    <p class="form-messages mb-0 mt-3"></p>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <iframe src="{{$contact->map_link}}" style="border:0; width:100%; height:565px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Function to allow only numeric values in the phone number field
            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false; // Prevent alphabetic and non-numeric characters
                }
                return true;
            }
        
            // Function to validate form and handle error messages
            function validateForm() {
                let isValid = true;
        
                // Get form elements
                const fullName = document.getElementById('full_name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phoneNo = document.getElementById('phone_no').value.trim();
                const package = document.getElementById('package').value.trim();
                const message = document.getElementById('message').value.trim();
        
                // Get error message containers
                const nameError = document.getElementById('name_error');
                const emailError = document.getElementById('email_error');
                const phoneError = document.getElementById('phone_error');
                const packageError = document.getElementById('package_error');
                const messageError = document.getElementById('message_error');
        
                // Clear previous errors
                nameError.innerText = "";
                emailError.innerText = "";
                phoneError.innerText = "";
                packageError.innerText = "";
                messageError.innerText = "";
        
                // Validate full name
                if (fullName === "") {
                    nameError.innerText = "Full Name is required.";
                    isValid = false;
                }
        
                // Validate email
                if (email === "") {
                    emailError.innerText = "Email Address is required.";
                    isValid = false;
                } else if (!validateEmail(email)) {
                    emailError.innerText = "Please enter a valid email address.";
                    isValid = false;
                }
        
                // Validate phone number
                if (phoneNo === "") {
                    phoneError.innerText = "Phone Number is required.";
                    isValid = false;
                } else if (phoneNo.length !== 10) {
                    phoneError.innerText = "Phone Number must be exactly 10 digits.";
                    isValid = false;
                }
        
                // Validate package selection
                if (package === "") {
                    packageError.innerText = "Please select a package.";
                    isValid = false;
                }
        
                // Validate message
                if (message === "") {
                    messageError.innerText = "Message is required.";
                    isValid = false;
                }
        
                return isValid;
            }
        
            // Helper function to validate email format
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(String(email).toLowerCase());
            }
        
            // Hide error messages when the user starts typing
            document.querySelectorAll('.form-control').forEach((input) => {
                input.addEventListener('input', function () {
                    this.nextElementSibling.innerText = "";
                });
            });
        
        </script>
        
@endsection