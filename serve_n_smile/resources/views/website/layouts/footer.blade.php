  @php
    $contact = \App\Models\ContactDetail::find(1);
    $social = \App\Models\SocilaLink::find(1);
    $services = \App\Models\Service::where('status',1)->latest()->limit(6)->get();
@endphp

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body extra-model-body">
                <div class="form-title">Enquiry Form</div>
                <!--<img src="img/serve-favicon.png" class="form-img">-->
                <form id="enquiryForm" method="POST" action="{{ route('home.submit-enquiry') }}">
                    @csrf
                    <input type="text" class="form-control new-cl" name="full_name" placeholder="Enter Name*" required>
                    <input type="email" class="form-control new-cl" name="email" placeholder="Enter Email Address*" required>
                    <input type="tel" class="form-control new-cl" name="phone_no" placeholder="Enter Phone Number*" required>
                    <input type="time" class="form-control new-cl" name="time" placeholder="--:--" required>
                    <input type="date" class="form-control new-cl" name="date" placeholder="dd-mm-yyyy" required>
                    <div>
                        <textarea placeholder="message *" name="message" class="textarea form-control new-cl" id="form-message" rows="5" cols="20" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>

                    <input type="text" class="form-control new-cl dropdown-toggle" id="exampleInputDropdown" placeholder="Select an option" readonly data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <input type="hidden" name="service" id="selectedService">
                    <div class="icon-drop">
                        <i class="fas fa-caret-down"></i>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="exampleInputDropdown">
                        @foreach ($services as $service)
                        <a class="dropdown-item" href="#" data-value="{{ $service->title }}">{{ $service->title }}</a>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
  
  
  
  
      <!-- Modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content extra-bg">
                  
              </div>
          </div>
      </div>
    <footer class="footer-wrap-layout1 section-shape1">
              <div class="container">
                  <div class="footer-top-box">
                      <div class="row">
                          <div class="col-lg-3 col-sm-6 col-12">
                              <div class="footer-box-layout1">
                                  <div class="footer-title">
                                      <h4>SERVICES</h4>
                                  </div>
                                  <div class="footer-menu-box">
                                      <ul class="footer-menu-list">
                                        @foreach ($services as $service)
                                          <li>
                                              <a href="{{route('home.services-details',$service->slug)}}">{{$service->title}}</a>
                                          </li>
                                          @endforeach
                                     </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6 col-12">
                              <div class="footer-box-layout1">
                                  <div class="footer-title">
                                      <h4>COMPANY</h4>
                                  </div>
                                  <div class="footer-menu-box">
                                      <ul class="footer-menu-list">
                                          <li>
                                              <a href="{{route('home.index')}}">Home</a>
                                          </li>
                                          <li>
                                              <a href="{{route('home.about')}}">About Us</a>
                                          </li>
                                          <li>
                                              <a href="{{route('home.services')}}">Services</a>
                                          </li>
                                          <li>
                                              <a href="{{route('home.blog')}}">Blog</a>
                                          </li>
                                          <li>
                                              <a href="{{route('home.contact')}}">Contact</a>
                                          </li>
                                          
                                      </ul>
                                  </div>
                              </div>
                          </div>
                        
                          <div class="col-lg-3 col-sm-6 col-12">
                              <div class="footer-box-layout1">
                                  <div class="footer-title">
                                      <h4>GET IN TOUCH</h4>
                                  </div>
                                    <div class="footer-menu-box">
                                      <ul class="footer-menu-list">
                                          <li>
                                              <a href="tel:+91{{$contact->phone_no}}">+91 {{$contact->phone_no}}</a>
                                          </li>
                                          <li>
                                            <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>

                                          </li>
                                          <li>
                                              <a >{!! nl2br(e($contact->location)) !!}</a>
                                          </li>
                                         
                                      </ul>
                                  </div>
                                 
                                  <div class="footer-social">
                                      <ul class="social-icon">
                                          <li><a href="{{$social->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                          <li><a href="{{$social->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                          <li><a href="{{$social->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                          <li><a href="{{$social->google_plus}}"><i class="fab fa-google-plus-g"></i></a></li>
                                        
                                        
                                      </ul>
                                  </div>
                              </div>
                          </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                              <div class="footer-box-layout1">
                                  <div class="footer-title">
                                      <h4>LOCATION</h4>
                                  </div>
                                  <div class="google-map-area">
                                   <iframe src="{{$contact->map_link}}" width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                 
                              </div>
                              </div>
                          </div>
  
                      </div>
                  </div>
                  <div class="footer-bottom-box">
                      <div class="row">
                          <div class="col-md-7 text-left">
                              <div class="copyright">©Copyrights Serve n Smile <?php echo date('Y'); ?>
                                All rights reserved | 
  
                             Design and Developed by Colourmoon.</div>
                          </div>
                          <div class="col-md-5">
                              <div class="footer-bottom-menu">
                                  <ul>
                                    
                                      <li><a href="{{route('home.term-condition')}}">Terms and Conditions</a></li>
                                      <li><a href="{{route('home.privacy-policy')}}">Privacy Policy</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </footer>
           <!-- Footer Area End Here -->
            <div class="mobile--btns d-xl-block d-lg-block d-md-block d-none">
     <div class="btnicon-whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{$contact->whatapps}}" target="_blank">
        <i class="fab fa-whatsapp"></i>
        </a>
     </div>
     <div class="btnicon-call">
        <a href="tel:+91{{$contact->phone_no}}" target="#">
        <i class="fas fa-phone-alt"></i>
        </a>
     </div>
  </div>
  
  <!-- mobile-btns -->
  <div class="mobile-btn d-block d-sm-none d-md-none d-lg-none d-xl-none d-xxl-none">
              <div class="row p-0">
                  <div class="col-6 ">
                      <a href="tel:+91 {{$contact->phone_no}}" class="ph-btn">
                          <i class="fas fa-phone-alt"></i>Phone
                      </a>
                  </div>
                  <div class="col-6">
                      <a href="https://api.whatsapp.com/send?phone=+91{{$contact->whatapps}}&text=Hi" target="_blank" class="ph-btn ph-btn2">
                         <i class="fab fa-whatsapp"></i>Whatsapp
                     </a>
                  </div>
              </div>
          </div>
  
         
          <!-- Offcanvas Menu Start -->
          <div class="offcanvas-menu-wrap" id="offcanvas-wrap" data-position="right">
              <div class="close-btn offcanvas-close"><i class="fas fa-times"></i></div>
              <div class="offcanvas-content">
                  <div class="offcanvas-logo">
                      <a href="{{route('home.index')}}"><img src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" alt="logo"></a>
                  </div>
                  <ul class="offcanvas-menu">
                      <li class="nav-item">
                          <a href="{{route('home.index')}}">HOME</a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('home.about')}}">ABOUT</a>
                      </li>
                      <li class="nav-item">
                          
                          <a href="{{route('home.services')}}">SERVICES</a>
                      </li>
  
                    
                      <li class="nav-item">
                          <a href="{{route('home.contact')}}">CONTACT</a>
                      </li>
                     
                  </ul>
                  <div class="offcanvas-footer">
                      <div class="item-title">Follow Me</div>
                      <ul class="offcanvas-social">
                          <li><a href="{{$social->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="{{$social->twitter}}"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="{{$social->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                          <li><a href="{{$social->google_plus}}"><i class="fab fa-google-plus-g"></i></a></li>
                          <li><a href="{{$social->pinerent}}"><i class="fab fa-pinterest"></i></a></li>
                         
                      </ul>
                  </div>
              </div>
          </div>
          <!-- Offcanvas Menu End -->
      </div>
      <!-- jquery-->
      <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
      <!-- Plugins js -->
      <script src="{{asset('assets/js/plugins.js')}}"></script>
      <!-- Popper js -->
      <script src="{{asset('assets/js/popper.min.js')}}"></script>
      <!-- Bootstrap js -->
      <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <!-- MeanMenu js -->
      <script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script> 
      <!-- Nivo Slider js -->
      <script src="{{asset('assets/vendor/slider/js/jquery.nivo.slider.js')}}"></script> 
      <script src="{{asset('assets/vendor/slider/home.js')}}"></script>
      <!-- Owl Carousel js --> 
      <script src="{{asset('assets/vendor/OwlCarousel/owl.carousel.min.js')}}"></script> 
      <!-- Magnific Popup js -->
      <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    
      <!-- CounterUp js -->
      <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script> 
      <!-- WayPoints js -->
      <script src="{{asset('assets/js/waypoints.min.js')}}"></script> 
      <!-- Validator js -->
      <script src="{{asset('assets/js/validator.min.js')}}"></script>
      <!-- Main js -->
      <script src="{{asset('assets/js/main.js')}}"></script>
      <!-- Contact js -->
       <script src="{{asset('assets/js/contact-form.js')}}"></script>
  
     <script>
          // Custom JavaScript to handle dropdown item selection
          document.addEventListener('DOMContentLoaded', function() {
              var input = document.getElementById('exampleInputDropdown');
              var dropdownItems = document.querySelectorAll('.dropdown-item');
  
              dropdownItems.forEach(function(item) {
                  item.addEventListener('click', function(e) {
                      e.preventDefault();
                      input.value = e.target.textContent;
                  });
              });
          });
      </script>
  <script>
  $(document).ready(function() {
    $('.dropdown-item').click(function(e) {
        e.preventDefault(); // Prevent the default action
        var selectedService = $(this).data('value'); // Get the selected service value
        
        $('#exampleInputDropdown').val(selectedService); // Set the selected value in the input field
        $('#selectedService').val(selectedService); // Set the value in the hidden input field
    });
});
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('enquiryForm');
        const phoneNoInput = form.querySelector('input[name="phone_no"]');
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const dropdownInput = document.getElementById('exampleInputDropdown');
        const hiddenServiceInput = document.getElementById('selectedService');

        // Phone number validation
        phoneNoInput.addEventListener('input', function() {
            // Remove any non-digit characters
            this.value = this.value.replace(/[^0-9]/g, '');
            // Limit the input to 10 digits
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }

            // Check if the phone number is exactly 10 digits
            if (this.value.length !== 10) {
                this.classList.add('is-invalid');
                showError('Phone number must be exactly 10 digits.');
            } else {
                this.classList.remove('is-invalid');
                hideError();
            }
        });

        // Form submission validation
        form.addEventListener('submit', function(event) {
            let isValid = true;

            // Check if the phone number is exactly 10 digits
            if (phoneNoInput.value.length !== 10) {
                isValid = false;
                phoneNoInput.classList.add('is-invalid');
                showError('Phone number must be exactly 10 digits.');
            } else {
                phoneNoInput.classList.remove('is-invalid');
                hideError();
            }

            // Check all required fields
            form.querySelectorAll('input[required], textarea[required]').forEach(function(input) {
                if (input.value.trim() === '') {
                    isValid = false;
                    input.classList.add('is-invalid');
                    showError('Please fill in all required fields.');
                } else {
                    input.classList.remove('is-invalid');
                    hideError();
                }
            });

            if (!isValid) {
                event.preventDefault();
            } else {
                // Show a JavaScript message after successful submission
                alert('Form submitted successfully!');
            }
        });

        // Dropdown selection handling
        dropdownItems.forEach(function(item) {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                dropdownInput.value = selectedValue;
                hiddenServiceInput.value = selectedValue;
            });
        });

        // Helper functions to show and hide error messages
        function showError(message) {
            let errorElement = document.getElementById('formError');
            if (!errorElement) {
                errorElement = document.createElement('div');
                errorElement.id = 'formError';
                errorElement.style.color = 'red';
                form.insertBefore(errorElement, form.firstChild);
            }
            errorElement.textContent = message;
        }

        function hideError() {
            const errorElement = document.getElementById('formError');
            if (errorElement) {
                errorElement.textContent = '';
            }
        }
    });
</script>

  </body>
  </html>