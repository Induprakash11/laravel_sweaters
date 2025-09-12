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
                    <h1>Products</h1>
                    <ul class="bread-crumb clearfix">
                        <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>products</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- news-section -->
        <section class="blog-page-section blog-page-1 sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    @if ($getProducts->count() > 0)
                    @foreach ($getProducts->sortByDesc('date') as $product)
                        
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class=""><a href="{{ url('product_details/' . encodeId($product->id)) }}"><img src="{{ asset($product->image) }}" alt=""></a></figure>
                                <div class="lower-content">
                                    <span class="post-date">{{ $product->date }}</span>
                                    <h3><a href="{{ url('product_details/' . encodeId($product->id)) }}">{{ $product->brand }}</a></h3>
                                    <div class="link"><a href="{{ url('product_details/' . encodeId($product->id)) }}">Read More<i class="flaticon-right-1"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="pagination-wrapper centred">
                    <ul class="pagination clearfix">
                        <li><a href="shop.html">Prev</a></li>
                        <li><a href="shop.html">1</a></li>
                        <li><a href="shop.html" class="active">2</a></li>
                        <li><a href="shop.html">3</a></li>
                        <li><a href="shop.html">4</a></li>
                        <li><a href="shop.html">5</a></li>
                        <li><a href="shop.html">Next</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- news-section end -->

        @include('layout.footer')
</body><!-- End of .page_wrapper -->

</html>