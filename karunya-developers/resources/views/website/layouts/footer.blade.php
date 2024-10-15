

    
 <div class="modal fade" id="career-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="career-form">
                    <h3 class="mb-3 text-center site-text-primary">Send Your CV</h3>
                    <form id="careerForm" method="post" enctype="multipart/form-data" action="{{route('apply-form-submit')}}">
                        @csrf
                        <input type="hidden" value="f46ce5f7e936953a24d6a77fb0a5ef0f">
                        
                        <!-- Full Name -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="full_name" id="fname" placeholder="Full Name">
                            <label>Full Name</label>
                            <div class="text-danger" id="nameError"></div>
                            @error('full_name')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="femail" placeholder="Email">
                            <label>Email</label>
                            <div class="text-danger" id="emailError"></div>
                            @error('email')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                        </div>

                        <!-- Mobile -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="mobile_no" id="fphone" placeholder="Mobile Number">
                            <label>Mobile</label>
                            <div class="text-danger" id="mobileError"></div>
                            @error('mobile_no')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                        </div>

                        <!-- Location -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                            <label>Location</label>
                            <div class="text-danger" id="locationError"></div>
                            @error('location')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                        </div>

                        <!-- Experience -->
                        <div class="form-floating mb-3">
                            <select class="form-select" id="experience" name="experience">
                                <option value="">Choose</option>
                                <option value="1-2 Years">1-2 Years</option>
                                <option value="2-5 Years">2-5 Years</option>
                                <option value="5-10 Years">5-10 Years</option>
                            </select>
                            <label>Experience</label>
                            <div class="text-danger" id="experienceError"></div>
                            @error('experience')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                        </div>

                        <!-- Qualification -->
                        <div class="form-floating mb-3">
                            <select class="form-select" id="qualification" name="qualification">
                                <option value="">Choose</option>
                                <option value="Under Graduation">Under Graduation</option>
                                <option value="Graduation">Graduation</option>
                                <option value="Post Graduation">Post Graduation</option>
                            </select>
                            <label>Qualification</label>
                            <div class="text-danger" id="qualificationError"></div>
                            @error('qualification')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                        </div>

                        <!-- Resume -->
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="resume" id="resume" placeholder="Upload Resume">
                            <label>Upload Resume</label>
                            <div class="text-danger" id="resumeError"></div>
                            @error('resume')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                        </div>

                        <!-- Submit Button -->
                        <input type="submit" id="submitButton" value="Submit" style="background: linear-gradient(169deg, rgba(148, 82, 40, 1) 0%, rgb(204 132 66) 44%, rgba(148, 82, 40, 1) 100%); color:#fff">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- </div> -->
    @php
        $social = \App\Models\SocialLink::find(1);
        $site_setting = \App\Models\SiteSetting::find(1);
        $project_details = \App\Models\ProjectDetail::where('status', 1)->orderBy('priority', 'asc')->get();
        $contact = \App\Models\ContactDetail::find(1);
        $blogs_detail = \App\Models\Blog::where('status', 1)->latest()->limit(2)->get();
    @endphp
    
    <footer class="footer-wrapper footer-layout6" >
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo"><a href="{{route('website.index')}}">
                                        <img src="{{asset('assets/dynamics/'.$site_setting->footer_logo)}}"
                                            alt="Konta"></a></div>
                                <p class="about-text">
                                    {{
                                    $site_setting->footer_title
                                    }}
                                    </p>
                                <div class="th-social">
                                           <a  target="_blank" href="{{$social->facebook}}"><i
                                            class="fab fa-facebook-f"></i></a> 
                                            <a  target="_blank" href="{{$social->twitter}}"><i
                                            class="fab fa-twitter"></i></a>
                                             <a target="_blank"  href="{{$social->instagram}}"><i
                                            class="fab fa-instagram"></i></a> 
                                            <a target="_blank"  href="{{$social->linkedin}}"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Quick Links</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="{{route('website.about')}}">About Us</a></li>
                                    <li><a href="{{route('website.project')}}">Projects</a></li>
                                    <li><a href="{{route('website.gallery')}}">Gallery</a></li>
                                    <li><a href="{{route('website.blog')}}">Blogs</a></li>
                                    <li><a href="{{route('website.contact')}}">Contact Us</a></li>
                                    <li><a href="{{route('website.join-with-us')}}">Join With Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget_contact footer-widget">
                            <h3 class="widget_title">Get in touch!</h3>
                         
                            <div class="th-widget-contact">
                                <div class="info-box-wrap">
                                    <div class="info-box_icon"><i class="fas fa-location-dot"></i></div>
                                    <p class="info-box_text">{{$contact->address}}</p>
                                </div>
                                <div class="info-box-wrap">
                                    <div class="info-box_icon"><i class="fas fa-envelope"></i></div><a
                                        href="mailto:{{$contact->email}}" class="info-box_link">{{$contact->email}}</a>
                                </div>
                                <div class="info-box-wrap">
                                    <div class="info-box_icon"><i class="fas fa-phone"></i></div><a
                                        href="tel:{{$contact->mobile_no}}" class="info-box_link">+91 {{$contact->mobile_no}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach ($blogs_detail as $blog)
                                 <div class="recent-post">
                                    <div class="media-img"><a href="{{route('website.blog-details',$blog->slug)}}"><img
                                                src="{{asset('assets/dynamics/'.$blog->small_image)}}" alt="Blog Image"></a></div>
                                    <div class="media-body">
                                       
                                        <h4 class="post-title"><a class="text-inherit" href="{{route('website.blog-details',$blog->slug)}}">Regular
                                               {{$blog->title}}</a></h4>
                                    </div>
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-lg-8">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2024 <a
                                href="index.php">Karunya</a>. All Rights Reserved | Design and Developed By <a href="https://thecolourmoon.com/"> Colourmoon</a></p>
                    </div>
                  
                </div>
            </div>
        </div>
    </footer>
    
    
    <div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg></div>
       
    <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
     
    
    <script>
        AOS.init({
            duration:1500
        });
      </script>
    
      
    
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
          var disclaimerModal = new bootstrap.Modal(document.getElementById('disclaimerModal'));
          disclaimerModal.show();
        });
      </script>
    
    
      <script>
        // Initialize the Slick slider
    $(document).ready(function() {
        $('.slider-class').slick({
            dots: true, // Enable dots for navigation (optional)
            arrows: false, // Hide default arrows (you will use your custom buttons)
            infinite: true, // Enable infinite loop
            speed: 200, // Speed of the transition
            slidesToShow: 1, // Number of slides to show
            slidesToScroll: 1 // Number of slides to scroll
        });
    
        // Attach event handler for custom next button
        $("[data-slick-next]").each(function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                var targetSlider = $(this).data("slick-next");
                $(targetSlider).slick('slickNext');
            });
        });
    
        // Attach event handler for custom prev button
        $("[data-slick-prev]").each(function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                var targetSlider = $(this).data("slick-prev");
                $(targetSlider).slick('slickPrev');
            });
        });
    });
    
      </script>
    
    
    <!-- mac book script -->
    <!-- <script>
        const items = document.querySelectorAll('.nav-item');
    
        function handleIndicator(el) {
            items.forEach(item => {
                item.classList.remove('is-active');
            });
    
            el.classList.add('is-active');
        }
    
        items.forEach((item) => {
            item.addEventListener('click', (e) => {
                handleIndicator(item);
            });
    
            item.classList.contains('is-active') && handleIndicator(item);
        });
    </script> -->
    
    
      <script>
    
    document.getElementById('videoContainer').addEventListener('click', function() {
        this.classList.add('fade-out');
        setTimeout(() => {
            this.style.display = 'none'; 
        }, 500); 
    });
    
      </script>
      
    <script>
    document.getElementById('careerForm').addEventListener('submit', function (event) {
        let valid = true;

        // Clear previous error messages
        document.getElementById('nameError').innerHTML = "";
        document.getElementById('emailError').innerHTML = "";
        document.getElementById('mobileError').innerHTML = "";
        document.getElementById('locationError').innerHTML = "";
        document.getElementById('experienceError').innerHTML = "";
        document.getElementById('qualificationError').innerHTML = "";
        document.getElementById('resumeError').innerHTML = "";

        // Full Name Validation
        let fullName = document.getElementById('fname').value.trim();
        if (fullName === "") {
            document.getElementById('nameError').innerHTML = "Full Name is required.";
            valid = false;
        }

        // Email Validation
        let email = document.getElementById('femail').value.trim();
        let emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
        if (email === "") {
            document.getElementById('emailError').innerHTML = "Email is required.";
            valid = false;
        } else if (!emailPattern.test(email)) {
            document.getElementById('emailError').innerHTML = "Invalid email format.";
            valid = false;
        }

        // Mobile Number Validation
        let mobile = document.getElementById('fphone').value.trim();
        let mobilePattern = /^[0-9]{10}$/;
        if (mobile === "") {
            document.getElementById('mobileError').innerHTML = "Mobile number is required.";
            valid = false;
        } else if (!mobilePattern.test(mobile)) {
            document.getElementById('mobileError').innerHTML = "Mobile number must be 10 digits and numeric.";
            valid = false;
        }

        // Location Validation
        let location = document.getElementById('location').value.trim();
        if (location === "") {
            document.getElementById('locationError').innerHTML = "Location is required.";
            valid = false;
        }

        // Experience Validation
        let experience = document.getElementById('experience').value;
        if (experience === "") {
            document.getElementById('experienceError').innerHTML = "Experience is required.";
            valid = false;
        }

        // Qualification Validation
        let qualification = document.getElementById('qualification').value;
        if (qualification === "") {
            document.getElementById('qualificationError').innerHTML = "Qualification is required.";
            valid = false;
        }

        // Resume Validation
        let resume = document.getElementById('resume').value;
        if (resume === "") {
            document.getElementById('resumeError').innerHTML = "Resume upload is required.";
            valid = false;
        }

        // Prevent form submission if validation fails
        if (!valid) {
            event.preventDefault();
        }
    });

    // Function to hide error when user starts typing or selecting options
    function hideErrorOnInput() {
        document.getElementById('fname').addEventListener('input', function() {
            document.getElementById('nameError').innerHTML = "";
        });

        document.getElementById('femail').addEventListener('input', function() {
            document.getElementById('emailError').innerHTML = "";
        });

        document.getElementById('fphone').addEventListener('input', function() {
            document.getElementById('mobileError').innerHTML = "";
        });

        document.getElementById('location').addEventListener('input', function() {
            document.getElementById('locationError').innerHTML = "";
        });

        document.getElementById('experience').addEventListener('change', function() {
            document.getElementById('experienceError').innerHTML = "";
        });

        document.getElementById('qualification').addEventListener('change', function() {
            document.getElementById('qualificationError').innerHTML = "";
        });

        document.getElementById('resume').addEventListener('change', function() {
            document.getElementById('resumeError').innerHTML = "";
        });
    }

    // Call the function to initialize auto-hide error functionality
    hideErrorOnInput();
</script>
     </body>
     </html>
    
    
    
    
    
    
    
    
    
    