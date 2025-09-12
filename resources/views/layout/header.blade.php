<!-- Preloader -->
{{-- <div class="loader-wrap">
  <div class="preloader">
    <div class="preloader-close">Preloader Close</div>
  </div>
  <div class="layer layer-one"><span class="overlay"></span></div>
  <div class="layer layer-two"><span class="overlay"></span></div>
  <div class="layer layer-three"><span class="overlay"></span></div>
</div> --}}

<!-- main header -->
@if($profile)
  <header class="main-header">
    <div class="header-top">
      <div class="auto-container">
        <div class="top-inner clearfix">
          <div class="top-left pull-left">
            <ul class="info clearfix">
              <li><i class="flaticon-email"></i><a href="{{ $profile->email }}">{{ $profile->email }}</a></li>
              <li><i class="flaticon-global"></i>{{ $profile->address }}</li>
            </ul>
          </div>
          <div class="top-right pull-right">
            <ul class="social-links clearfix">
              @foreach($socialMediaUrl as $socialurl)
                <li><a href="{{ $socialurl->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{ $socialurl->twitter }}"><i class="fab fa-twitter"></i></a></li>
                <li><a href="{{ $socialurl->instagram }}"><i class="fab fa-instagram"></i></a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header-lower">
      <div class="auto-container">
        <div class="outer-box">
          <figure class="logo-box"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
          </figure>
          <div class="menu-area">
            <!--Mobile Navigation Toggler-->
            <div class="mobile-nav-toggler">
              <i class="icon-bar"></i>
              <i class="icon-bar"></i>
              <i class="icon-bar"></i>
            </div>
            <nav class="main-menu navbar-expand-md navbar-light">
              <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                <ul class="navigation clearfix">
                  <li class="{{ request()->routeIs('home') ? 'current' : '' }}"><a href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="{{ request()->routeIs('about') ? 'current' : '' }}"><a href="{{ route('about') }}">About
                      Us</a></li>
                  <li class="dropdown {{ request()->routeIs('service', 'testimonial') ? 'current' : '' }}">
                    <a>
                      {{ request()->routeIs('service', 'testimonial')
                          ? ucfirst(request()->route()->getName())
                          : 'Pages' }}
                    </a>
                    <ul>
                      <li><a href="{{ route('service') }}">Our Service</a></li>
                      <li><a href="{{ route('testimonial') }}">Testimonials</a></li>
                    </ul>
                  </li>

                  <li class="dropdown {{ request()->is('product/*') ? 'current' : '' }}">
                    <a>
                      @if (request()->is('product/*') && isset($currentCategory))
                        {{ $currentCategory->name }}
                      @else
                        Products <span>Hot</span>
                      @endif
                    </a>
                    <ul>
                      @foreach ($category as $cate)
                        <li>
                          <a href="{{ url('product/' . encodeId($cate->id)) }}">
                            {{ $cate->name }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </li>

                  <li class="{{ request()->routeIs('blog') ? 'current' : '' }}"><a href="{{ route('blog') }}">Blog</a>
                  </li>
                  <li class="{{ request()->routeIs('contact') ? 'current' : '' }}"><a
                      href="{{ route('contact') }}">Contact</a></li>
                </ul>
              </div>
            </nav>
          </div>
          {{-- <ul class="menu-right-content clearfix">
            <li><a href=""><i class="flaticon-like"></i></a></li>
          </ul> --}}
        </div>
      </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
      <div class="auto-container">
        <div class="outer-box clearfix">
          <div class="logo-box pull-left">
            <figure class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/small-logo.png') }}" alt=""></a>
            </figure>
          </div>
          <div class="menu-area pull-right">
            <nav class="main-menu clearfix">
              <!--Keep This Empty / Menu will come through Javascript-->
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
@endif
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
  <div class="menu-backdrop"></div>
  <div class="close-btn"><i class="fas fa-times"></i></div>
  <nav class="menu-box">
    <div class="nav-logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo-2.png') }}" alt="" title=""></a>
    </div>
    <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
    <div class="contact-info">
      <h4>Contact Info</h4>
      <ul>
        <li>{{ $profile->address }}</li>
        <li><a href="tel: {{ $profile->mobile_number }}">{{ $profile->mobile_number }}</a></li>
        <li><a href="{{ $profile->email }}">{{ $profile->email }}</a></li>
      </ul>
    </div>
    <div class="social-links">
      <ul class="clearfix">
        @foreach($socialMediaUrl as $socialurl)
          <li><a href="{{ $socialurl->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="{{ $socialurl->twitter }}"><i class="fab fa-twitter"></i></a></li>
          <li><a href="{{ $socialurl->instagram }}"><i class="fab fa-instagram"></i></a></li>
        @endforeach
      </ul>
    </div>
  </nav>
</div><!-- End Mobile Menu -->