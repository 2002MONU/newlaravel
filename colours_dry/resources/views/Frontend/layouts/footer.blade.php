@php
     $sitedetails = \App\Models\SiteSetting::find(1);
     $services = \App\Models\Service::where('status',1)->latest()->get();
@endphp
<footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('frontend/assets/images/footer_bg_1.jpg') }}">
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-xl-4">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="index.php">
                                    <img src="{{ asset('admin/siteImage/logo/'.$sitedetails->ftlogo) }}" alt="Logo" width="250">
                                </a>
                            </div>
                            <p class="about-text text-white">{{$sitedetails->site_about}}</p>
                            <div class="th-social">
                                <a href="{{$sitedetails->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$sitedetails->twitter}}"><i class="fab fa-twitter"></i></a>
                                <a href="{{$sitedetails->instagram}}"><i class="fab fa-instagram"></i></a>
                                <a href="{{$sitedetails->youtube}}"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Our Services</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu style2">
                                @foreach ($services as $service)
                                <li><a href="{{route('frontend.service')}}">{{$service->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Contact Us</h3>
                        <div class="th-widget-contact">
                            <div class="info-box">
                                <div class="info-box_icon"><i class="fas fa-location-dot"></i></div>
                                <p class="info-box_text text-white"> {{$sitedetails->address}}</p>
                            </div>
                            <div class="info-box">
                                <div class="info-box_icon"><i class="fas fa-phone"></i></div>
                                <p class="info-box_text text-white">
                                    <a href="tel:+91{{$sitedetails->phone}}" class="info-box_link text-white">+91 {{$sitedetails->phone}}</a>
                                    <a href="tel:+91{{$sitedetails->whatsapp}}" class="info-box_link text-white">+91 {{$sitedetails->whatsapp}}</a>
                                </p>
                            </div>
                            <div class="info-box">
                                <div class="info-box_icon"><i class="fas fa-envelope"></i></div>
                                <p class="info-box_text text-white">
                                    <a href="mailto:{{$sitedetails->email}}" class="info-box_link text-white">{{$sitedetails->email}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row gy-2 align-items-center">
                <div class="col-lg-12 col-md-12">
                    <p class="copyright-text text-center">Copyright <i class="fal fa-copyright"></i> 2024 <a href="index.php">Colours Dry Cleaning & Laundry Services</a>. All Rights Reserved. | Design & Developed by <a href="https://thecolourmoon.com/index.php" target="_blank">Colourmoon</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="animation-bubble">
        <div class="bubble-1"></div>
        <div class="bubble-2"></div>
        <div class="bubble-3"></div>
        <div class="bubble-4"></div>
        <div class="bubble-5"></div>
        <div class="bubble-6"></div>
        <div class="bubble-7"></div>
        <div class="bubble-8"></div>
        <div class="bubble-9"></div>
        <div class="bubble-10"></div>
    </div>
    <div class="shape-mockup jump d-none d-xl-block" data-bottom="0%" data-left="0%"><img src="{{ asset('frontend/assets/images/footer_shape_1.png') }}" alt="shape"></div>
    <div class="shape-mockup jump d-none d-xl-block" data-bottom="0%" data-right="0%"><img src="{{ asset('frontend/assets/images/footer_shape_2.png') }}" alt="shape"></div>
</footer>
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path></svg>
</div>
<div class="d-lg-block d-md-block d-none">
<div class="btnicon-whatsapp">
    <a href="https://api.whatsapp.com/send?phone=91{{$sitedetails->whatsapp}}" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
</div>
<div class="btnicon-call">
    <a href="tel:+91{{$sitedetails->phone}}">
        <i class="fas fa-phone-volume"></i>
    </a>
</div>
</div>
<script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
</body>
</html>