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
      <meta name="description" content="ISM Corporation pvt.ltd">
      <meta name="keywords" content="ISM Corporation pvt.ltd">
      <meta property="og:title" content="ISM Corporation pvt.ltds">
      <meta property="og:description" content="ISM Corporation pvt.ltd">
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
            <img src="{{asset('assets/dynamics/setting/'.$site_setting->footer_logo)}}" class="logo" alt="ISM Corporation ">
            </a>
            <a href="" class="d-lg-none d-md-block">
                <img src="{{asset('assets/dynamics/setting/'.$site_setting->footer_logo)}}" class="logo" alt="ISM Corporation" style="
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
               <li class="{{ request()->routeIs('admin.dashboard') ? 'current-page' : '' }}">
                  <a href="{{route('admin.dashboard')}}">
                  <i class="ri-home-6-line"></i>
                  <span class="menu-text"> Dashboard</span>
                  </a>
               </li>
               <li class="treeview {{ request()->routeIs('homepages.*','homeabouts.*','ourachievements.*') ? 'current-page active' : '' }}">
                  <a href="#!">
                  <i class="ri-home-5-line"></i>
                  <span class="menu-text">Home</span>
                  </a>
                  <ul class="treeview-menu ">
                     <li class="">
                        <a class="{{ request()->routeIs('homepages.*') ? ' active-sub' : '' }}" href="{{route('homepages.index')}}">Slider Details</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('homeabouts.*') ? ' active-sub' : '' }}" href="{{route('homeabouts.index')}}"> About</a>
                     </li>
                     <li>
                        <a class="{{ request()->routeIs('ourachievements.*') ? ' active-sub' : '' }}" href="{{route('ourachievements.index')}}">Our Achievements</a>
                     </li>
                  </ul>
               </li>
               <li class="treeview {{ request()->routeIs('whoweares.*','ourvisions.*','managements.*','pharmas.*','keyelements.*') ? 'current-page active' : '' }}" >
                  <a href="#!">
                  <i class="ri-settings-fill"></i>
                  <span class="menu-text">Our Company</span>
                  </a>
               <ul class="treeview-menu">
                  <li>
                     <a class="{{ request()->routeIs('whoweares.*') ? ' active-sub' : '' }}" href="{{route('whoweares.index')}}">Who we are</a>
                  </li>
                  <li>
                     <a class="{{ request()->routeIs('ourvisions.*') ? ' active-sub' : '' }}" href="{{route('ourvisions.index')}}">Vision</a>
                  </li>
                  <li>
                     <a class="{{ request()->routeIs('managements.*') ? ' active-sub' : '' }}" href="{{route('managements.index')}}">Management</a>
                  </li> 
                  <li>
                     <a class="{{ request()->routeIs('pharmas.*') ? ' active-sub' : '' }}" href="{{route('pharmas.index')}}">Pharmacovigilance</a>
                  </li>
                  <li>
                     <a class="{{ request()->routeIs('keyelements.*') ? ' active-sub' : '' }}" href="{{route('keyelements.index')}}">Key Elements</a>
                  </li>
               </ul>
               </li>
               <li class="treeview  {{ request()->routeIs('otcproducts.*','ethicals.*','institutionals.*') ? 'current-page active' : '' }}" >
                  <a href="#!">
                  <i class="ri-product-hunt-fill"></i>
                  <span class="menu-text">Product</span>
                  </a>
               <ul class="treeview-menu">
                  <li>
                     <a class="{{ request()->routeIs('otcproducts.*') ? ' active-sub' : '' }}" href="{{route('otcproducts.index')}}">OTC</a>
                  </li>
                  <li>
                     <a class="{{ request()->routeIs('ethicals.*') ? ' active-sub' : '' }}" href="{{route('ethicals.index')}}">Ethical</a>
                  </li>
                  <li>
                     <a class="{{ request()->routeIs('institutionals.*') ? ' active-sub' : '' }}" href="{{route('institutionals.index')}}">Institutional</a>
                  </li> 
               </ul>
               </li>
               <li class="{{ request()->routeIs('exports.*') ? 'current-page' : '' }}">
                  <a href="{{route('exports.index')}}">
                  <i class="ri-seo-line"></i>
                  <span class="menu-text">Exports</span>
                  </a>
               </li>
               
               <li class=" {{ request()->routeIs('currentjobs.*') ? 'current-page' : '' }}">
                  <a href="{{route('currentjobs.index')}}">
                  <i class="ri-projector-fill"></i>
                  <span class="menu-text"> Current Jobs Details
                  </span>
                  </a>
               </li>
              
               <li class=" {{ request()->routeIs('contactdetails.*') ? 'current-page' : '' }}">
                  <a href="{{route('contactdetails.index')}}">
                  <i class="ri-contacts-book-3-line "></i>
                  <span class="menu-text"> Contact Details
                  </span>
                  </a>
               </li>
               <li class="treeview {{ request()->routeIs('sitesettings.*','seosettings.*','metatags.*','admin.change-password') ? 'current-page active' : '' }}" >
                  <a href="#!">
                  <i class="ri-settings-fill"></i>
                  <span class="menu-text">Setting</span>
                  </a>
                  <ul class="treeview-menu">
                      <li>
                        <a class="{{ request()->routeIs('seosettings.*') ? ' active-sub' : '' }}" href="{{route('seosettings.index')}}">SEO Setting</a>
                     </li>
                   <li>
                        <a class="{{ request()->routeIs('sitesettings.*') ? ' active-sub' : '' }}" href="{{route('sitesettings.index')}}">Site Setting</a>
                     </li>
                   <li>
                        <a class="{{ request()->routeIs('metatags.*') ? ' active-sub' : '' }}" href="{{route('metatags.index')}}">Meta Tags</a>
                     </li>
                   <li >
                        <a class="{{ request()->routeIs('admin.change-password') ? ' active-sub' : '' }}" href="{{route('admin.change-password')}}">Change Password</a>
                     </li>
                  </ul>
               </li>
               <li class="{{ request()->routeIs('admin.reach-out-details') ? 'current-page' : '' }}">
                  <a href="{{route('admin.reach-out-details')}}">
                  <i class="ri-phone-lock-line"></i>
                  <span class="menu-text">Carrers Form Message</span>
                  </a>
               </li>
               <li class="{{ request()->routeIs('admin.contact-details') ? 'current-page' : '' }}">
                  <a href="{{route('admin.contact-details')}}">
                 <i class="ri-contacts-fill"></i>
                  <span class="menu-text">Contact Form Message</span>
                  </a>
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
         