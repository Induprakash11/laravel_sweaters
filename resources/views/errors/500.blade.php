<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body>
    <!-- Start Main Wrapper -->
    <div class="main-wrapper">


        <!-- ========================
            Start Page Content
        ========================= -->


        <!-- Start Content -->
        <div class="content pb-0">

            <!-- start row -->
            <div class="row justify-content-center align-items-center vh-100">

                <div class="col-md-8 d-flex align-items-center justify-content-center mx-auto">
                    <div>
                        <div class="error-img mb-4">
                            <img src="{{ asset('img/authentication/error-500.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="text-center">
                            <h2 class="mb-3">Oops, something went wrong</h2>
                            <p class="mb-3">Error 500 Page not found. Sorry the page you looking for <br> doesn’t exist
                                or has been moved</p>
                            <div class="pb-4">
                                <a href="{{ route('home') }}" class="btn btn-primary">
                                    <i class="ti ti-chevron-left me-1"></i>Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- End Content -->

        <!-- Start Footer -->
        @include('admin.layouts.footer')
        <!-- End Footer -->

    </div>
</body>

</html>