@php

$sitedetails = \App\SiteSetting::find(1);
$sidenav = \App\Category::get();
$sideresearchtype = \App\ResearchType::get();

@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="meta-title" content="{{ $meta_title }}">
        <meta name="keywords" content="{{ $meta_keywords }}">
        <meta name="description" content="{{ $meta_description }}">
        <!-- SOCIAL MEDIA META -->
        <meta property="og:description" content="{{$sitedetails->og_description}}">
        <meta property="og:image" content="">
        <meta property="og:site_name" content="{{$sitedetails->og_site_name}}">
        <meta property="og:title" content="{{$sitedetails->og_title}}">
        <meta property="og:type" content="{{$sitedetails->og_type}}">
        <meta property="og:url" content="{{$sitedetails->og_url}}">
        <!-- TWITTER META -->
        <meta name="twitter:card" content="{{$sitedetails->og_description}}">
        <meta name="twitter:site" content="@Sujay Biotech">
        <meta name="twitter:creator" content="@Sujay Biotech">
        <meta name="twitter:title" content="{{$sitedetails->og_description}}">
        <meta name="twitter:description" content="Sujay Biotech">
        <meta name="twitter:image" content="">
        <title>Sujay Biotech </title>


        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{ asset('admin/siteImage/favicon/'.$sitedetails->favicon) }}">

        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightcase.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/hc-offcanvas-nav.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/mobile-menu.css') }}">
        <script src="{{ asset('frontend/assets/js/hc-offcanvas-nav.js') }}"></script>
    </head>
    <body>

        <div class="body-wrapper">
            <!-- mobile menu start -->
            <div class="mobile-menu">
                <nav class="mobile-header primary-menu d-xl-none">
                    <div class="header-logo">
                        <a href="{{ route('frontend.home') }}" class="logo">
                            <img src="{{ asset('admin/siteImage/logo/'.$sitedetails->logo) }}" alt="logo"></a>
                    </div>
                    <!--                    <div class="header-bar" onclick="openNav()">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>-->
                    <div class="mobile-menu-toggle">
                        <a href="#" data-demo="{position:'left'}" class="button toggle">
                            <span></span>
                        </a>
                    </div>
                </nav>
            </div>
            <!-- moboli menu ending -->


            <!-- header section start -->
            <header class="header-section d-xl-block d-none">
                <div class="header-area">
                    <div class="logo">
                        <a href="{{ route('frontend.home') }}">
                            <img src="{{ asset('admin/siteImage/logo/'.$sitedetails->logo) }}" alt="logo"></a>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="main-menu d-none d-xl-block">

                                <div class="top">
                                    <ul class="left">
                                        <li>
                                            <span> Call Us :</span> <a href="tel:{{ $sitedetails->phone }}">{{ $sitedetails->phone }}</a>
                                        </li>
                                        <li>
                                            <span>Mail Us :</span> <a href="mailto:{{ $sitedetails->email }}">{{ $sitedetails->email }}</a>
                                        </li>
                                    </ul>
                                    <ul class="right">
                                        <li>
                                            <a href="{{ $sitedetails->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $sitedetails->twitter }}"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $sitedetails->youtube }}"><i class="fab fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $sitedetails->instagram }}"><i class="fab fa-instagram"></i></a>
                                        </li>

                                    </ul>
                                </div>
                                <ul class="menu">
                                    <li>
                                        <a href="{{ route('frontend.home') }}">Home</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.about') }}">About Us</a>

                                    </li>
                                    <li>
                                        <a href="">Agriculture </a>
                                        <ul class="m-submenu">
                                            <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Biofertilizers </a>
                                                <ul class="m-submenu">
                                                    <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 1</a></li>
                                                    <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 2</a></li>
                                                    <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Bio Pesticides</a>
                                                <ul class="m-submenu">
                                                    <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 1</a></li>
                                                    <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 2</a></li>
                                                    <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Micronutrents</a>
                                                <ul class="m-submenu">
                                                    <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 1</a></li>
                                                    <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 2</a></li>
                                                    <li><a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 3</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="">Aquaculture& Veterinary </a>
                                        <ul class="m-submenu">
                                            <li><a href="#!">Biofertilizers </a>
                                                <ul class="m-submenu">
                                                    <li><a href="#!">Product 1</a></li>
                                                    <li><a href="#!">Product 2</a></li>
                                                    <li><a href="#!">Product 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#!">Bio Pesticides</a>
                                                <ul class="m-submenu">
                                                    <li><a href="#!">Product 1</a></li>
                                                    <li><a href="#!">Product 2</a></li>
                                                    <li><a href="#!">Product 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#!">Micronutrents</a>
                                                <ul class="m-submenu">
                                                    <li><a href="#!">Product 1</a></li>
                                                    <li><a href="#!">Product 2</a></li>
                                                    <li><a href="#!">Product 3</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    @foreach ($sidenav as $data)

                                    <li>
                                        <a href="{{ route('frontend.category',$data->slug) }}">  {{ $data->name }} </a>

                                    </li>
                                    @endforeach
                                    <li>
                                        <a>Research & Development</a>
                                        <ul class="m-submenu">
                                            @foreach($sideresearchtype as $type)
                                            <li>
                                                <!-- Main menu item with active class -->
                                                <a class="{{ request()->is('research&development/'.$type->slug) ? 'active' : '' }}" >
                                                    {{ $type->title }}
                                                </a>

                                                @php
                                                // Fetch related research developments for each type
                                                $researchDevelopments = \App\ResearchDevelopment::where('researchtype_id', $type->id)->get();
                                                @endphp

                                                <!-- Submenu for each research type -->
                                                @if($researchDevelopments->isNotEmpty())
                                                <ul class="m-submenu">
                                                    @foreach($researchDevelopments as $development)
                                                    <li>
                                                        <a href="{{ url('research&development/'.$type->slug) }}">
                                                            {{ $development->title }} <!-- Adjust the field as necessary -->
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="{{ route('frontend.product') }}">Our Products</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('frontend.contact') }}">Contact Us</a>
                                    </li>
                                </ul>

                            </div>
                        </div><!--col-md-7-->
                        <div class="col-md-3 d-none">
                            <ul class="right-side d-none d-xl-flex">
                                <li>
                                    <div class="post-thumb">
                                        <img src="{{ asset('frontend/assets/images/logo/comment.png') }}" alt="header">
                                    </div>
                                    <div class="post-content">
                                        <span>Have Any Questions?</span>
                                        <span>Call {{ $sitedetails->phone }}</span>
                                    </div>
                                </li>


                            </ul>
                        </div><!--col-md-2-->
                    </div><!--row-->
                </div>
            </header>
            <!-- header section ending -->

            <nav class="mobile-emun-side-div" id="main-nav">

                <ul class="first-nav">
                     <li>
                        <a href="{{ route('frontend.home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.about') }}">About Us</a>
                    </li>
                    <li>
                        <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Agriculture</a>
                        <ul>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Biofertilizers </a>
                                 <ul>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 1</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 2</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 3</a>
                            </li>
                            </ul>
                            </li>
                             <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Bio Pesticides </a>
                                 <ul>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 1</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 2</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 3</a>
                            </li>
                            </ul>
                            </li>
                              <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Micronutrents  </a>
                                 <ul>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 1</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 2</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 3</a>
                            </li>
                            </ul>
                            </li>
                        </ul>
                    </li>
                    
                             <li>
                        <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Aquaculture& Veterinary </a>
                        <ul>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Biofertilizers </a>
                                 <ul>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 1</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 2</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 3</a>
                            </li>
                            </ul>
                            </li>
                             <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Bio Pesticides </a>
                                 <ul>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 1</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 2</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 3</a>
                            </li>
                            </ul>
                            </li>
                              <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Micronutrents  </a>
                                 <ul>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 1</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 2</a>
                            </li>
                            <li>
                                <a href="https://demo.colormoon.in/sujay_biotech/category/waste-management">Product 3</a>
                            </li>
                            </ul>
                            </li>
                        </ul>
                    </li>
                    
                    
                             <li>
                        <a href="#!">Research & Development</a>
                        <ul>
                             @foreach($sideresearchtype as $data)
                                <li><a class="{{ request()->is('research&development/'.$data->id) ? 'active' : '' }}" href="{{ url('research&development/'.$data->id) }}">{{ $data->type_name }}</a>

                                </li>
                                @endforeach    
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{ route('frontend.product') }}">Our Products</a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.contact') }}">Contact Us</a>
                    </li>
                </ul>
              
            </nav>