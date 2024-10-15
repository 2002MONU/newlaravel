@php
    $sitedetails = \App\Models\SiteSetting::find(1);
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
        <a href="{{ route('admin.dashboard') }}"><img class="desktop-logo" style="height: 75px;width:75px"
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
              class="treeview {{ request()->is('admin/sliders*')  || request()->is('admin/home*') ? 'active menu-open' : '' }}">
              <a href="javascript:void(0)">
                  <i class="fa fa-home"></i> <!-- Changed icon -->
                  <span>Home Page</span>
                  <i class="fa fa-angle-right"></i>
              </a>
              <ul class="treeview-menu"
                  style="display: {{ request()->is('admin/sliders*') || request()->is('admin/home*') ? 'block' : 'none' }};">
                  <li class="{{ request()->routeIs('sliders.*') ? 'active' : '' }}">
                      <a href="{{ route('sliders.index') }}">- Home Slider</a>
                  </li>
                 
                  {{-- <li class="{{ request()->routeIs('admin.home.*') ? 'active' : '' }}">
                      <a href="{{ route('admin.home.index') }}">- Home</a>
                  </li> --}}
              </ul>
          </li>    
            
                    <!-- Site Settings -->
                    <li class="{{ request()->is('admin/sitesettings*') ? 'active' : '' }}">
                        <a href="{{ route('sitesettings.index') }}">
                            <i class="fa fa-cog"></i> <!-- Changed icon -->
                            <span>Site Settings</span>
                        </a>
                    </li>
            
                    <!-- Galleries -->
                    <li class="{{ request()->is('admin/galleries*') ? 'active' : '' }}">
                        <a href="{{ route('galleries.index') }}">
                            <i class="fa fa-cog"></i> <!-- Changed icon -->
                            <span>Galleries</span>
                        </a>
                    </li>

                      <!-- Application access -->
                      <li class="{{ request()->is('application-access*') ? 'active' : '' }}">
                        <a href="{{ route('application-access.index') }}">
                            <i class="fa fa-cog"></i> <!-- Changed icon -->
                            <span>Application-Accesses</span>
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
