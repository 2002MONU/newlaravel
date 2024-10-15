@php
    $contact = \App\Models\ContactDetail::find(1);
    $site_setting = \App\Models\SiteSetting::find(1);
@endphp
<!-- Footer area -->
<footer class="section bg-black">
    <div class="footer-top section-padding">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-lg-4">
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <a href="{{route('home.index')}}"><img src="{{asset('assets/dynamics/setting/'.$site_setting->footer_logo)}}" alt="logo"></a>
                        </div>
                        <p>{{$site_setting->footer_title}}</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row justify-content-evenly">
                        <div class="col-lg-3 mb-8 text-left">
                            <div class="footer-widget footer-list">
                                <h3 class="footer-title">Quick Link</h3>
                                <ul>
                                    <li><a href="{{route('home.who-we-are')}}">Our Company</a></li>
                                    <li><a href="{{route('home.otc')}}">Products</a></li>
                                    <li><a href="{{route('home.world-map')}}">Exports</a></li>
                                    <li><a href="{{route('home.current-job')}}">Careers</a></li>
                                    <li><a href="{{route('home.contact-us')}}">Contact Us </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-6">
                            <div class="footer-widget footer-list">
                                <h3 class="footer-title">Products</h3>
                                <ul>
                                    <li><a href="{{route('home.ethical')}}">Ethical</a></li>
                                    <li><a href="{{route('home.otc')}}">OTC</a></li>
                                    <li><a href="{{route('home.institutional')}}">Institutional</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-8">
                            <div class="footer-widget footer-list">
                                <h3 class="footer-title">Contact Us</h3>
                                <ul>
                                    <li>
                                        <span class="title">T:</span>
                                        <span class="desc">+91-{{ $contact->mobile_no}}</span>
                                    </li>
                                    <li>
                                        <span class="title">T:</span>
                                        <span class="desc">+91-{{ $contact->hotline_no}}</span>
                                    </li>
                                    <li>
                                        <span class="title">E:</span>
                                        <span class="desc">{{ $contact->email}}</span>
                                    </li>
                                    <li>
                                        <span class="title">A:</span>
                                      <span class="desc">{{  $contact->address }}</span> 
                                    </li>
                                </ul>
                            </div>
                            <div class="social-icon-style mt-3">
                                <a class="facebook" href="{{$contact->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a class="twitter" href="{{$contact->twitter}}"><i class="fa fa-twitter"></i></a>
                                <a class="google-plus" href="{{$contact->google}}"><i class="fa fa-youtube"></i></a>
                                <a class="behance" href="{{$contact->instagram}}"><i class="fa fa-instagram"></i></a>
                                   <a class="facebook" href="{{$contact->behance}}"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright text-center">
                <p>Copyright ©2024 All rights reserved ISM Corporation Private Limited | Made with <i class="fa fa-heart"></i> by <a href="#">Colourmoon </a>.</p>
            </div>
        </div>
    </div>
</footer>

    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugins JS -->
    <script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/hoverparallax.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/odometer.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/ddbeforeandafter.js')}}"></script>
    <script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/imagesloaded.js')}}"></script>
    <script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('assets/js/plugins/aos.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sticky-sidebar.js')}}"></script>
    <script src="{{asset('assets/js/plugins/ajax-mail.js')}}"></script>

    <!-- Activation JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }
        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>

<script>
	function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	}
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
	$(document).ready(function(){
		$("#mySidenav .closebtn").click(()=>{closeNav()})
	})
</script>
    
</body>
</html>