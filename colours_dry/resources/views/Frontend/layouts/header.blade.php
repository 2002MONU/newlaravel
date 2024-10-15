@php

    $sitedetails = \App\Models\SiteSetting::find(1);
    $path = request()->path();
    $seo_details = \App\Models\Seo::where('page_name', $path)->first();
    $meta_title = $meta_description = $meta_keywords = '';
    if ($seo_details != '') {
        $meta_title = $seo_details->meta_title;
        $meta_description = $seo_details->meta_description;
        $meta_keywords=implode(",", json_decode($seo_details->meta_keywords));
    }

@endphp
<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $sitedetails->site_title}} | {{$meta_title}}</title>
        <meta name="author" content="Laun">
        <meta name="description" content=" {{$meta_description}}">
        <meta name="keywords" content="{{ $meta_keywords}}">
        <meta name="author" content="">
        <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
        <link rel="canonical" href="Colours">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="{{$sitedetails->og_type}}">
        <meta property="og:title" content="{{$sitedetails->og_title}}">
        <meta property="og:url" content="{{$sitedetails->og_url}}">
        <meta property="og:site_name" content="{{$sitedetails->og_site_name}}">
        <meta property="og:updated_time" content="2021-04-13T14:03:56+00:00">
        <meta property="og:image" content="{{ asset('admin/siteImage/og-image/'.$sitedetails->og_image) }}">
        <meta property="og:image:secure_url" content="{{ asset('frontend/assets/images/logo.png') }}">
        <meta property="og:image:width" content="{{$sitedetails->og_width}}">
        <meta property="og:image:height" content="{{$sitedetails->og_height}}">
        <meta property="og:image:alt" content="Homepage">
        <meta property="og:image:type" content="image/png">
        <meta name="twitter:card" content="{{$sitedetails->twitter_card}}">
        <meta name="twitter:title" content="{{$sitedetails->twitter_title}}">
        <meta name="twitter:image" content="{{ asset('admin/siteImage/twitter-image/'.$sitedetails->twitter_image) }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/siteImage/favicon/'.$sitedetails->favicon) }}">
        <link rel="preconnect" href="https://fonts.googleapis.com/" >
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;800;900&amp;family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700;9..40,800;9..40,900&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body>
        <div class="sidemenu-wrapper sidemenu-info">
            <div class="sidemenu-content">
                <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
                <div class="widget">
                    <div class="th-widget-about">
                        <div class="about-logo">
                            <a href="{{ route('frontend.index') }}"><img src="{{ asset('admin/siteImage/logo/'.$sitedetails->logo) }}" alt="logo"></a>
                        </div>
                        <p class="about-text">{{ $sitedetails->site_about }}</p>
                        <div class="th-social">
                            <a href="{{ $sitedetails->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $sitedetails->twitter }}"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $sitedetails->instagram }}"><i class="fab fa-instagram"></i></a>
                            <a href="{{ $sitedetails->youtube }}"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="widget">
                    <h3 class="widget_title">Contact Us</h3>
                    <div class="th-widget-contact">
                        <div class="info-box">
                            <div class="info-box_icon"><i class="fas fa-location-dot"></i></div>
                            <p class="info-box_text"> {{ $sitedetails->address }}</p>
                        </div>
                        <div class="info-box">
                            <div class="info-box_icon"><i class="fas fa-phone"></i></div>
                            <p class="info-box_text">
                                <a href="tel:91{{$sitedetails->phone}}" class="info-box_link">91 {{$sitedetails->phone}}</a></p>
                        </div>
                        <div class="info-box">
                            <div class="info-box_icon"><i class="fas fa-phone"></i></div>
                            <p class="info-box_text">
                                <a href="tel:+91{{$sitedetails->whatsapp}}" class="info-box_link">+91 {{$sitedetails->whatsapp}}</a></p>
                        </div>
                        {{-- <div class="info-box">
                            <div class="info-box_icon"><i class="fas fa-phone"></i></div>
                            <p class="info-box_text">
                                <a href="tel:+917382287979" class="info-box_link">+91 7382287979</a></p>
                        </div> --}}

                        <div class="info-box">
                            <div class="info-box_icon"><i class="fas fa-envelope"></i></div>
                            <p class="info-box_text"><a href="mailto:{{$sitedetails->email}}" class="info-box_link">{{$sitedetails->email}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="popup-search-box">
            <button class="searchClose"><i class="fal fa-times"></i></button>
            <form action="#">
                <input type="text" placeholder="What are you looking for?"> <button type="submit"><i class="fal fa-search"></i></button>
            </form>
        </div> -->
        <div class="th-menu-wrapper">
            <div class="th-menu-area text-center">
                <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo">
                    <a href="{{ route('frontend.index') }}">
                        <img src="{{ asset('admin/siteImage/logo/'.$sitedetails->logo) }}" alt="logo">
                    </a>
                </div>
                <div class="th-mobile-menu">
                    <ul>
                        <li>
                            <a href="{{ route('frontend.index') }}">Home</a></li>
                            <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                            <li>
                                <a href="{{ route('frontend.service') }}">Our Service</a>
                            </li>

                            <li><a href="{{route('frontend.contact')}}">Contact Us</a></li>

                            <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <header class="th-header header-layout1">
                <div class="header-top">
                    <div class="container th-container">
                        <div class="row justify-content-center justify-content-lg-between align-items-center">
                            <div class="col-auto d-none d-md-block">
                                <div class="header-links style2">
                                    <p class="header-notice text-theme">{{ $sitedetails->site_about }}</p>
                                    <ul>
                                        <li><i class="fa-solid fa-phone"></i> <a href="tel:{{ $sitedetails->phone }}">{{ $sitedetails->phone }}</a></li>
                                        <li><i class="fa-solid fa-phone"></i> <a href="tel:{{ $sitedetails->phone }}">{{ $sitedetails->whatsapp }}</a></li>
                                      
                                        <li><i class="fa-solid fa-envelope"></i> <a href="{{ $sitedetails->email }}">{{ $sitedetails->email }}</a></li>
                                        <li class="d-none d-xl-inline-block"><i class="fa-solid fa-clock"></i> <span>{{ $sitedetails->open_timing }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="social-links">
                                    <span class="social-title">Follow Us On:</span>
                                    <a href="{{ $sitedetails->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ $sitedetails->twitter }}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{ $sitedetails->instagram }}"><i class="fab fa-instagram"></i></a>
                                    <a href="{{ $sitedetails->youtube }}"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-wrapper">
                    <div class="container th-container">
                        <div class="menu-area">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <div class="header-logo">
                                        <a href="{{ route('frontend.index') }}">
                                            <img src="{{ asset('admin/siteImage/logo/'.$sitedetails->logo) }}" alt="Logo" width="200">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto m-lg-auto">
                                    <nav class="main-menu d-none d-lg-inline-block">
                                        <ul>
                                            <li>
                                                <a href="{{ route('frontend.index') }}">Home</a></li>
                                                <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                                                <li>
                                                    <a href="{{ route('frontend.service') }}">Our Service</a>
                                                </li>
                                                <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                                            </ul>
                                        </nav>
                                        <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                                    </div>
                                    <div class="col-auto d-none d-xl-block">
                                        <div class="header-button">
                                            <a href="#" class="icon-btn sideMenuToggler d-none d-lg-block"><i class="far fa-bars"></i></a>
                                            <a href="{{ route('frontend.contact') }}" class="th-btn style4 th-radius">Get in touch</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>