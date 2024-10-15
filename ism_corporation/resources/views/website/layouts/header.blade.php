@php
    $site_setting = \App\Models\SiteSetting::find(1);
    $path = request()->path();
    $seo_details = \App\Models\SEO::where('page_name', $path)->first();
    $title = $description = $keywords = '';
    if ($seo_details != '') {
        $title = $seo_details->title;
        $description = $seo_details->description;
        $keywords = $seo_details->keywords;
    }

    $meta_tags = \App\Models\MetaTag::find(1);
@endphp
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$site_setting->site_name}} | {{$title}}</title>
    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">
    <meta property="og:description" content="{{$meta_tags->og_description}}">
    <meta property="og:image" content="{{asset('assets/dynamics/setting/'.$meta_tags->og_image)}}">
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
    <meta name="twitter:image" content="{{asset('assets/dynamics/setting/'.$meta_tags->twitter_image)}}">
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="{{$description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/dynamics/setting/'.$site_setting->favicon)}}">
    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600&amp;display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/dlicon.css')}}">
    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/odometer-theme-default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/ddbeforeandafter.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>
<header class="header-area header-transparent-bar sticky-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-8">
                <div class="logo">
                    <a href="{{route('home.index')}}">
                        <img class="white-logo" src="{{asset('assets/dynamics/setting/'.$site_setting->header_logo)}}" alt="logo">
                        <img class="black-logo" src="{{asset('assets/dynamics/setting/'.$site_setting->header_logo)}}" alt="logo">
                    </a>
                    <button class="navbar-toggler hidden-md visible-xs" type="button" data-toggle="collapse" onclick="openNav()" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block d-flex justify-content-between">
                <div class="main-menu" style="text-align: end;">
                    <nav>
                        <ul>
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li><a href="#">Our Company</a>
                                <ul class="sub-menu-style">
                                    <li><a href="{{route('home.who-we-are')}}">Who we are</a></li>
                                    <li><a href="{{route('home.vision')}}">Vision</a></li>
                                    <li><a href="{{route('home.management')}}">Management</a></li>
                                    <li><a href="{{route('home.pharmacovigilance')}}">Pharmacovigilance</a></li>
                                </ul>
                            </li>
                                
                            <li><a href="#">Products</a>
                                <ul class="sub-menu-style">
                                    <li><a href="{{route('home.otc')}}">OTC</a></li>
                                    <li><a href="{{route('home.ethical')}}">Ethical</a></li>
                                    <li><a href="{{route('home.institutional')}}">Institutional </a></li>
                                </ul>
                            </li>
                            <li><a href="#">Exports</a>
                                <ul class="sub-menu-style">
                                    <li><a href="{{route('home.world-map')}}">World Map</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Careers</a>
                                <ul class="sub-menu-style">
                                    <li><a href="{{route('home.current-job')}}">Current job  opportunities</a></li>
                                    <li><a href="{{route('home.reach-out')}}">Reach out HR</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('home.contact-us')}}">Contact us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
                
        </div>
    </div>
</header>

<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	<li><a class="nav-link" href="{{route('home.index')}}">Home</a></li>
	<li>
		<a data-bs-toggle="collapse" href="#demo2">Our Company<i style="float: right;" class="fa fa-chevron-down"></i></a>
		<ul id="demo2" class="collapse">
            <li><a href="{{route('home.who-we-are')}}">Who we are</a></li>
            <li><a href="{{route('home.vision')}}">Vision</a></li>
            <li><a href="{{route('home.management')}}">Management</a></li>
            <li><a href="{{route('home.pharmacovigilance')}}">Pharmacovigilance</a></li>
		</ul>
	</li>
	<li>
		<a data-bs-toggle="collapse" href="#demo1">Products <i style="float: right;" class="fa fa-chevron-down"></i></a>
		<ul id="demo1" class="collapse">
            <li><a href="{{route('home.otc')}}">OTC</a></li>
            <li><a href="{{route('home.ethical')}}">Ethical</a></li>
            <li><a href="{{route('home.ethical')}}">Institutional </a></li>
		</ul>
	</li>
    <li>
		<a data-bs-toggle="collapse" href="#demo3">Exports <i style="float: right;" class="fa fa-chevron-down"></i></a>
		<ul id="demo3" class="collapse">
            <li><a href="{{route('home.world-map')}}">World Map</a></li>
		</ul>
	</li>
    <li>
		<a data-bs-toggle="collapse" href="#demo4">Careers <i style="float: right;" class="fa fa-chevron-down"></i></a>
		<ul id="demo4" class="collapse">
            <li><a href="{{route('home.current-job')}}">Current job  opportunities</a></li>
            <li><a href="{{route('home.reach-out')}}">Reach out HR</a></li>
		</ul>
	</li>
	<li><a class="nav-link" href="{{route('home.contact-us')}}">Contact Us</a></li>
</div>
<style>
.navbar-toggler {
	display: none;
}
.sidenav {
	display: none;
}

@media only screen and (max-width: 767px) {
  .sidenav {
    padding-top: 15px;
    display: block;
  }
  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 19999;
    top: 0;
    left: 0;
    background: #202020;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 50px;
    text-align: left;
  }
  /* .sidenav::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: #00000030;
  } */
  .sidenav a {
    padding: 10px 10px 10px 22px;
    text-decoration: none;
    font-size: 15px;
    color: #fff;
    display: block;
    transition: 0.3s;
  }
  .navbar-toggler {
        position: absolute;
        background: transparent;
        top: 7px;
        right: 16px;
        z-index: 1000;
        color: black;
        display: block;
        width: 38px;
        height: 38px;
        border-radius: 100px;
    }
  a.closebtn {
    position: absolute;
    top: -15px;
    right: 10px;
    font-size: 30px;
  }
  #mySidenav li {
    list-style: none;
    border-bottom: 1px solid #343434;
  }
  .collapse li a {
      background: #1c2c71;
      font-size: 13px;
      padding-left: 40px;
  }
}
</style>
