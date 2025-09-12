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
                    <h1>Blog Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- blog-details -->
        <section class="product-details product-details-1">
            <div class="auto-container">
                <div class="product-details-content">
                    @if($getblogDetails)
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                <figure class="product-image">
                                    <img src="{{ asset($getblogDetails->image) }}" alt="">
                                    <a href="{{ asset($getblogDetails->image) }}" class="lightbox-image"><i
                                            class="flaticon-search-2"></i></a>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                <div class="product-info">
                                    <h3>{{ $getblogDetails->title }}</h3>
                                    <h5>{{ $getblogDetails->date }}</h5>
                                    <div class="customer-review clearfix">
                                        <ul class="rating-box clearfix">
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                        </ul>
                                        <div class="reviews"><a href="">(5 Reviews)</a></div>
                                    </div>
                                    <div class="text">
                                        <p>{{ $getblogDetails->message }}</p>
                                    </div>
                                    <ul class="share-option clearfix">
                                        <li>
                                            <h5>Follow Us:</h5>
                                        </li>
                                        @foreach($socialMediaUrl as $socialurl)
                                            <li><a href="{{ $socialurl->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{ $socialurl->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="{{ $socialurl->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>+
                    @endif
                </div>
                <div class="related-product">
                    <div class="sec-title style-two">
                        <h2>Related blogs</h2>
                        <p>There are some blog that we featured for choose your best</p>
                        <span class="separator"
                            style="background-image: url(assets/images/icons/separator-2.png);"></span>
                    </div>
                    <div class="row clearfix">
                        @if ($blogs->count() > 0)
                        @foreach ($blogs->sortBy('date')->take(4) as $blog)
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($blog->image) }}" alt="">
                                    </figure>
                                    <div class="lower-content">
                                        <a href="">{{ $blog->title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- product-details end -->

        @include('layout.footer')
</body><!-- End of .page_wrapper -->

</html>