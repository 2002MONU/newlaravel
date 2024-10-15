@extends('website.layouts.app')
@section('mainwebsite')

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

<div class="contact-area-2 bg-auto background-image " id="contact-sec" style="background-image: url(assets/images/team_bg_3.png)">
    <div class="container">
        <div class="row gy-4 justify-content-center align-items-center">
            <div class="col-lg-5">
                <div class="col-xl-12 col-lg-12">
                    <div class="contact-feature">
                        <div class="contact-feature-icon"><i class="fal fa-location-dot"></i></div>
                        <div class="media-body">
                            <p class="contact-feature_label">Our Address</p>
                            <a href="https://www.google.com/maps" target="_blank" class="contact-feature_link">{{ $contact->address }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="contact-feature">
                        <div class="contact-feature-icon"><i class="fal fa-phone"></i></div>
                        <div class="media-body">
                            <p class="contact-feature_label">Contact Number</p>
                            <a href="tel:{{$contact->mobile_no}}" class="contact-feature_link">Mobile:91+ {{$contact->mobile_no}}</a>
                            <a href="mailto:{{$contact->email}}" class="contact-feature_link">Email: {{$contact->email}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="contact-feature">
                        <div class="contact-feature-icon"><i class="fal fa-clock"></i></div>
                        <div class="media-body">
                            <p class="contact-feature_label">Hours of Operation</p>
                            <span>{!! nl2br(e($contact->hour_operation)) !!}</span>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-7">
                <div class="contact-wrap2">
                    <div class="contact-form-wrap">
                        <h2 class="title h3 text-center mt-n1">Get In Touch</h2>
                        
                        <!-- Success message -->
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        
                        <!-- Laravel Validation Error Messages -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <form method="POST" action="{{route('contact-form-submit')}}" id="contactForm">
                            @csrf
                            <div class="row">
                                <!-- Name Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="full_name" id="name" placeholder="Your Name*" value="{{ old('full_name') }}">
                                        <i class="fal fa-user"></i>
                                        <div class="text-danger" id="nameError">@error('full_name'){{ $message }}@enderror</div>
                                    </div>
                                </div>

                                <!-- Email Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address*" value="{{ old('email') }}">
                                        <i class="fal fa-envelope"></i>
                                        <div class="text-danger" id="emailError">@error('email'){{ $message }}@enderror</div>
                                    </div>
                                </div>

                                <!-- Subject Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="subject" id="subject" class="form-select">
                                            <option value="" disabled selected hidden>Select Subject*</option>
                                            <option value="Construction" {{ old('subject') == 'Construction' ? 'selected' : '' }}>Construction</option>
                                            <option value="Real Estate" {{ old('subject') == 'Real Estate' ? 'selected' : '' }}>Real Estate</option>
                                            <option value="Industry" {{ old('subject') == 'Industry' ? 'selected' : '' }}>Industry</option>
                                            <option value="Architect" {{ old('subject') == 'Architect' ? 'selected' : '' }}>Architect</option>
                                        </select>
                                        <div class="text-danger" id="subjectError">@error('subject'){{ $message }}@enderror</div>
                                    </div>
                                </div>

                                <!-- Mobile Number Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="mobile_no" id="number" placeholder="Phone Number*" value="{{ old('mobile_no') }}">
                                        <i class="fal fa-phone"></i>
                                        <div class="text-danger" id="mobileError">@error('mobile_no'){{ $message }}@enderror</div>
                                    </div>
                                </div>

                                <!-- Message Field -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Write Your Message*">{{ old('message') }}</textarea>
                                        <i class="fal fa-pen"></i>
                                        <div class="text-danger" id="messageError">@error('message'){{ $message }}@enderror</div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-btn col-12">
                                    <button class="th-btn w-100">Send Message <i class="fas fa-long-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Google Map -->
<div class="contact-map">
    <iframe src="{{$contact->map_link}}" allowfullscreen="" loading="lazy"></iframe>
</div>

<!-- Client-Side Validation with JavaScript -->
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent form submission for validation

    let formValid = true; // Track overall form validity

    // Clear previous error messages
    document.querySelectorAll('.text-danger').forEach(function(el) {
        el.textContent = '';
    });

    // Get form values
    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let subject = document.getElementById('subject').value;
    let mobile_no = document.getElementById('number').value.trim();
    let message = document.getElementById('message').value.trim();

    // Validate Name (Not empty)
    if (name === '') {
        setError('nameError', 'Please enter your name.');
        formValid = false;
    }

    // Validate Email (Regex pattern and not empty)
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email === '') {
        setError('emailError', 'Please enter your email address.');
        formValid = false;
    } else if (!emailPattern.test(email)) {
        setError('emailError', 'Please enter a valid email address.');
        formValid = false;
    }

    // Validate Subject (Not empty)
    if (subject === '') {
        setError('subjectError', 'Please select a subject.');
        formValid = false;
    }

    // Validate Mobile Number (Only digits and exactly 10 digits)
    let mobilePattern = /^[0-9]{10}$/;
    if (mobile_no === '') {
        setError('mobileError', 'Please enter your phone number.');
        formValid = false;
    } else if (!mobilePattern.test(mobile_no)) {
        setError('mobileError', 'Please enter a valid 10-digit phone number.');
        formValid = false;
    }

    // Validate Message (Not empty)
    if (message === '') {
        setError('messageError', 'Please enter your message.');
        formValid = false;
    }

    // If form is valid, submit
    if (formValid) {
        e.target.submit(); // Submit form if all fields are valid
    }
});

// Function to display error message
function setError(elementId, message) {
    document.getElementById(elementId).textContent = message;
}
</script>
@endsection
