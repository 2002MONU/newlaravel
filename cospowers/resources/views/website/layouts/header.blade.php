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
$social = \App\Models\SocialLink::find(1);
$meta_tags = \App\Models\MetaTag::find(1);
@endphp
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">

    <!-- SOCIAL MEDIA META -->
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
    <title>{{$site_setting->site_name}} | {{ $title }}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/dynamics/'.$site_setting->favicon)}}" type="image/x-icon">
   <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- fontawesome icon  -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- aos scoll animation css -->
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet"  href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
</head>
    <body>

        <!-- header begin -->
        <div class="header">
            <div class="container this-container">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-3 d-xl-flex d-lg-flex d-block align-items-center">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-7 d-xl-block d-lg-block d-flex align-items-center">
                                <div class="logo">
                                    <a href="{{route('home.index')}}">
                                        <img width="200" src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-5 d-xl-none d-lg-none d-block">
                                <div class="mobile-toggle">
                                     <span onclick="openNav()">
                                      <i class="fas fa-bars"></i>
                               </span>   
                                </div>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="mainmenu">
                            <nav class="navbar navbar-expand-lg">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link active" href="{{route('home.index')}}">
                                                  Home
                                                </a>
                                            </li>
                                              <li class="nav-item active">
                                                <a class="nav-link" href="{{route('home.about')}}">About Us</a>
                                            </li>  
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{route('home.product')}}">Products</a>
                                            </li>
                                             <li class="nav-item active">
                                                <a class="nav-link" href="{{route('home.services')}}">Services</a>
                                            </li>
                                             <li class="nav-item active">
                                                <a class="nav-link" href="{{route('home.news')}}">News</a>
                                            </li>
                                             <li class="nav-item active">
                                                <a class="nav-link" href="{{route('home.careers')}}">Careers </a>
                                            </li>
                                              <li class="nav-item active">
                                                <a class="nav-link" href="{{route('home.downloads')}}">Downloads</a>
                                            </li>
                                             <li class="nav-item">
                                                <a class="nav-link" href="{{route('home.contact')}}">Contact Us</a>
                                            </li>
                                        </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- header end --> 

        <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <ul>
               <li  >
                         <a class="nav-link active" href="{{route('home.index')}}">
                                                  Home
                                                </a>
                                                 
                                            </li>
                                              <li  >
                                                <a class="nav-link" href="{{route('home.about')}}">About Us</a>
                                            </li>  
                                            <li  >
                                                <a class="nav-link" href="{{route('home.product')}}">Products</a>
                                            </li>
                                             <li  >
                                                <a class="nav-link" href="{{route('home.services')}}">Services</a>
                                            </li>
                                             <li  >
                                                <a class="nav-link" href="{{route('home.news')}}">News</a>
                                            </li>
                                             <li >
                                                <a class="nav-link" href="{{route('home.careers')}}">Careers </a>
                                            </li>
                                              <li  >
                                                <a class="nav-link" href="{{route('home.downloads')}}">Downloads</a>
                                            </li>
                                                                                     
                                            <li >
                                                <a class="nav-link" href="{{route('home.contact')}}">Contact Us</a>
                                            </li>
          </ul>    
         </div>