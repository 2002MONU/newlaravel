@php
   $site_setting = \App\Models\SiteSetting::find(1);
    $path = request()->path();
    $seo_details = \App\Models\SeoSetting::where('page_name', $path)->first();
    $title = $description = $keywords = '';
    if ($seo_details != '') {
        $title = $seo_details->title;
        $description = $seo_details->description;
        $keywords = $seo_details->keywords;
    }
$social = \App\Models\SocilaLink::find(1);
$meta_tags = \App\Models\MetaTag::find(1);
@endphp
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$site_setting->site_name}} | {{ $title }}</title>
    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">
     <meta property="og:description" content="{{$meta_tags->og_description}}">
    <meta property="og:image" content="{{asset('assets/dynamics/'.$meta_tags->og_image)}}">
    <meta property="og:site_name" content="{{$meta_tags->og_site_name}}">
    <meta property="og:title" content="{{$meta_tags->og_title}}">
    <meta property="og:type" content="{{$meta_tags->og_type}}">
    <meta property="og:url" content="{{$meta_tags->og_url}}">
    <!-- TWITTER META -->
    <meta name="twitter:card" content="{{$meta_tags->twitter_card}}">
    <meta name="twitter:site" content="{{$meta_tags->twitter_site}}">
    <meta name="twitter:creator" content="{{$meta_tags->twitter_creator}}">
    <meta name="twitter:title" content="{{$meta_tags->twitter_title}}">
    <meta name="twitter:description" content="{{$meta_tags->twitter_description}}">
    <meta name="twitter:image" content="{{asset('assets/dynamics/'.$meta_tags->twitter_image)}}"> 
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="{{$description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/dynamics/'.$site_setting->favicon)}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <!-- FlatIcon CSS -->
    <link rel="stylesheet" href="{{asset('assets/font/flaticon.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- Nivo Slider CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/slider/css/nivo-slider.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/OwlCarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/OwlCarousel/owl.theme.default.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
   
    <!-- Modernize js -->
    <script src="{{asset('assets/js/modernizr-3.7.1.min.js')}}"></script>
</head>
<script>
    var homeUrl = "{{ route('home.index') }}";
</script>
<body class="sticky-header">
  
    <a href="#wrapper" data-type="section-switch" class="scrollup">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <!-- ScrollUp End Here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper">
        <!-- Add your site or application content here -->
        <!-- Header Area Start Here -->
        
         <header class="header">
            <div id="header-topbar" class="bg-Primary ">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6">
                            <div class="header-topbar-layout1 pt-20 pb-20">
                                <ul class="header-top-left">
                                    <li class="social-icon">
                                        <a href="{{$social->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{$social->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="{{$social->google_plus}}" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="{{$social->pinerent}}" target="_blank"><i class="fab fa-pinterest"></i></a>
                                        <a href="{{$social->spanchat}}"  target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header-topbar-layout1 pt-20 pb-20">
                                <ul class="header-top-right">
                                    <li class="opening-hour"><i class="far fa-clock"></i>{{$social->open_time}}</li>
                                </ul>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
            <div id="rt-sticky-placeholder"></div>
            <div id="header-menu" class="header-menu menu-layout1">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo-area sns-img">
                                <a href="{{route('home.index')}}" class="temp-logo ">
                                    <img src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" alt="logo" class="img-fluid ">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-flex justify-content-end position-static">
                            <nav id="dropdown" class="template-main-menu" data-home-url="{{ route('home.index') }}">
                                <ul>

                                   <li>
                                        <a href="{{route('home.index')}}">Home</a>
                                     </li>
                                    <li>
                                        <a href="{{route('home.about')}}">About</a>
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
                                    <li>
                                        <div class=" d-lg-none d-sm-block">
                                    <button type="button" data-toggle="modal" data-target=".bd-example-modal-sm" style="background: #042175;
    width: 100%;
    color: white;
    padding: 10px;
    margin: 10px 0px;">Enquiry</button>
                                        </div>
                                        </li>
                                </ul>
                            </nav>
                        </div>
                        <div class=" col-xl-4 col-lg-3 d-flex justify-content-end">
                            <div class="header-action-layout1">
                                    <button type="button" class="login-button btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Enquiry</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
