@php
$sitedetails = \App\SiteSetting::find(1);
@endphp

<!-- Sidemenu Area -->
<div class="ecaps-sidemenu-area">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="{{ route('admin.dashboard') }}"><img class="desktop-logo"
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
                    <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="zmdi zmdi-view-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.sitesetting.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.sitesetting.index') }}">
                            <i class="zmdi zmdi-settings"></i>
                            <span>Site Setting</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.testimonial') ? 'active' : '' }}">
                        <a href="{{ route('admin.testimonial.index') }}">
                            <i class="zmdi zmdi-comment-alt"></i>
                            <span>Testimonials</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.partner') ? 'active' : '' }}">
                        <a href="{{ route('admin.partner.index') }}">
                            <i class="zmdi zmdi-accounts"></i>
                            <span>Partners</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.category') ? 'active' : '' }}">
                        <a href="{{ route('admin.category.index') }}">
                            <i class="zmdi zmdi-labels"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.product') ? 'active' : '' }}">
                        <a href="{{ route('admin.product.index') }}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.banner') ? 'active' : '' }}">
                        <a href="{{ route('admin.banner.index') }}">
                            <i class="zmdi zmdi-collection-image"></i>
                            <span>Banners</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.researchtype') ? 'active' : '' }}">
                        <a href="{{ route('admin.researchtype.index') }}">
                            <i class="zmdi zmdi-chart"></i>
                            <span>Research Type</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.research_development') ? 'active' : '' }}">
                        <a href="{{ route('admin.research_development.index') }}">
                            <i class="zmdi zmdi-assignment-check"></i>
                            <span>Research And Development</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.achievement') ? 'active' : '' }}">
                        <a href="{{ route('admin.achievement.index') }}">
                            <i class="zmdi zmdi-calendar"></i>
                            <span>Achievement</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('advisory-directors.*') ? 'active' : '' }}">
                        <a href="{{ route('advisory-directors.index') }}">
                            <i class="zmdi zmdi-calendar"></i>
                            <span>Advisory Directors</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('board-directors.index') ? 'active' : '' }}">
                        <a href="{{ route('board-directors.index') }}">
                            <i class="zmdi zmdi-calendar"></i>
                            <span>Board Directors</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.aboutus.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.aboutus.index') }}">
                            <i class="zmdi zmdi-info-outline"></i>
                            <span>About Us</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.special-category*') ? 'active' : '' }}">
                        <a href="{{ route('admin.special-category') }}">
                            <i class="zmdi zmdi-info-outline"></i>
                            <span>Special Category</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.special-sub-category') ? 'active' : '' }}">
                        <a href="{{ route('admin.special-sub-category') }}">
                            <i class="zmdi zmdi-info-outline"></i>
                            <span>Special Sub Category</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.seo.index') }}">
                            <i class="zmdi zmdi-trending-up"></i>
                            <span>SEO</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.log.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.log.index') }}">
                            <i class="zmdi zmdi-format-list-bulleted"></i>
                            <span>Logdata</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.enquiry.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.enquiry.index') }}">
                            <i class="zmdi zmdi-email"></i>
                            <span>Enquiry</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.whychooseus.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.whychooseus.index') }}">
                            <i class="zmdi zmdi-help-outline"></i>
                            <span>Why Choose Us</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.breadcrumb.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.breadcrumb.index') }}">
                            <i class="zmdi zmdi-help-outline"></i>
                            <span>Breadcrumb</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('password.change') ? 'active' : '' }}">
                        <a href="{{ route('password.change') }}">
                            <i class="zmdi zmdi-key"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.logout') ? 'active' : '' }}">
                        <a href="{{ route('admin.logout') }}">
                            <i class="zmdi zmdi-power"></i>
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
