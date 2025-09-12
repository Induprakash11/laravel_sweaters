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
                    <h1>Our Service</h1>
                    <ul class="bread-crumb clearfix">
                        <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>Our Service</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- service-page-section -->
        <section class="service-page-section">
            <div class="auto-container">
                @if($events->count() > 0)
                    @foreach ($events->sortBy('date')->take(3) as $event)
                        <div class="service-block-two mb-100">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image-box mr-30">
                                            <img src="{{ $event->image }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                                        <div class="content-box ml-30 mr-100">
                                            <h2>
                                                <p>
                                                    {{ $event->title }}
                                                </p>
                                            </h2>
                                            <p>{{ $event->description }}</p>
                                            <a href="" class="theme-btn-one">
                                                View Catalog <i class="flaticon-right-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">No events available at the moment.</p>
                @endif
            </div>
        </section>
        <!-- service-page-section end -->

        @include('layout.footer')
</body><!-- End of .page_wrapper -->

</html>