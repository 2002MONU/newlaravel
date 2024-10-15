@extends('frontend.layouts.app')
@section('mainwebsite')

<!-- CONTENT START -->
<div class="page-content">
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{asset('assets/images/breadcum.jpg')}});">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container align-items-center">
            <div class="wt-bnr-inr-entry">
                <h1 class="text-white text-center">APPLICATION ACCESS</h1>
                <ul class="wt-breadcrumb breadcrumb-style-2 text-center">
                    <li><a href="javascript:void(0);" class="text-white"><i class="fa fa-home"></i> Home</a></li>
                    <li class="text-white">Application Access</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->

   

    <section>
        <div id="kos" class="apli-container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 water-app-ace" data-aos="fade-right"
                    data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                    <a href="keka-login.html">
                        <div class="card">
                            <img src="{{asset('assets/images/login1.jpg')}}" alt="Keka Login">
                            <h3>Keka Login</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-12 water-app-ace" data-aos="flip-left"
                    data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                    <a href="outlook-web-mail.html">
                        <div class="card">
                            <img src="{{asset('assets/images/out-look.png')}}" alt="Outlook- Web Mail">
                            <h3>Outlook- Web Mail</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-12 water-app-ace" data-aos="flip-left"
                    data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                    <a href="courier-management.html">
                        <div class="card">
                            <img src="{{asset('assets/images/courier.jpg')}}" alt="Courier Management">
                            <h3>Courier Management</h3>
                        </div>
                    </a>
                </div>
            </div>
           
        </div>
    </section>



@endsection