<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard  | @yield('title')  </title>

    <!-- Meta -->
    <meta name="description" content="suncrisphospitality">
    <meta name="keywords" content="suncrisphospitality">
    <meta property="og:title" content="suncrisphospitality">
    <meta property="og:description" content="suncrisphospitality">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="">
    
    <!-- *************
		************ CSS Files *************
	************* -->
    <link rel="stylesheet" href="{{asset('dash_assets/fonts/remix/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('dash_assets/css/main.min.css')}}">

    <!-- *************
		************ Vendor Css Files *************
	************ -->
     <link rel="stylesheet" href="{{asset('dash_assets/vendor/datatables/dataTables.bs5.css')}}">
    <link rel="stylesheet" href="{{asset('dash_assets/vendor/datatables/dataTables.bs5-custom.css')}}">
    <link rel="stylesheet" href="{{asset('dash_assets/vendor/datatables/buttons/dataTables.bs5-custom.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{asset('dash_assets/vendor/overlay-scroll/OverlayScrollbars.min.css')}}">
    <!----- boostrap 4 cdn  -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >-->
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
            <img src="" class="logo" alt="suncrisphospitality">
          </a>
          <a href="" class="d-lg-none d-md-block">
            <img src="" class="logo" alt="suncrisphospitality">
          </a>
        </div>
        <!-- App brand ends -->

        <!-- App header actions starts -->
        <div class="header-actions">
          <!-- Header user settings starts -->
          <div class="dropdown ms-2">
            <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <div class="avatar-box">Admin<span class="status busy"></span></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow-lg">
              <div class="px-3 py-2">
                <span class="small">Admin</span>
                {{-- <h6 class="m-0">James Bruton</h6> --}}
              </div>
              <div class="mx-2 my-2 d-grid">
                <a href="" class="btn btn-danger">Change-password</a>
              </div>
              <div class="mx-3 my-2 d-grid">
                <a href="" class="btn btn-danger">Logout</a>
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
            <img src="{{asset('assets/admin_icon.jpg')}}" class="img-shadow img-3x me-3 rounded-5" alt="admin-img">
            <div class="m-0">
              <h5 class="mb-1 profile-name text-nowrap text-truncate">Admin</h5>
              {{-- <p class="m-0 small profile-name text-nowrap text-truncate">Dept Admin</p> --}}
            </div>
          </div>
          <!-- Sidebar profile ends -->

          <!-- Sidebar menu starts -->
          <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
              <li class="  {{ request()->routeIs('admin.dashboard') ? 'current-page' : '' }}">
                <a href="">
                  <i class="ri-home-6-line"></i>
                  <span class="menu-text"> Dashboard</span>
                </a>
              </li>
              <li class="treeview {{ request()->routeIs('homepages.*','explorehotels.*','whychooses.*','testimonials.*','ourpartners.*') ? 'current-page' : '' }}">
                <a href="#!">
                  <i class="ri-home-5-line"></i>
                  <span class="menu-text">Home</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="">Slider Details</a>
                  </li>
                   <li>
                    <a href="">Explore The Hotel</a>
                  </li>
                 <li>
                    <a href="">Whychoose  Details</a>
                  </li>
                   <li>
                    <a href="">Testimonial Details</a>
                  </li>
                  <li>
                    <a href="">Our Partner</a>
                  </li>
                </ul> 
              </li>
              <li class="{{ request()->routeIs('admin.logout') ? 'current-page' : '' }}">
                <a href="">
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