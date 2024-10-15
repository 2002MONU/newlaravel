@php
   $sliderVideo = \App\Models\SliderVideo::find(1);
   $homeAbout = \App\Models\HomeAbout::find(1);
   $howItWork = \App\Models\HowItWork::find(1);
   $achievement = \App\Models\Achievement::find(1);
   $contact = \App\Models\ContactDetail::find(1);
   $about = \App\Models\About::find(1);
   $homeWhyChoose = \App\Models\HomeWhyChoose::find(1);
   $site_setting = \App\Models\SiteSetting::find(1);
   $sidevideo = \App\Models\SideVideo::find(1);
   $desclaimer = \App\Models\Disclaimer::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> {{$site_setting->site_name}} | @yield('title')  </title>
      <!-- Meta -->
      <meta name="description" content="Karunya Developers">
      <meta name="keywords" content="Karunya Developers">
      <meta property="og:title" content="Karunya Developers">
      <meta property="og:description" content="Karunya Developers">
      <meta property="og:type" content="Website">
      <link rel="shortcut icon" href="{{asset('assets/dynamics/'.$site_setting->favicon)}}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"  >
      <!-- *************
         ************ CSS Files *************
         ************* -->
      <link rel="stylesheet" href="{{asset('dash_assets/fonts/remix/remixicon.css')}}">
      <link rel="stylesheet" href="{{asset('dash_assets/css/main.min.css')}}">
      <link rel="stylesheet" href="{{asset('dash_assets/vendor/datatables/dataTables.bs5.css')}}">
      <link rel="stylesheet" href="{{asset('dash_assets/vendor/datatables/dataTables.bs5-custom.css')}}">
      <link rel="stylesheet" href="{{asset('dash_assets/vendor/datatables/buttons/dataTables.bs5-custom.css')}}">
      <!-- *************
         ************ Vendor Css Files *************
         ************ -->
      <!-- Scrollbar CSS -->
      <link rel="stylesheet" href="{{asset('dash_assets/vendor/overlay-scroll/OverlayScrollbars.min.css')}}">
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
   </head>
  
   <body>
      <!-- Loading starts -->
      <div id="loading-wrapper">
         <div class='spin-wrapper'>
            <div class='spin'>
               <div class='inner'></div>
            </div>
            <div class='spin'>
               <div class='inner'></div>
            </div>
            <div class='spin'>
               <div class='inner'></div>
            </div>
            <div class='spin'>
               <div class='inner'></div>
            </div>
            <div class='spin'>
               <div class='inner'></div>
            </div>
            <div class='spin'>
               <div class='inner'></div>
            </div>
         </div>
      </div>
      <!-- Loading ends -->
      <!-- Page wrapper starts -->
      <div class="page-wrapper">
      <!-- App header starts -->
      <div class="app-header d-flex align-items-center">
         <!-- Toggle buttons starts -->
         <div class="d-flex">
            <button class="toggle-sidebar">
            <i class="ri-menu-line"></i>
            </button>
            <button class="pin-sidebar">
            <i class="ri-menu-line"></i>
            </button>
         </div>
         <!-- Toggle buttons ends -->
         <!-- App brand starts -->
         <div class="app-brand ms-3">
            <a href="{{route('admin.dashboard')}}" class="d-lg-block d-none bg-white p-1">
            <img  src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" class="logo" alt="logo ">
            </a>
            <a href="{{route('admin.dashboard')}}" class="d-lg-none d-md-block bg-white p-1">
                <img src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" class="logo" alt="logo" style="
                max-width: 141px;
                max-height: 53px;
