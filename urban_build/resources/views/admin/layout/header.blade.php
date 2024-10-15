@php
    $achievement = \App\Models\Achievement::find(1);
    $about = \App\Models\About::find(1);
    $whyChoose = \App\Models\WhyChooseUs::find(1);
    $contact = \App\Models\ContactDetail::find(1);
    $site_setting = \App\Models\SiteSetting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ $site_setting->site_name }} | @yield('title') </title>
    <!-- Meta -->
    <meta name="description" content="Urban Build Developers">
    <meta name="keywords" content="Urban Build Developers">
    <meta property="og:title" content="Urban Build Developers">
    <meta property="og:description" content="Urban Build Developers">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="{{ asset('assets/dynamics/' . $site_setting->favicon) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- *************
         ************ CSS Files *************
         ************* -->
    <link rel="stylesheet" href="{{ asset('dash_assets/fonts/remix/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('dash_assets/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dash_assets/vendor/datatables/dataTables.bs5.css') }}">
    <link rel="stylesheet" href="{{ asset('dash_assets/vendor/datatables/dataTables.bs5-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('dash_assets/vendor/datatables/buttons/dataTables.bs5-custom.css') }}">
    <!-- *************
         ************ Vendor Css Files *************
         ************ -->
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('dash_assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}">
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
                <a href="{{ route('admin.dashboard') }}" class="d-lg-block d-none bg-white p-1">
                    <img src="{{ asset('assets/dynamics/' . $site_setting->header_logo) }}" class="logo"
                        alt="logo ">
                </a>
                <a href="{{ route('admin.dashboard') }}" class="d-lg-none d-md-block bg-white p-1">
                    <img src="{{ asset('assets/dynamics/' . $site_setting->header_logo) }}" class="logo"
                        alt="logo"
                        style="
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
                        {{-- 
                  <div class="mx-2 my-2 d-grid">
                     <a href="" class="btn btn-danger">Change-password</a>
                  </div>
                  --}}
                        <div class="mx-3 my-2 d-grid">
                            <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
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
                    <img src="{{ asset('dash_assets/admin_icon.png') }}" class="img-shadow img-3x me-3 rounded-5"
                        alt="vizag bikes cars">
                    <div class="m-0">
                        <h5 class="mb-1 profile-name text-nowrap text-truncate">Admin</h5>
                    </div>
                </div>
                <!-- Sidebar profile ends -->
                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <ul class="sidebar-menu">
                        <li class="{{ request()->routeIs('admin.dashboard') ? 'current-page' : '' }}">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="ri-home-6-line"></i>
                                <span class="menu-text"> Dashboard</span>
                            </a>
                        </li>
                        <li
                            class="treeview {{ request()->routeIs('sliders.*', 'abouts.*', 'achievements.*', 'why-chooses.*') ? 'current-page active' : '' }}">
                            <a href="#!">
                                <i class="ri-home-5-line"></i>
                                <span class="menu-text">Home</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('sliders.*') ? ' active-sub' : '' }}"
                                        href="{{ route('sliders.index') }}">Slider</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('achievements.*') ? ' active-sub' : '' }}"
                                        href="{{ route('achievements.edit', $achievement->id) }}">Achievements</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('abouts.*') ? ' active-sub' : '' }}"
                                        href="{{ route('abouts.edit', $about->id) }}"> About edit</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('why-chooses.*') ? ' active-sub' : '' }}"
                                        href="{{ route('why-chooses.edit', $whyChoose->id) }}">Home Why Choose Us</a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="treeview {{ request()->routeIs('services.*', 'service-details.*') ? 'current-page active' : '' }}">
                            <a href="#!">
                                <i class="ri-font-family"></i>
                                <span class="menu-text">Service Page</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('services.*') ? ' active-sub' : '' }}"
                                        href="{{ route('services.index') }}"> Service </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('service-details.*') ? ' active-sub' : '' }}"
                                        href="{{ route('service-details.index') }}">Services Details </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="treeview {{ request()->routeIs('packages.*', 'package-details.*') ? 'current-page active' : '' }}">
                            <a href="#!">
                                <i class="ri-honour-line"></i>
                                <span class="menu-text">Packages Page</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('packages.*') ? ' active-sub' : '' }}"
                                        href="{{ route('packages.index') }}"> Packges </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('package-details.*') ? ' active-sub' : '' }}"
                                        href="{{ route('package-details.index') }}">Packages Details </a>
                                </li>
                            </ul>
                        </li>
                        <li class=" {{ request()->routeIs('project-details.*') ? 'current-page' : '' }}">
                            <a href="{{ route('project-details.index') }}">
                                <i class="ri-projector-fill"></i>
                                <span class="menu-text"> Project Details
                                </span>
                            </a>
                        </li>
                        <li class=" {{ request()->routeIs('testimonials.*') ? 'current-page' : '' }}">
                            <a href="{{ route('testimonials.index') }}">
                                <i class="ri-contacts-book-3-line "></i>
                                <span class="menu-text">Testimonials
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('contact-details.*') ? 'current-page' : '' }}">
                            <a href="{{ route('contact-details.edit', $contact->id) }}">
                                <i class="ri-product-hunt-fill"></i>
                                <span class="menu-text">Contact Details</span>
                            </a>
                        </li>
                        <li class=" {{ request()->routeIs('faq-questions.*') ? 'current-page' : '' }}">
                            <a href="{{ route('faq-questions.index') }}">
                                <i class="ri-save-2-line"></i>
                                <span class="menu-text">Faq Questions
                                </span>
                            </a>
                        </li>
                        <li class=" {{ request()->routeIs('admin.contact-details') ? 'current-page' : '' }}">
                            <a href="{{ route('admin.contact-details') }}">
                                <i class="ri-contacts-fill"></i>
                                <span class="menu-text"> Contact Message
                                </span>
                            </a>
                        </li>
                        <li class=" {{ request()->routeIs('admin.enquiry-details') ? 'current-page' : '' }}">
                            <a href="{{ route('admin.enquiry-details') }}">
                                <i class="ri-folder-image-line"></i>
                                <span class="menu-text"> Enquiry Message
                                </span>
                            </a>
                        </li>
                        <li class=" {{ request()->routeIs('admin.contact-enquiry-details') ? 'current-page' : '' }}">
                            <a href="{{ route('admin.contact-enquiry-details') }}">
                                <i class="ri-contacts-fill"></i>
                                <span class="menu-text"> Contact Enquiry Message
                                </span>
                            </a>
                        </li>
                        <li
                            class="treeview {{ request()->routeIs('seosettings.*', 'site-settings.*', 'admin.change-password', 'sociallinks.*', 'metatags.*') ? 'current-page active' : '' }}">
                            <a href="#!">
                                <i class="ri-settings-fill"></i>
                                <span class="menu-text">Settings</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('seosettings.*') ? ' active-sub' : '' }}"
                                        href="{{ route('seosettings.index') }}">SEO Setting</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('site-settings.*') ? ' active-sub' : '' }}"
                                        href="{{ route('site-settings.index') }}">Site Settings</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('metatags.*') ? ' active-sub' : '' }}"
                                        href="{{ route('metatags.index') }}">Meta Tags </a>
                                </li>
                                          {{-- -  
                                 <li>
                                    {{}}    <a class="{{ request()->routeIs('sociallinks.*') ? ' active-sub' : '' }}" href="{{route('sociallinks.index')}}">Social Link</a>
                                 </li>
                                 --}}
                                <li>
                                    <a class="{{ request()->routeIs('admin.change-password') ? ' active-sub' : '' }}"
                                        href="{{ route('admin.change-password') }}">Change Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ request()->routeIs('admin.logs-details') ? 'current-page' : '' }}">
                            <a href="{{ route('admin.logs-details') }}">
                                <i class="ri-logout-circle-r-fill"></i>
                                <span class="menu-text">Admin Logs</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.logout') ? 'current-page' : '' }}">
                            <a href="{{ route('admin.logout') }}">
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
