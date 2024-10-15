@php
   $site_setting = \App\Models\SiteSetting::find(1);
   $social = \App\Models\Sociallinks::find(1);
   $contact = \App\Models\Contact::find(1);
   $services = \App\Models\Service::latest()->get();
@endphp
<div class="fixwhcall d-block d-md-none d-lg-none">
    <a href="https://api.whatsapp.com/send?phone=+91 {{$social->whatapps}}" class="btn-mob-whtsapp" target="_blank">
    <i class="fab fa-whatsapp"></i> Whatsapp
    </a>
    <a href="tel:+91{{$social->call_us}}" class="btn-mob-call">
    <i class="fas fa-phone-volume"></i> Call Us
    </a>
 </div>
 <div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="fal fa-times"></i></button>
    <form>
       <div class="mb-3">
          <input type="text" class="form-control" placeholder="Enter Name">
       </div>
       <div class="mb-3">
          <input type="text" class="form-control" placeholder="Enter Email">
       </div>
       <div class="mb-3">
          <input type="text" class="form-control" placeholder="Enter Phone Number">
       </div>
       <div class="mb-3">
          <input type="text" class="form-control" placeholder="Enter Subject">
       </div>
       <div class="mb-3">
          <textarea type="text" class="form-control" placeholder="Enter Message" rows="3"></textarea>
       </div>
       <button type="submit" class="th-btn style3 ">Submit</button>
    </form>
 </div>
 <footer class="footer-wrapper footer-layout2" data-bg-src="{{asset('assets/dynamics/setting/'.$site_setting->footer_image)}}">
    <div class="widget-area">
       <div class="container">
          <div class="row justify-content-between">
             <div class="col-md-4">
                <div class="widget footer-widget">
                   <div class="th-widget-about">
                      <div class="about-logo">
                         <a href="{{route('home.index')}}">
                         <img src="{{asset('assets/dynamics/setting/'.$site_setting->footer_logo)}}" alt="footer logo">
                         </a>
                      </div>
                      <p class="footer-text">{{$site_setting->footer_about}}</p>
                      <div class="th-social style4">
                         <a href="{{$social->facebook}}">
                         <i class="fab fa-facebook-f"></i>
                         </a>
                         <a href="{{$social->twitter}}">
                         <i class="fab fa-twitter"></i>
                         </a>
                         <a href="{{$social->linked}}">
                         <i class="fab fa-linkedin-in"></i>
                         </a>
                         <a href="https://api.whatsapp.com/send?phone=+91 {{$social->whatapps}}">
                         <i class="fab fa-whatsapp"></i>
                         </a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="widget widget_nav_menu footer-widget">
                   <h3 class="widget_title">Our Services</h3>
                   <div class="menu-all-pages-container custom-servoce">
                      <ul class="menu">
                        @foreach ($services as $service)
                       <li>
                           <a href="{{route('home.services')}}">{{$service->service_name}}</a>
                        </li>
                        @endforeach
                        
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-md-4 ">
                <div class="widget footer-widget">
                   <h3 class="widget_title">Contact Us</h3>
                   <div class="th-widget-contact">
                      <div class="info-box">
                         <div class="info-box_icon">
                            <i class="far fa-phone"></i>
                         </div>
                         <p class="info-box_text">
                            <a href="tel:+91 {{$contact->phone_no1}}" class="info-box_link">+91 {{$contact->phone_no1}}</a> 
                         </p>
                      </div>
                      <div class="info-box">
                         <div class="info-box_icon">
                            <i class="far fa-phone"></i>
                         </div>
                         <p class="info-box_text">
                            <a href="tel:+91 {{$contact->phone_no2}}" class="info-box_link">+91 {{$contact->phone_no2}}</a>
                         </p>
                      </div>
                      <div class="info-box">
                         <div class="info-box_icon">
                            <i class="far fa-envelope-open"></i>
                         </div>
                         <p class="info-box_text">
                            <a href="mailto:{{$contact->email}}" class="info-box_link">{{$contact->email}}</a>
                         </p>
                      </div>
                      <div class="info-box">
                         <div class="info-box_icon">
                            <i class="far fa-map"></i>
                         </div>
                         <p class="info-box_text">
                           {{$contact->address}}
                         </p>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="copyright-wrap bg-theme">
       <div class="container">
          <div class="row gy-2 align-items-center">
             <div class="col-lg-12">
                <p class="copyright-text text-center">
                   <i class="fal fa-copyright"></i>  Copyright <?php echo date('Y'); ?> Important Solutions. All rights reserved. Design and Developed by 
                   <a href="https://thecolourmoon.com/">Colourmoon.</a>
                </p>
             </div>
          </div>
       </div>
    </div>
 </footer>
 <div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
       <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
 </div>
 <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
 <script src="{{asset('assets/js/app.min.js')}}"></script>
 <script src="{{asset('assets/js/main.js')}}"></script>
 <script>
            var msg = '{{Session::get('success')}}';
            var exist = '{{Session::has('success')}}';
            if(exist){
              alert(msg);
            }
          </script>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Enquiry Now</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
       </div>
       <div class="modal-body">
         <form id="contactForm" class="contact-form pop-form" method="POST" action="{{ route('home.contact-submit') }}">
           @csrf
           <div class="row">
             <div class="form-group col-md-12 style-white">
               <input type="text" class="form-control" name="full_name" id="name" placeholder="Write your name" required>
               <i class="fal fa-user"></i>
               <div class="invalid-feedback">Please enter your name.</div>
             </div>
             <div class="form-group col-md-12 style-white">
               <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
               <i class="fal fa-envelope"></i>
               <div class="invalid-feedback">Please enter a valid email address.</div>
             </div>
             <div class="form-group col-md-12 style-white">
               <input type="tel" class="form-control" name="phone_no" id="number" placeholder="Phone Number" pattern="\d{10}" required>
               <i class="fal fa-phone"></i>
               <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
             </div>
             <div class="form-group col-md-12 style-white">
               <select name="service" id="subject" class="form-select" required>
                 <option value="" disabled selected hidden>Select Service</option>
                 @foreach ($services as $service)
                   <option value="{{ $service->service_name }}">{{ $service->service_name }}</option>
                 @endforeach
               </select>
               <i class="fal fa-chevron-down"></i>
               <div class="invalid-feedback">Please select a service.</div>
             </div>
             <div class="form-group col-12 style-white">
               <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message" required></textarea>
               <i class="fal fa-comment"></i>
               <div class="invalid-feedback">Please enter your message.</div>
             </div>
             <div class="form-btn col-12">
               <button class="th-btn w-100" type="submit">Send Message</button>
             </div>
           </div>
           <p class="form-messages mb-0 mt-3"></p>
         </form>
       </div>
     </div>
   </div>
 </div>
 
