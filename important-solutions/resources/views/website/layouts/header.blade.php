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
@endphp
<!doctype html>
<html  lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>{{$site_setting->site_name}} | {{$title}}</title>
      <meta name="author" content="Important Solutions">
      <meta name="robots" content="INDEX,FOLLOW">
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <meta name="description" content="{{$description}}">
      <meta name="keywords" content="{{$keywords}}">
      <!-- SOCIAL MEDIA META -->
      <meta property="og:description" content="{{$description}}s">
      <meta property="og:image" content="{{asset('assets/dynamics/setting/'.$site_setting->footer_logo)}}">
      <meta property="og:site_name" content="{{$site_setting->site_name}}">
      <meta property="og:title" content=" {{$title}}">
      <meta property="og:type" content="website">
      <meta property="og:url" content="">
      <!-- TWITTER META -->
      <meta name="twitter:card" content="summary">
      <meta name="twitter:site" content="@Important Solutions">
      <meta name="twitter:creator" content="@Important Solutions">
      <meta name="twitter:title" content="Important Solutions">
      <meta name="twitter:description" content="Important Solutions">
      <meta name="twitter:image" content="">
      <link rel="icon" type="image/x-icon" href="{{asset('assets/dynamics/setting/'.$site_setting->favicon)}}">
      <link rel="manifest" href="assets/img/fav-icon.png">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      <link rel="preconnect" href="https://fonts.googleapis.com/">
      <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      <meta name="csrf-token" content="{{ csrf_token() }}">
   </head>
   <body>
      <div class="th-menu-wrapper">
         <div class="th-menu-area text-center">
            <button class="th-menu-toggle">
            <i class="fal fa-times"></i>
            </button>
            <div class="mobile-logo">
               <a href="{{route('home.index')}}">
               <img width="200" src="{{asset('assets/dynamics/setting/'.$site_setting->footer_logo)}}" alt="Important Solutions">
               </a>
            </div>
            <div class="th-mobile-menu">
               <ul>
                  <li >
                     <a href="{{route('home.index')}}">Home</a>
                  </li>
                  <li>
                     <a href="{{route('home.about-us')}}">About Us</a>
                  </li>
                  <li >
                     <a href="{{route('home.services')}}">Services</a>
                  </li>
                  <li  >
                     <a href="{{route('home.blog')}}">Blog</a>
                  </li>
                  <li>
                     <a href="{{route('home.contact')}}">Contact Us</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <header class="th-header header-default">
         <div class="sticky-wrapper">
            <div class="menu-area">
               <div class="container">
                  <div class="row align-items-center justify-content-between">
                     <div class="col-auto">
                        <div class="header-logo">
                           <a href="{{route('home.index')}}">
                           <img src="{{asset('assets/dynamics/setting/'.$site_setting->header_logo)}}">
                           </a>
                        </div>
                     </div>
                     <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                           <ul>
                              <li >
                                 <a href="{{route('home.index')}}">Home</a>
                              </li>
                              <li>
                                 <a href="{{route('home.about-us')}}">About Us</a>
                              </li>
                              <li>
                                 <a href="{{route('home.services')}}">Services</a>
                              </li>
                              <li>
                                 <a href="{{route('home.blog')}}">Blog</a>
                              </li>
                              <li>
                                 <a href="{{route('home.contact')}}">Contact Us</a>
                              </li>
                           </ul>
                        </nav>
                        <div class="header-button d-flex d-lg-none">
                           <button type="button" class="th-menu-toggle"><i class="far fa-bars"></i></button>
                        </div>
                     </div>
                     <div class="col-auto d-none d-xl-block">
                        <div class="header-button  ">
                           <button   type="button"   data-bs-toggle="modal" data-bs-target="#exampleModal" class="simple-icon ">
                           Get a Quote
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>