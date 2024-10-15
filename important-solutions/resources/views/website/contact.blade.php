@extends('website.layouts.app')
@section('mainwebsite')

<div class="breadcumb-wrapper" style="background : url({{asset('assets/dynamics/setting/'.$site_setting->contact_banner)}})">
  <div class="container">
     <div class="breadcumb-content">
        <h1 class="breadcumb-title">Contact Us</h1>
        <ul class="breadcumb-menu">
           <li><a href="{{route('home.index')}}">Home</a></li>
           <li>Contact Us</li>
        </ul>
     </div>
  </div>
</div>

<div class="space-top space-bottom">
  <div class="container">
     <div class="row flex-row-reverse">
        <div class="col-lg-6">
           <div class="title-area">
              <h2 class="sec-title">We’re ready for your Business Solution</h2>
           </div>
           <div class="contact-feature">
              <div class="box-icon"><i class="fa-light fa-phone"></i></div>
              <div class="media-body">
                 <h3 class="box-title h5">General Enquires</h3>
                 <p class="box-text mb-2">Phone: <a href="tel:+91 9493426575">+91 {{$contact->phone_no1}}</a></p>
                 <p class="box-text mb-2">Phone: <a href="tel:+91 9848194718">+91 {{$contact->phone_no2}}</a></p>
                 <p class="box-text mb-2">Email: <a href="mailto:rajeshgovindu@gmail.com">{{$contact->email}}</a></p>
              </div>
           </div>
           <div class="contact-feature">
              <div class="box-icon"><i class="fa-light fa-location-dot"></i></div>
              <div class="media-body">
                 <h3 class="box-title h5"> Address</h3>
                 <p class="box-text">{{$contact->address}}</p>
              </div>
           </div>
           <div class="contact-feature">
              <div class="box-icon"><i class="fa-light fa-clock"></i></div>
              <div class="media-body">
                 <h3 class="box-title h5">Operational Hours</h3>
                 <p class="box-text">{{$contact->operation_hour}}</p>
              </div>
           </div>
        </div>
        <div class="col-lg-6">
           <div class="contact-form-v1 bg-smoke" data-bg-src="assets/img/bg/contact_bg_2.jpg">
              <h3 class="fs-40 mb-30 mt-n2">Send Message</h3>
<!--              @if (Session('success'))
                 <div class="alert alert-success">{{session('success')}}</div>
              @endif-->
              <form class="contact-form" method="POST" action="{{ route('home.contact-submit') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12 style-white">
                        <input type="text" class="form-control" name="full_name" id="name" placeholder="Write your name" value="{{old('full_name')}}">
                        <i class="fal fa-user"></i>
                        @error('full_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 style-white">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{old('email')}}" oninput="validateEmail()">
                        <i class="fal fa-envelope"></i>
                      <div id="emailError" class="text-danger"></div>
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 style-white">
                        <input type="tel" class="form-control" name="phone_no" id="phoneNumber" oninput="validatePhoneNumber()" required maxlength="10" pattern="\d{10}" placeholder="Phone Number"  value="{{old('phone_no')}}">
                       <span id="phoneError" class="text-danger"></span>
                        <i class="fal fa-phone"></i>
                        @error('phone_no')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 style-white">
                        <select name="service" id="subject" class="form-select">
                            <option value="" disabled="disabled" selected="selected" hidden>Select Service</option>
                            @foreach ($services as $service)
                            <option value="{{$service->service_name}}">{{$service->service_name}}</option>
                            @endforeach
                        </select>
                        <i class="fal fa-chevron-down"></i>
                        @error('service')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12 style-white">
                        <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message">{{old('message')}}</textarea>
                        <i class="fal fa-comment"></i>
                        @error('message')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-btn col-12">
                        <button type="submit" class="th-btn w-100" >Send Message</button>
                    </div>
                </div>
              </form>
           </div>
        </div>
     </div>
  </div>
  <div class="container-fluid p-0">
     <div class="contact-map style2">
       <iframe src="{{$contact->map_link}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>
  </div>
</div>
<script>
function validatePhoneNumber() {
    var phoneNumberInput = document.getElementById('phoneNumber');
    var phoneError = document.getElementById('phoneError');

    // Remove all non-numeric characters
    phoneNumberInput.value = phoneNumberInput.value.replace(/\D/g, '');

    // Validate length
    if (phoneNumberInput.value.length !== 10) {
        phoneError.textContent = "Phone number should be exactly 10 digits.";
    } else {
        phoneError.textContent = "";
    }
}

function validateEmail() {
    var email = document.getElementById('email').value;
    var emailError = document.getElementById('emailError');

    // Email validation regex
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Check if the email matches the pattern
    if (!emailPattern.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
        return;
    }

    // If all conditions are met, clear any existing error message
    emailError.textContent = "";
}
</script>

@endsection
