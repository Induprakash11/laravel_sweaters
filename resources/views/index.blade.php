<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        @include('layout.header')

        <!-- banner-section -->
        <section class="banner-style-two">
            <div class="auto-container">
                <div class="banner-carousel-2 owl-carousel owl-theme owl-nav-none">
                    @foreach ($banner as $slide)
                        <div class="content-box" style="background-image: url('{{ asset($slide->image) }}')">
                            <div class="inner-box">
                                <h1>Discover & <span>Shop</span> The Trend</h1>
                                <p>New Modern Stylist Fashionable Men's Wear Jeans Shirt.</p>
                                <a href="index-2.html" class="theme-btn-two">Explore Now<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- banner-section end -->


        <!-- topcategory-section -->
        <section class="topcategory-section centred">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>Top Category</h2>
                    <p>Follow the most popular trends and get exclusive items from castro shop</p>
                    <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
                </div>
                <div class="row clearfix">
                    @foreach ($category as $cate)
                        <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                            <div class="category-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                                data-wow-duration="1500ms">
                                <figure class="image-box"><a href="{{ url('product/' . $cate->id) }}"><img
                                            src="{{ asset($cate->image) }}" alt=""></a></figure>
                                <h5><a href="{{ url('product/' . $cate->id) }}">{{ $cate->name }} Collections</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- topcategory-section end -->


        <!-- shop-section -->
        <section class="shop-section">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>Our Latest Collection</h2>
                    <p>There are some product that we featured for choose your best</p>
                    <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
                </div>

                <div class="sortable-masonry">
                    <!-- Filter Tabs -->
                    <div class="filters">
                        <ul class="filter-tabs filter-btns centred clearfix">
                            <li class="active filter" data-role="button" data-filter="*">All</li>
                            @foreach ($category as $cate)
                                <li class="filter" data-role="button" data-filter=".cat-{{ $cate->id }}">
                                    {{ $cate->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Products Grid -->
                    <div class="items-container row clearfix">
                        @forelse ($products->sortByDesc('date')->take(12) as $product)
                            <div
                                class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column cat-{{ $product->category }}">
                                <div class="shop-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ asset($product->image) }}" alt="" style="height: 250px">
                                            <ul class="info-list clearfix">
                                                <li><a href="#"><i class="flaticon-heart"></i></a></li>
                                            </ul>
                                        </figure>
                                        <div class="lower-content">
                                            <a href="product-details.html">{{ $product->brand }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="mt-4 no-products-message d-none">No products available in this category.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Dynamic No Products Message (hidden by default) -->

                </div>

                <div class="more-btn centred">
                    <a href="shop.html" class="theme-btn-one">View All Products<i class="flaticon-right-1"></i></a>
                </div>
            </div>
        </section>
        <!-- shop-section end -->

        <!-- news-section -->
        <section class="news-section">
            <div class="auto-container">
                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    @if ($blogs)
                        @foreach ($blogs->sortByDesc('createdat')->take(3) as $blog)
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <a href="blog-details.html">
                                            <img src="{{ asset($blog->image) }}" alt="" style="height: 220px;">
                                        </a>
                                    </figure>
                                    <div class="lower-content">
                                        <span class="post-date">{{ $blog->createdat }}</span>
                                        <h3><a href="blog-details.html">{{ $blog->title }}</a></h3>
                                        <ul class="post-info clearfix">
                                            <li><a href="">by Admin</a></li>
                                        </ul>
                                        <p>{{ Str::limit($blog->message, 30) }}</p>
                                        <div class="link">
                                            <a href="blog-details.html">Read More<i class="flaticon-right-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>
        <!-- news-section end -->

        <!-- service-section -->
        <section class="service-section">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                            <div class="service-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-truck"></i></div>
                                    <h3><a href="">Free Shipping</a></h3>
                                    <p>Free shipping on oder over $100</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                            <div class="service-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-credit-card"></i></div>
                                    <h3><a href="">Secure Payment</a></h3>
                                    <p>We ensure secure payment with PEV</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                            <div class="service-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-24-7"></i></div>
                                    <h3><a href="">Support 24/7</a></h3>
                                    <p>Contact us 24 hours a day, 7 days a week</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 service-block">
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
        </section>
        <!-- service-section end -->

        <!-- instagram-section -->
        {{-- <section class="instagram-section">
            <div class="outer-container">
                <div class="sec-title">
                    <h2>Follow Us On Instagram</h2>
                    <p>Excepteur sint occaecat cupidatat</p>
                    <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
                </div>
                <div class="six-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    <figure class="image-box">
                        <img src="assets/images/resource/instagram-1.jpg" alt="">
                        <ul class="info-list clearfix">
                            <li><a href="index-2.html"><i class="flaticon-heart"></i>450</a></li>
                            <li><a href="index-2.html"><i class="flaticon-commentary"></i>320</a></li>
                        </ul>
                    </figure>
                    <figure class="image-box">
                        <img src="assets/images/resource/instagram-2.jpg" alt="">
                        <ul class="info-list clearfix">
                            <li><a href="index-2.html"><i class="flaticon-heart"></i>450</a></li>
                            <li><a href="index-2.html"><i class="flaticon-commentary"></i>320</a></li>
                        </ul>
                    </figure>
                    <figure class="image-box">
                        <img src="assets/images/resource/instagram-3.jpg" alt="">
                        <ul class="info-list clearfix">
                            <li><a href="index-2.html"><i class="flaticon-heart"></i>450</a></li>
                            <li><a href="index-2.html"><i class="flaticon-commentary"></i>320</a></li>
                        </ul>
                    </figure>
                    <figure class="image-box">
                        <img src="assets/images/resource/instagram-4.jpg" alt="">
                        <ul class="info-list clearfix">
                            <li><a href="index-2.html"><i class="flaticon-heart"></i>450</a></li>
                            <li><a href="index-2.html"><i class="flaticon-commentary"></i>320</a></li>
                        </ul>
                    </figure>
                    <figure class="image-box">
                        <img src="assets/images/resource/instagram-5.jpg" alt="">
                        <ul class="info-list clearfix">
                            <li><a href="index-2.html"><i class="flaticon-heart"></i>450</a></li>
                            <li><a href="index-2.html"><i class="flaticon-commentary"></i>320</a></li>
                        </ul>
                    </figure>
                    <figure class="image-box">
                        <img src="assets/images/resource/instagram-6.jpg" alt="">
                        <ul class="info-list clearfix">
                            <li><a href="index-2.html"><i class="flaticon-heart"></i>450</a></li>
                            <li><a href="index-2.html"><i class="flaticon-commentary"></i>320</a></li>
                        </ul>
                    </figure>
                </div>
            </div>
        </section> --}}
        <!-- instagram-section end -->

        @include('layout.footer')
</body><!-- End of .page_wrapper -->

</html>