@php

$sitedetails = \App\SiteSetting::find(1);
$sidenav = \App\Category::get();
$sideresearchtype = \App\ResearchType::get();

@endphp
<!-- footer section start here -->
<footer class="footer-section" style="background: linear-gradient(rgba(4,39,76,0.9), rgba(0,0,0,0.9)),url('assets/images/bg-img-1.png')">
    <div class="footer-top"  >
        <div class="container">
            <div class="top">
                <div class="post-item" data-aos="fade-right" data-aos-duration="700">
                    <div class="post-thumb">
                        <img src="{{ asset('frontend/assets/images/01.png') }}" alt="footer">
                    </div>
                    <div class="post-content">
                        <h6>Give us a Call</h6>
                        <p>{{ $sitedetails->phone }}</p>
                    </div>
                </div>
                <div class="post-item" data-aos="fade-up" data-aos-duration="700">
                    <div class="post-thumb">
                        <img src="{{ asset('frontend/assets/images/02.png') }}" alt="footer">
                    </div>
                    <div class="post-content">
                        <h6>Send us a Message</h6>
                        <p>{{ $sitedetails->email }}</p>
                    </div>
                </div>
                <div class="post-item" data-aos="fade-left" data-aos-duration="700">
                    <div class="post-thumb">
                        <img src="{{ asset('frontend/assets/images/03.png') }}" alt="footer">
                    </div>
                    <div class="post-content">
                        <h6>Visit our Location</h6>
                        <p>{{ $sitedetails->address }}</p>
                    </div>
                </div>
            </div>

            <div class="bottom row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-12" data-aos="fade-right" data-aos-duration="700">
                    <div class="bottom-item">
                        <div class="footer-logo">
                            <a href="{{ route('frontend.home') }}"><img src="{{ asset('admin/siteImage/ftlogo/'.$sitedetails->ftlogo) }}" alt="footer-logo"></a>
                        </div>
                        <p> {{ $sitedetails->site_about }}  </p>
                        <ul class="social-media">
                            <li>
                                <a href="{{ $sitedetails->facebook }}">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $sitedetails->twitter }}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $sitedetails->intagram }}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $sitedetails->youtube }}">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-12" data-aos="fade-up" data-aos-duration="700">
                    <div class="bottom-item">
                        <h4 class="text-white">Useful Links</h4>
                        <ul>
                            <li>
                                <a href="{{ route('frontend.home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.about') }}">About Us</a>
                            </li>

                            <li>
                                <a href="{{ route('frontend.partner') }}">Our Partners</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.product') }}">Our Products</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-12" data-aos="fade-left" data-aos-duration="700">
                    <div class="bottom-item">
                        <h4 class="text-white">Our Products</h4>
                        <ul>

                            @foreach ($sidenav as $data)

                            <li>
                                <a href="{{ route('frontend.category',$data->slug) }}">  {{ $data->name }} </a>

                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="section-wrapper">
                <p class="text-white">
                    Copyright 2024 Sujay Biotech. All rights reserved. Design and Developed by <a target="_blank" href="https://thecolourmoon.com/">Colourmoon</a>.


                </p>

            </div>
        </div>
    </div>
</footer>
<!-- footer section end here -->
</div>

<!-- scroll to top -->
<a href="#" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
<!-- scroll to top -->



<div class="login-box d-block d-md-none d-lg-none">
    <a href="tel:{{ $sitedetails->phone }}"> Call Now</a>
    <a href="mailto:{{ $sitedetails->email }}"> Mail Us</a>
</div>

 

<script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/fontawesome.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/lightcase.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/progress.js') }}"></script>
<script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/map-custom.js') }}"></script>
<script src='{{ asset('frontend/assets/js/slick.min.js') }}'></script>
<script src="{{ asset('frontend/assets/js/theia-sticky-sidebar.js') }}"></script>
<script src="{{ asset('frontend/assets/js/functions.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.swiper-container', {
        direction: 'horizontal', // or 'vertical'
        loop: true,
        centeredSlides: true,

// Autoplay
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },

// Use slide or fade transition effect
        speed: 2000,

    });
});
</script>

<script>
    $(document).ready(function () {
// Swiper: Slider
        new Swiper('.servcie-slider', {
            loop: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 3,
            paginationClickable: true,
            spaceBetween: 20,
            breakpoints: {
                1920: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1028: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                480: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });
    });

</script>


<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

 
</body>


</html>