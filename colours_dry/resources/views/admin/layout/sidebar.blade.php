@php
    $sitedetails = \App\Models\SiteSetting::find(1);
    $whyChoose = \App\Models\WhyChoose::find(1);
    $howitwork = \App\Models\HowItWork::find(1);
    $achievement = \App\Models\Achievement::find(1);
@endphp
<style>
    .ecaps-logo a img {
        max-height: 85px;
        width: auto;
        margin: auto;
    }
</style>
<!-- Sidemenu Area -->
<div class="ecaps-sidemenu-area">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="{{ route('admin.dashboard') }}"><img class="desktop-logo" style="height: 70px;width:175px"
                src="{{ asset('admin/siteImage/logo/' . $sitedetails->logo) }}" alt="Desktop Logo"> <img class="small-logo"
                src="{{ asset('admin/siteImage/logo/' . $sitedetails->logo) }}" alt="Mobile Logo"></a>
    </div>

    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <!-- Dashboard -->
                    <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-tachometer"></i> <!-- Changed icon -->
                            <span>Dashboard</span>
                        </a>
                    </li>
            
                    <!-- Home Page Menu -->
                    <li
                        class="treeview {{ request()->is('admin/sliders*') || request()->is('admin/brands*') || request()->is('admin/home*') ? 'active menu-open' : '' }}">
                        <a href="javascript:void(0)">
                            <i class="fa fa-home"></i> <!-- Changed icon -->
                            <span>Home Page</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu"
                            style="display: {{ request()->is('sliders.*') || request()->is('admin/brands*') || request()->is('admin/home*') ? 'block' : 'none' }};">
                            <li class="{{ request()->routeIs('sliders.*') ? 'active' : '' }}">
                                <a href="{{ route('sliders.index') }}">- Home Slider</a>
                            </li>
                            <li class="{{ request()->routeIs('whychooses.*') ? 'active' : '' }}">
                                <a href="{{ route('whychooses.edit',['whychoose'=>$whyChoose->id]) }}">- Why Choose Us</a>
                            </li>
                            <li class="{{ request()->routeIs('howitworks.*') ? 'active' : '' }}">
                                <a href="{{ route('howitworks.edit',$howitwork->id) }}">- How It Works</a>
                            </li>
                            <li class="{{ request()->routeIs('achievements.*') ? 'active' : '' }}">
                                <a href="{{ route('achievements.edit',$achievement->id) }}">- Achievement</a>
                            </li>
                        </ul>
                    </li>
            
                    {{-- <!-- Enquiry -->--}}
                     <li class="{{ request()->is('testimonials.*') ? 'active' : '' }}">
                        <a href="{{ route('testimonials.index') }}">
                            <i class="fa fa-envelope"></i> <!-- Changed icon -->
                            <span>Testimonials</span>
                        </a>
                    </li>
              <!-- Services -->
              <li class="{{ request()->is('admin/services*') ? 'active' : '' }}">
                <a href="{{ route('services.index') }}">
                    <i class="fa fa-cog"></i> <!-- Changed icon -->
                    <span>Services</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/abouts*') ? 'active' : '' }}">
                <a href="{{ route('abouts.index') }}">
                    <i class="fa fa-cog"></i> <!-- Changed icon -->
                    <span>abouts</span>
                </a>
            </li>
            <li class="{{ request()->is('branches.*') ? 'active' : '' }}">
                <a href="{{ route('branches.index') }}">
                    <i class="fa fa-cog"></i> <!-- Changed icon -->
                    <span>Branches</span>
                </a>
            </li>
                 
                    <!-- Site Settings -->
                    <li class="{{ request()->is('admin/sitesettings*') ? 'active' : '' }}">
                        <a href="{{ route('sitesettings.index') }}">
                            <i class="fa fa-cog"></i> <!-- Changed icon -->
                            <span>Site Settings</span>
                        </a>
                    </li>
                    <!-- Site Settings -->
                    <li class="{{ request()->is('admin.enquiry.index','admin.enquiry.delete') ? 'active' : '' }}">
                        <a href="{{ route('admin.enquiry.index') }}">
                            <i class="fa fa-cog"></i> <!-- Changed icon -->
                            <span>Enquiry Message</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin.seo.index','admin.seo.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.seo.index') }}">
                            <i class="fa fa-cog"></i> <!-- Changed icon -->
                            <span>SEO Setting</span>
                        </a>
                    </li>
            
                
                    <!-- Log Data -->
                    <li class="{{ request()->routeIs('admin.log.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.log.index') }}">
                            <i class="fa fa-database"></i> <!-- Changed icon -->
                            <span>Log Data</span>
                        </a>
                    </li>
            
                    <!-- Change Password -->
                    <li class="{{ request()->routeIs('password.change') ? 'active' : '' }}">
                        <a href="{{ route('password.change') }}">
                            <i class="fa fa-key"></i> <!-- Changed icon -->
                            <span>Change Password</span>
                        </a>
                    </li>
            
                    <!-- Logout -->
                    <li class="{{ request()->routeIs('admin.logout') ? 'active' : '' }}">
                        <a href="{{ route('admin.logout') }}">
                            <i class="fa fa-power-off"></i> <!-- Changed icon -->
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="ecaps-page-content">



    {{-- 
    1st level menu 
    <li class="treeview menu-open">
        <a href="javascript:void(0)"><i class="zmdi zmdi-time-interval"></i><span>Icons</span> <i
                class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu" style="display: block;">
            <li><a href="font-awesome.html">- Font-Awsome Icons</a></li>
            <li><a href="pe-7-stroke.html">- Pe-7 Stroke Icons</a></li>
            <li><a href="matarial-icons.html">- Materialize Icons</a></li>
            <li><a href="themify-icons.html">- Themify Icons</a></li>
            <li><a href="elegant-icons.html">- Elegant Icons</a></li>
            <li><a href="et-line-icons.html">- Et-line Icons</a></li>
        </ul>
    </li>
     --}}

    {{-- 
     2nd level menu
    <li class="treeview menu-open">
        <a href="javascript:void(0)"><i class="zmdi zmdi-view-list"></i> <span>Multilevel</span> <i
                class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu" style="display: block;">
            <li><a href="#">Level One</a></li>
            <li class="treeview menu-open">
                <a href="#">Level One <i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu" style="display: block;">
                    <li><a href="#">- Level Two</a></li>
                    <li><a href="#">- Level Two</a></li>
                    <li><a href="#">- Level Two</a></li>
                </ul>
            </li>
            <li><a href="#">Level One</a></li>
        </ul>
    </li> 
    --}}
