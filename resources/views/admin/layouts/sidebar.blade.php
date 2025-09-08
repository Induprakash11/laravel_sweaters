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
                        <img src="{{ asset('img/logo-small.svg') }}" alt="Logo">
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
                                    <a href="{{ route('dashboard') }}" class="active subdrop">
                                        <i class="ti ti-dashboard"></i><span>Dashboard</span></span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class=""><i class="ti ti-shopping-cart"></i><span>Product</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('products.create') }}" class="">Add Product</a></li>
                                        <li><a href="{{ route('products.index') }}" class="">View Product</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class=""><i class="ti ti-layout-grid"></i><span>Category</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('category.create') }}" class="">Add Category</a></li>
                                        <li><a href="{{ route('category.index') }}" class="">View Category</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="" class="">
                                        <i class="ti ti-dashboard"></i><span>Enquiry List</span></span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class=""><i class="ti ti-page-break"></i><span>Landing Page</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="" class="">Add Master</a></li>
                                        <li><a href="" class="">View Master</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class=""><i class="ti ti-brand-blogger"></i><span>Blog</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('blogs.create') }}" class="">Add Blog</a></li>
                                        <li><a href="{{ route('blogs.index') }}" class="">View Blog</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class=""><i class="ti ti-photo"></i><span>Gallery</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('gallery.create') }}" class="">Add Gallery</a></li>
                                        <li><a href="{{ route('gallery.index') }}" class="">View Gallery</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class=""><i class="ti ti-report-analytics"></i><span>Event</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('events.create') }}" class="">Add Event</a></li>
                                        <li><a href="{{ route('events.index') }}" class="">View Event</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="" class="">
                                        <i class="ti ti-flag"></i><span>Career List</span></span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class=""><i class="ti ti-quote"></i><span>Testimonial</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('testimonial.create') }}" class="">Add Testimonial</a></li>
                                        <li><a href="{{ route('testimonial.index') }}" class="">View Testimonial</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="" class="">
                                        <i class="ti ti-world-cog"></i><span>Social Media</span></span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class=""><i class="ti ti-settings-cog"></i><span>Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('profile.update') }}" class="">Profile</a></li>
                                        <li><a href="" class="">Email Config</a></li>
                                        <li><a href="" class="">Banners</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="{{ route('profile.destroy') }}" class="active subdrop">
                                        <i class="ti ti-logout"></i><span>Logout</span></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>