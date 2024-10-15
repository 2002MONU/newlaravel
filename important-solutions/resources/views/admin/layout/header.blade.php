@php
   
   $site_setting = \App\Models\SiteSetting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{$site_setting->site_name}}| @yield('title')  </title>
      <!-- Meta -->
      <meta name="description" content="Skanda Exports and Imports">
      <meta name="keywords" content="Skanda Exports and Imports">
      <meta property="og:title" content="Skanda Exports and Imports">
      <meta property="og:description" content="Skanda Exports and Imports">
      <meta property="og:type" content="Website">
      <link rel="shortcut icon" href="{{asset('assets/dynamics/setting/'.$site_setting->favicon)}}">
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
            <a href="" class="d-lg-block d-none">
            <img src="{{asset('assets/dynamics/setting/'.$site_setting->header_logo)}}" class="logo" alt="important-solution">
            </a>
            <a href="" class="d-lg-none d-md-block">
                <img src="{{asset('assets/dynamics/setting/'.$site_setting->footer_logo)}}" class="logo" alt="important-solution" style="
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
            <img src="{{asset('dash_assets/admin_icon.png')}}" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
            <div class="m-0">
               <h5 class="mb-1 profile-name text-nowrap text-truncate">Admin</h5>
            </div>
         </div>
         <!-- Sidebar profile ends -->
         <!-- Sidebar menu starts -->
         <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
               <li class="  {{ request()->routeIs('admin.dashboard') ? 'current-page' : '' }}">
                  <a href="{{route('admin.dashboard')}}">
                  <i class="ri-home-6-line"></i>
                  <span class="menu-text"> Dashboard</span>
                  </a>
               </li>
               <li class="treeview {{ request()->routeIs('homepages.*','abouts.*','ourvisions.*') ? 'current-page' : '' }}">
                  <a href="#!">
                  <i class="ri-home-5-line"></i>
                  <span class="menu-text">Home</span>
                  </a>
                  <ul class="treeview-menu">
                     <li>
                        <a href="{{route('homepages.index')}}">Slider Details</a>
                     </li>
                     <li>
                        <a href="{{route('abouts.index')}}"> About</a>
                     </li>
                     <li>
                        <a href="{{route('ourvisions.index')}}">Vision & Mission</a>
                     </li>
                  </ul>
               </li>
               <li class="{{ request()->routeIs('services.*') ? 'current-page' : '' }}">
                  <a href="{{route('services.index')}}">
                  <i class="ri-gallery-fill "></i>
                  <span class="menu-text">Services</span>
                  </a>
               </li>
               <li class="{{ request()->routeIs('blogdetails.*') ? 'current-page' : '' }}">
                  <a href="{{route('blogdetails.index')}}">
                  <i class="ri-seo-line"></i>
                  <span class="menu-text">Blog Details</span>
                  </a>
               </li>
               
               <li class=" {{ request()->routeIs('contacts.*') ? 'current-page' : '' }}">
                  <a href="{{route('contacts.index')}}">
                  <i class="ri-contacts-book-3-line "></i>
                  <span class="menu-text"> Contact Details
                  </span>
                  </a>
               </li>
              
               <li class=" {{ request()->routeIs('admin.contact-enquiry') ? 'current-page' : '' }}">
                  <a href="{{route('admin.contact-enquiry')}}">
                  <i class="ri-contacts-book-3-line "></i>
                  <span class="menu-text"> Enquiry Message
                  </span>
                  </a>
               </li>
               <li class="treeview {{ request()->routeIs('sitesettings.*','seosettings.*','sociallinks.*','admin.change-password') ? 'current-page' : '' }}" >
                  <a href="#!">
                  <i class="ri-settings-fill"></i>
                  <span class="menu-text">Setting</span>
                  </a>
                  <ul class="treeview-menu">
                      <li>
                        <a href="{{route('seosettings.index')}}">SEO Setting</a>
                     </li>
                   <li>
                        <a href="{{route('sitesettings.index')}}">Site Setting</a>
                     </li>
                     <li>
                        <a href="{{route('sociallinks.index')}}">Social Link</a>
                     </li> 
                     <li>
                        <a href="{{route('admin.change-password')}}">Change Password</a>
                     </li>
                  </ul>
               </li>
               <li class="{{ request()->routeIs('admin.logs') ? 'current-page' : '' }}">
                  <a href="{{route('admin.logs')}}">
                  <i class="ri-phone-lock-line"></i>
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