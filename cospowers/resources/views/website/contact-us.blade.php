@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb begin -->
<div class="breadcrumb-murtes" style="background: url({{asset('assets/dynamics/'.$site_setting->contact_banner)}})">
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-xl-6 col-lg-6">
               <div class="breadcrumb-content text-center">
                   <h2>Contact Us</h2>
                   <ul>
                       <li><a href="{{route('home.index')}}">Home</a></li>
                       <li>Contact Us</li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- breadcrumb end -->

<!-- contact begin -->
<div class="contact">
   <div class="container">
       <div class="row justify-content-around">
           <div class="col-xl-5 col-lg-6">
               <div class="contact-address">
                   <div class="row">
                       <div class="col-xl-12 col-lg-12 col-md-4">
                           <div class="single-address">
                               <div class="part-icon">
                                   <img src="{{asset('assets/img/svg/notification.svg')}}" alt="mail">
                                   <span class="title">Mail</span>
                               </div>
                               <div class="part-text">
                                   <p>
                                       <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                                   </p>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-12 col-lg-12 col-md-4">
                           <div class="single-address">
                               <div class="part-icon">
                                   <img src="{{asset('assets/img/svg/hierarchy.svg')}}" alt="mobile">
                                   <span class="title">Mobile No.</span>
                               </div>
                               <div class="part-text">
                                   <p>
                                       <a href="tel:+91{{$contact->mobile_no}}">+91 {{$contact->mobile_no}}</a>
                                   </p>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-12 col-lg-12 col-md-4">
                           <div class="single-address">
                               <div class="part-icon">
                                   <img src="{{asset('assets/img/svg/start.svg')}}" alt="address">
                                   <span class="title">Address:</span>
                               </div>
                               <div class="part-text">
                                   <p>{{$contact->address}}</p>
                               </div>
                           </div>
                       </div>
                   </div>
                   
               </div>
           </div>
           <div class="col-xl-5 col-lg-5">
               <div class="contact-form">
                    
                   <h4>GET IN TOUCH</h4>
                   @if (session('success'))
                       <div class="alert alert-success">{{session('success')}}</div>
                   @endif
                     <form method="POST" action="{{ route('home.contact-submit') }}" id="registerForm" novalidate>
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="full_name" class="form-control" placeholder="Enter Name" required>
                                    @error('full_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="invalid-feedback">Please enter your name.</div>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Enter Number" required>
                                    @error('mobile_no')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">Please enter your mobile number. And Digit 10</div>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">Please enter your email.</div>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Enter Message" required></textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">Please enter your message.</div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit Now <i class="fas fa-long-arrow-alt-right"></i></button>
                            </form>

               </div>
           </div>
       </div>
   </div>
 
</div>
<!-- contact end -->
 <div class="map" id="map">
       <iframe src="{{$contact->map_link}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        // Prevent form submission if validation fails
        if (!this.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        // Add the 'was-validated' class to trigger Bootstrap's validation styles
        this.classList.add('was-validated');
    });

    document.getElementById('mobile_no').addEventListener('input', function() {
        const phone = this.value;
        if (!/^\d{0,10}$/.test(phone)) {
            this.setCustomValidity("Please enter only numeric digits (0-9) up to 10 characters.");
        } else {
            this.setCustomValidity("");
        }
    });

    // Prevent non-numeric input for mobile number
    $('input[name="mobile_no"]').on('keypress', function(e) {
        if (e.which < 48 || e.which > 57) {
            e.preventDefault();
        }
    });

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