">
            </a>
         </div>
         <!-- App brand ends -->
         <!-- App header actions starts -->
         <div class="header-actions">
            <!-- Header user settings starts -->
            <div class="dropdown ms-2">
               <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="avatar-box">Admin</div>
               </a>
               <div class="dropdown-menu dropdown-menu-end shadow-lg">
                  <div class="px-3 py-2">
                    
                  </div>
                  {{-- <div class="mx-2 my-2 d-grid">
                     <a href="" class="btn btn-danger">Change-password</a>
                  </div> --}}
                  <div class="mx-3 my-2 d-grid">
                     <a href="{{route('admin.logout')}}" class="btn btn-danger">Logout</a>
                  </div>
               </div>
            </div>
            <!-- Header user settings ends -->
         </div>
         <!-- App header actions ends -->
      </div>
      <!-- App header ends -->
      <!-- Main container starts -->
      <div class="main-container">
      <!-- Sidebar wrapper starts -->
      <nav id="sidebar" class="sidebar-wrapper">
         <!-- Sidebar profile starts -->
         <div class="sidebar-profile">
            <img src="{{asset('dash_assets/admin_icon.png')}}" class="img-shadow img-3x me-3 rounded-5" alt="vizag bikes cars">
            <div class="m-0">
               <h5 class="mb-1 profile-name text-nowrap text-truncate">Admin</h5>
            </div>
         </div>
         <!-- Sidebar profile ends -->
         <!-- Sidebar menu starts -->
         <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
               <li class="{{ request()->routeIs('admin.dashboard') ? 'current-page' : '' }}">
                  <a href="{{route('admin.dashboard')}}">
                  <i class="ri-home-6-line"></i>
                  <span class="menu-text"> Dashboard</span>
                  </a>
               </li>
               <li class="treeview {{ request()->routeIs('slider-videos.*','sliders.*','home-abouts.*','how-we-works.*','achievements.*','home-three-points.*','home-why-chooses.*') ? 'current-page active' : '' }}">
                  <a href="#!">
                  <i class="ri-home-5-line"></i>
                  <span class="menu-text">Home</span>
                  </a>
                  <ul class="treeview-menu">
                   <li class="">
                        <a class="{{ request()->routeIs('slider-videos.*') ? ' active-sub' : '' }}" href="{{route('slider-videos.edit',$sliderVideo->id)}}">Slider Video</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('sliders.*') ? ' active-sub' : '' }}" href="{{route('sliders.index')}}">Slider Text</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('home-abouts.*') ? ' active-sub' : '' }}" href="{{route('home-abouts.edit',$homeAbout->id)}}">Home About details</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('how-we-works.*') ? ' active-sub' : '' }}" href="{{route('how-we-works.edit',$howItWork->id)}}">How it Work</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('achievements.*') ? ' active-sub' : '' }}" href="{{route('achievements.edit',$achievement->id)}}">Achievements</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('home-three-points.*') ? ' active-sub' : '' }}" href="{{route('home-three-points.index')}}">Home-Three-Points</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('home-why-chooses.*') ? ' active-sub' : '' }}" href="{{route('home-why-chooses.edit',$homeWhyChoose->id)}}">Why-Choose-Us</a>
                     </li>
                    
                  </ul>
               </li>
               <li class="treeview {{ request()->routeIs('teams.*','abouts.*','why-choose-us.*','beautiful-creations.*') ? 'current-page active' : '' }}">
                  <a href="#!">
                  <i class="ri-font-family"></i>
                  <span class="menu-text">About</span>
                  </a>
                  <ul class="treeview-menu">
                     <li>
                        <a class="{{ request()->routeIs('abouts.*') ? ' active-sub' : '' }}" href="{{route('abouts.edit',$about->id)}}"> About details</a>
                     </li>
                     <li >
                        <a class="{{ request()->routeIs('teams.*') ? ' active-sub' : '' }}" href="{{route('teams.index')}}">Team</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('why-choose-us.*') ? ' active-sub' : '' }}" href="{{route('why-choose-us.index')}}">Why Choose Us </a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('beautiful-creations.*') ? ' active-sub' : '' }}" href="{{route('beautiful-creations.index')}}">Beautiful Creations</a>
                     </li>
                  </ul>
               </li>
                <li class="{{ request()->routeIs('blogs.*') ? 'current-page' : '' }}">
                  <a href="{{route('blogs.index')}}">
                  <i class="ri-seo-line"></i>
                  <span class="menu-text">Blog</span>
                  </a>
               </li>
               <li class="{{ request()->routeIs('galleries.*') ? 'current-page' : '' }}">
                  <a href="{{route('galleries.index')}}">
                 <i class="ri-contacts-fill"></i>
                  <span class="menu-text">Gallery </span>
                  </a>
               </li>
              <li class=" {{ request()->routeIs('project-details.*') ? 'current-page' : '' }}">
                  <a href="{{route('project-details.index')}}">
                  <i class="ri-projector-fill"></i>
                  <span class="menu-text"> Project Details
                  </span>
                  </a>
               </li>
              
                <li class=" {{ request()->routeIs('testimonials.*') ? 'current-page' : '' }}">
                  <a href="{{route('testimonials.index')}}">
                  <i class="ri-contacts-book-3-line "></i>
                  <span class="menu-text">Testimonials
                  </span>
                  </a>
               </li>
               
                <li class="{{ request()->routeIs('contact-details.*') ? 'current-page' : '' }}">
                  <a href="{{route('contact-details.edit',$contact->id)}}">
                     <i class="ri-product-hunt-fill"></i>
                  <span class="menu-text">Contact Details</span>
                  </a>
               </li>
               <li class=" {{ request()->routeIs('join-with-us.*') ? 'current-page' : '' }}">
                  <a href="{{route('join-with-us.index')}}">
                    <i class="ri-save-2-line"></i>
                  <span class="menu-text">Join With Us
                  </span>
                  </a>
               </li>
               <li class=" {{ request()->routeIs('admin.side-video') ? 'current-page' : '' }}">
                  <a href="{{route('admin.side-video',$sidevideo->id)}}">
                    <i class="ri-cpu-line"></i>
                  <span class="menu-text">Side Video
                  </span>
                  </a>
               </li>
               <li class=" {{ request()->routeIs('admin.edit-disclaimer') ? 'current-page' : '' }}">
                  <a href="{{route('admin.edit-disclaimer',$desclaimer->id)}}">
                    <i class="ri-hard-drive-line"></i>
                  <span class="menu-text">Desclaimer
                  </span>
                  </a>
               </li>
                <li class=" {{ request()->routeIs('admin.enuiry-message') ? 'current-page' : '' }}">
                  <a href="{{route('admin.enuiry-message')}}">
                    <i class="ri-contacts-fill"></i>
                  <span class="menu-text"> Contact  Message
                  </span>
                  </a>
               </li>  
                <li class=" {{ request()->routeIs('admin.apply-message') ? 'current-page' : '' }}">
                  <a href="{{route('admin.apply-message')}}">
                    <i class="ri-folder-image-line"></i>
                  <span class="menu-text"> Apply  Message
                  </span>
                  </a>
               </li>  
               <li class="treeview {{ request()->routeIs('seosettings.*','sitesettings.*','admin.change-password','sociallinks.*','metatags.*') ? 'current-page active' : '' }}" >
                  <a href="#!">
                  <i class="ri-settings-fill"></i>
                  <span class="menu-text">Settings</span>
                  </a>
                  <ul class="treeview-menu">
                       <li>
                        <a class="{{ request()->routeIs('seosettings.*') ? ' active-sub' : '' }}" href="{{route('seosettings.index')}}">SEO Setting</a>
                     </li>
                    
                     <li>
                        <a class="{{ request()->routeIs('sitesettings.*') ? ' active-sub' : '' }}" href="{{route('sitesettings.index')}}">Site Settings</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('metatags.*') ? ' active-sub' : '' }}" href="{{route('metatags.index')}}">Meta Tags </a>
                     </li> 
                     <li>
                        <a class="{{ request()->routeIs('sociallinks.*') ? ' active-sub' : '' }}" href="{{route('sociallinks.index')}}">Social Link</a>
                     </li>
                   <li >
                        <a class="{{ request()->routeIs('admin.change-password') ? ' active-sub' : '' }}" href="{{route('admin.change-password')}}">Change Password</a>
                     </li>
                  </ul>
               </li>
               
               <li class="{{ request()->routeIs('admin.logs-details') ? 'current-page' : '' }}">
                  <a href="{{route('admin.logs-details')}}">
                 <i class="ri-logout-circle-r-fill"></i>
                  <span class="menu-text">Admin Logs</span>
                  </a>
               </li>
               <li class="{{ request()->routeIs('admin.logout') ? 'current-page' : '' }}">
                  <a href="{{route('admin.logout')}}">
                  <i class="ri-arrow-left-circle-fill"></i>
                  <span class="menu-text">Logout</span>
                  </a>
               </li>
            </ul>
         </div>
         <!-- Sidebar menu ends -->
      </nav>
      <!-- Sidebar wrapper ends -->
      <div class="app-container">
         