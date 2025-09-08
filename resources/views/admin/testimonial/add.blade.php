<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body>
    <!-- Start Main Wrapper -->
    <div class="main-wrapper">

        <!-- Topbar Start -->
        @include('admin.layouts.header')
        <!-- Topbar End -->

        <!-- Sidenav Menu Start -->
        @include('admin.layouts.sidebar')
        <!-- Sidenav Menu End -->

        <!-- ========================
            Start Page Content
        ========================= -->

        <div class="page-wrapper">

            <!-- Start Content -->
            <div class="content pb-0">
                <!-- Page Header -->
                <div class="mb-4">
                    <h4 class="mb-1">Testimonial Form</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Testimonial</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Page Header -->

                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Create Testimonial</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('testimonial.store') }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                            <div class="mb-3">
                                                <label for="name-input" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name-input" name="name" value="{{ old('name', $testimonial->name ?? '') }}"
                                                    placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="mb-3">
                                                <textarea name="message" id="message">{{ old('message', $testimonial->message ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="mb-3">
                                                <label for="status-select" class="form-label">Status</label>
                                                <select class="form-select" id="status-select" name="status">
                                                    <option value="">Select Status</option>
                                                    <option value="1" {{ old('status', $testimonial->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $testimonial->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="mt-2">
                                                <label for="rating-select" class="form-label">Rating</label>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadio1" name="rating" value="1"
                                                        class="form-check-input" {{ old('rating', $testimonial->rating ?? '') == '1' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="customRadio1">1 star</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadio2" name="rating" value="2"
                                                        class="form-check-input" {{ old('rating', $testimonial->rating ?? '') == '2' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="customRadio2">2 star</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadio3" name="rating" value="3"
                                                        class="form-check-input" {{ old('rating', $testimonial->rating ?? '') == '3' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="customRadio3">3 star</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadio4" name="rating" value="4"
                                                        class="form-check-input" {{ old('rating', $testimonial->rating ?? '') == '4' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="customRadio4">4 star</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadio5" name="rating" value="5"
                                                        class="form-check-input" {{ old('rating', $testimonial->rating ?? '') == '5' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="customRadio5">5 star</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="mb-3">
                                                <label for="image-input" class="form-label">Image</label>
                                                <input class="form-control" type="file" id="image-input" name="image">
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>

            </div>
            <!-- End Content -->

            <!-- Start Footer -->
            @include('admin.layouts.footer')
            <!-- End Footer -->

        </div>
    </div>
</body>

</html>