<script>
   document.addEventListener('DOMContentLoaded', function() {
     const form = document.getElementById('contactForm');
     const phoneInput = document.getElementById('number');
     
     phoneInput.addEventListener('input', function() {
       const phoneValue = phoneInput.value;
       const nonNumeric = /[^0-9]/;
       
       if (nonNumeric.test(phoneValue)) {
         phoneInput.setCustomValidity('Please enter only numbers.');
         phoneInput.classList.add('is-invalid');
       } else if (phoneValue.length > 10) {
         phoneInput.setCustomValidity('Phone number must be exactly 10 digits.');
         phoneInput.classList.add('is-invalid');
       } else {
         phoneInput.setCustomValidity('');
         phoneInput.classList.remove('is-invalid');
       }
     });
 
     form.addEventListener('submit', function(event) {
       const emailInput = document.getElementById('email');
 
       if (!emailInput.checkValidity()) {
         emailInput.classList.add('is-invalid');
         event.preventDefault(); // Prevent form submission
       } else {
         emailInput.classList.remove('is-invalid');
       }
 
       if (!phoneInput.checkValidity()) {
         phoneInput.classList.add('is-invalid');
         event.preventDefault(); // Prevent form submission
       } else {
         phoneInput.classList.remove('is-invalid');
       }
     });
 
     const inputs = form.querySelectorAll('input, select, textarea');
     inputs.forEach(input => {
       input.addEventListener('input', function() {
         if (input.checkValidity()) {
           input.classList.remove('is-invalid');
         }
       });
     });
   });
 </script>
</body>
 </html>