<div class="sidebar" id="sidebar">

    <!-- Start Logo -->
    <div class="sidebar-logo">
        <div>
            <!-- Logo Normal -->
            <a href="" class="logo logo-normal">
                <img src="{{ asset('img/logo.svg') }}" alt="Logo">
            </a>

            <!-- Logo Small -->
            <a href="" class="logo-small">
                <img src="{{ asset('img/logo-small.png') }}" alt="Logo">
            </a>

            <!-- Logo Dark -->
            <a href="" class="dark-logo">
                <img src="{{ asset('img/logo-white.svg') }}" alt="Logo">
            </a>
        </div>
        <button class="sidenav-toggle-btn btn border-0 p-0 active" id="toggle_btn">
            <i class="ti ti-arrow-bar-to-left"></i>
        </button>

        <!-- Sidebar Menu Close -->
        <button class="sidebar-close">
            <i class="ti ti-x align-middle"></i>
        </button>
    </div>
    <!-- End Logo -->

    <!-- Sidenav Menu -->
    <div class="sidebar-inner" data-simplebar>
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main Menu</span></li>
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="ti ti-home "></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') ? 'active' : '' }}"><i
                                    class="ti ti-shopping-cart"></i><span>Product</span></a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('productnew.index') }}" class="{{ request()->routeIs('product.index') ? 'active' : '' }}"><i
                                    class="ti ti-shopping-cart"></i><span>Product1</span></a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('category.index') }}" class="{{ request()->routeIs('category.index') ? 'active' : '' }}"><i
                                    class="ti ti-chart-pie"></i><span>Category</span></a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('banner.index') }}" class="{{ request()->routeIs('banner.index') ? 'active' : '' }}" >
                                <i class="ti ti-photo "></i><span>Banners</span></span>
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('blogs.index') }}" class="{{ request()->routeIs('blogs.index') ? 'active' : '' }}"><i
                                    class="ti ti-brand-blogger"></i><span>Blog</span></a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.index') ? 'active' : '' }}"><i class="ti ti-photo"></i><span>Gallery</span></a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('events.index') }}" class="{{ request()->routeIs('events.index') ? 'active' : '' }}"><i
                                    class="ti ti-map-pin-check"></i><span>Event</span></a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('testimonial.index') }}" class="{{ request()->routeIs('testimonial.index') ? 'active' : '' }}"><i
                                    class="ti ti-brand-hipchat"></i><span>Testimonial</span></a>
                        </li>
                        <li class="submenu">
                            <a href="" >
                                <i class="ti ti-world-cog"></i><span>Social Media</span></span>
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}"><i
                                    class="ti ti-settings-cog"></i><span>Profile</span></a>
                        </li>
                        <li class="submenu">
                            <a href="{{ route('profile.destroy') }}" >
                                <i class="ti ti-logout"></i><span>Logout</span></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div>