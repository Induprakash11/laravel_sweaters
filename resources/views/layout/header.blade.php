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
<header class="main-header">
  <div class="header-top">
    <div class="auto-container">
      <div class="top-inner clearfix">
        <div class="top-left pull-left">
          <ul class="info clearfix">
              @if($users)
                <li><i class="flaticon-email"></i><a href="{{ $users->email }}">{{ $users->email }}</a></li>
              @endif
            <li><i class="flaticon-global"></i> Peelamedu, Coimbatore-14</li>
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
        <figure class="logo-box"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a></figure>
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
                <li class="current"><a href="{{ route('home') }}">Home</a></li>
                <li class=""><a href="{{ route('about') }}">About Us</a></li>
                <li class="dropdown"><a>Pages</a>
                  <ul>
                    <li><a href="service.html">Our Service</a></li>
                    <li><a href="testimonials.html">Testimonials</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a href="">Products<span>Hot</span></a>
                  <ul>
                    <li><a href="category-element-1.html">Category</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a href="">Blog</a>
                  <ul>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
              </ul>
            </div>
          </nav>
        </div>
        <ul class="menu-right-content clearfix">
          <li><a href=""><i class="flaticon-like"></i></a></li>
        </ul>
      </div>
    </div>
  </div>

  <!--sticky Header-->
  <div class="sticky-header">
    <div class="auto-container">
      <div class="outer-box clearfix">
        <div class="logo-box pull-left">
          <figure class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/small-logo.png') }}" alt=""></a></figure>
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
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
  <div class="menu-backdrop"></div>
  <div class="close-btn"><i class="fas fa-times"></i></div>
  <nav class="menu-box">
    <div class="nav-logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo-2.png') }}" alt="" title=""></a></div>
    <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
    <div class="contact-info">
      <h4>Contact Info</h4>
      <ul>
        <li>Peelamedu, Coimbatore-14</li>
        <li><a href="tel:+8801682648101">+91 8899006363</a></li>
        @if($users)
          <li><a href="{{ $users->email }}">{{ $users->email }}</a></li>
        @endif
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