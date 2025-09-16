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
            <div class="pattern-layer" style="background-image: url({{ asset('images/background/page-title.jpg')  }})"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Product Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>Product Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- product-details -->
        <section class="product-details product-details-1">
            <div class="auto-container">
                <div class="product-details-content">
                    @if($getProductDetails)
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                <figure class="product-image">
                                    <img src="{{ asset($getProductDetails->product_image) }}" alt="">
                                    <a href="{{ asset($getProductDetails->product_image) }}" class="lightbox-image"><i
                                            class="flaticon-search-2"></i></a>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                <div class="product-info">
                                    <h3>{{ $getProductDetails->product_name }}</h3>
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
                                        <p>{{ $getProductDetails->specification }}</p>
                                        <ul class="list clearfix">
                                            <li><h5>Video Url</h5></li>
                                            <li>{{ $getProductDetails->video_url }}</li>
                                            <li><h5>Features</h5></li>
                                            <li>{{ $getProductDetails->application }}</li>
                                            <li><h5>Information</h5></li>
                                            <li>{{ $getProductDetails->features }}</li>
                                            <li><h5>Information</h5></li>
                                            <li>{{ $getProductDetails->information }}</li>
                                        </ul>
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
                        <h2>Related Products</h2>
                        <p>There are some product that we featured for choose your best</p>
                        <span class="separator"
                            style="background-image: url(assets/images/icons/separator-2.png);"></span>
                    </div>
                    <div class="row clearfix">
                        @if ($products->count() > 0)
                        @foreach ($products->sortBy('date')->take(4) as $product)
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($product->image) }}" alt="">
                                    </figure>
                                    <div class="lower-content">
                                        <a href="">{{ $product->brand }}</a>
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