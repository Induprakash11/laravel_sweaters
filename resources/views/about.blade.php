<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        @include('layout.header')

        <!-- page-title -->
        <section class="page-title centred">
            <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>About Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- about-section -->
        @if($profile)
        <section class="about-section">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 text-column">
                        <div class="text-inner">
                            <h2><span>{{ $profile->title }}</span></h2>
                            <h3>Secure Checkout</h3>
                            <p>Excepteur sint occaecat cupidat non proident sunt in culpa qui officia deserunt mollit
                                anim est laborum.</p>
                            <p>accusan enim ipsam voluptam quia voluptas sit aspern odit aut.</p>
                            <a href="{{ route('contact') }}" class="theme-btn-one">Contact Us<i class="flaticon-right-1"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                        <figure class="image-box"><img src="assets/images/resource/about-1.jpg" alt=""></figure>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 text-column">
                        <div class="text-inner">
                            <div class="box">
                                <h4>Castro Overview</h4>
                                <p>Excepteur sint occaecat cupidat non proident sunt in culpa qui officia deserunt
                                    mollit anim est laborum.accusan enim ipsam voluptam quia voluptas sit aspern odit
                                    aut.</p>
                            </div>
                            <div class="box">
                                <h4>Our Mission</h4>
                                <p>Excepteur sint occaecat cupidat non proident sunt in culpa qui officia deserunt
                                    mollit anim est laborum.accusan enim ipsam voluptam quia voluptas sit aspern odit
                                    aut.</p>
                                <p>Sed quia consequunturmagni dolores eos qui ratione voluptatem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- about-section end -->


        <!-- chooseus-section -->
        <section class="chooseus-section">
            <div class="outer-container clearfix">
                <div class="content-column">
                    <div class="inner-column">
                        <div class="content-box">
                            <div class="sec-title style-two">
                                <h2>Top Category</h2>
                                <p>There are some product that we featured for choose your best</p>
                                <span class="separator"
                                    style="background-image: {{ asset('images/icons/separator-3.png') }}"></span>
                            </div>
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 service-block">
                                        <div class="service-block-one">
                                            <div class="inner-box">
                                                <div class="icon-box"><i class="flaticon-truck"></i></div>
                                                <h3><a href="">Free Shipping</a></h3>
                                                <p>Free shipping on oder over $100</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 service-block">
                                        <div class="service-block-one">
                                            <div class="inner-box">
                                                <div class="icon-box"><i class="flaticon-credit-card"></i></div>
                                                <h3><a href="">Secure Payment</a></h3>
                                                <p>We ensure secure payment with PEV</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 service-block">
                                        <div class="service-block-one">
                                            <div class="inner-box">
                                                <div class="icon-box"><i class="flaticon-24-7"></i></div>
                                                <h3><a href="">Support 24/7</a></h3>
                                                <p>Contact us 24 hours a day, 7 days a week</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 service-block">
                                        <div class="service-block-one">
                                            <div class="inner-box">
                                                <div class="icon-box"><i class="flaticon-undo"></i></div>
                                                <h3><a href="">30 Days Return</a></h3>
                                                <p>Simply return it within 30 days for an exchange.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-column" style="background-image: url('{{ asset('images/background/chooseus-bg-1.jpg') }}');">
                </div>
            </div>
        </section>
        <!-- chooseus-section end -->

        @include('layout.footer')
</body><!-- End of .page_wrapper -->

</html>