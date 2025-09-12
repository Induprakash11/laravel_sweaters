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
            <div class="pattern-layer" style="background-image: url({{ asset('images/background/page-title.jpg')  }})">
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Testimonials</h1>
                    <ul class="bread-crumb clearfix">
                        <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>Testimonials</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- testimonial-section -->
        <section class="testimonial-section mt-5">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>Testimonials</h2>
                    <p>Excepteur sint occaecat cupidatat non proident sunt</p>
                    <span class="separator"
                        style="background-image: url({{ asset('images/icons/separator-1.png') }})"></span>
                </div>

                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none">
                    @if($testimonials->count() > 0)
                        @foreach ($testimonials->sortByDesc('date')->take(3) as $testimonial)
                            <div class="testimonial-block-one">
                                <div class="inner-box">
                                    <div class="box">
                                        <p>{{ $testimonial->message }}</p>
                                        <h4>{{ $testimonial->name }}</h4>

                                        {{-- ⭐ Rating Stars --}}
                                        <div class="set-star rating-select filled">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $testimonial->rating)
                                                    <i class="fas fa-star text-warning fs-16 me-1"></i>
                                                @else
                                                    <i class="far fa-star text-warning fs-16 me-1"></i>
                                                @endif
                                            @endfor
                                        </div>

                                    </div>

                                    <figure class="thumb-box">
                                        <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}">
                                    </figure>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">No testimonials available.</p>
                    @endif
                </div>
            </div>
        </section>

        <!-- testimonial-section end -->

        @include('layout.footer')
</body><!-- End of .page_wrapper -->

</html>