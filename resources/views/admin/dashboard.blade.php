<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head');

<body>
    <!-- Start Main Wrapper -->
    <div class="main-wrapper">

        <!-- Topbar Start -->
        @include('admin.layouts.header');
        <!-- Topbar End -->

        <!-- Sidenav Menu Start -->
        @include('admin.layouts.sidebar');
        <!-- Sidenav Menu End -->

        <!-- ========================
            Start Page Content
        ========================= -->

        <div class="page-wrapper">

            <!-- Start Content -->
            <div class="content pb-0">
                <!-- Page Header -->
                <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                    <div>
                        <h4 class="mb-1">Dashboard<span class="badge badge-soft-primary ms-2"></span>
                        </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                            </ol>
                        </nav>
                    </div>
                    <div class="gap-2 d-flex align-items-center flex-wrap">
                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow refresh-btn"
                            data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh"
                            data-bs-original-title="Refresh">
                            <i class="ti ti-refresh"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow"
                            data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Collapse"
                            data-bs-original-title="Collapse" id="collapse-header"><i
                                class="ti ti-transition-top"></i></a>
                    </div>
                </div>
                <!-- End Page Header -->

                <!-- Start Welcome Wrap -->
                <div class="welcome-wrap mb-4">
                    <div class=" d-flex align-items-center justify-content-between flex-wrap gap-3 bg-dark rounded p-4">
                        <div class="">
                            <h2 class="mb-1 text-white fs-24">Welcome Back, {{ $user->name }}</h2>
                            <p class="text-light fs-14 mb-0"></p>
                        </div>
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            {{-- <a href="company.html" class="btn btn-danger btn-sm"></a> --}}
                            <a href="{{ route('profile.edit') }}" class="btn btn-light btn-sm">Profile Settings</a>
                        </div>
                    </div>
                </div>
                <!-- Endc Welcome Wrap -->

                <!-- start row -->
            <div class="row row-gap-3 mb-4">
                <!-- Total Companies -->
                <div class="col-xl-3 col-sm-6 d-flex">
                    <div class="card flex-fill mb-0 position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <p class="fs-14 mb-1">Total Products</p>
                                        <h1 class="mb-1 fs-24">{{ $products }}</h1>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="avatar avatar-md rounded-circle bg-soft-primary border border-primary">
                                        <i class="ti ti-shopping-bag fs-16 text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('img/icons/elemnt-01.svg') }}" alt="elemnt-04" class="img-fluid position-absolute top-0 Start-0">
                    </div>
                </div>
                <!-- /Total Companies -->

                <!-- Total Companies -->
                <div class="col-xl-3 col-sm-6 d-flex">
                    <div class="card flex-fill mb-0 position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <p class="fs-14 mb-1">Total Blogs</p>
                                        <h2 class="mb-1 fs-24">{{ $blogs }}</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="avatar avatar-md rounded-circle bg-soft-success border border-success">
                                        <i class="ti ti-folder-open fs-16 text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('img/icons/elemnt-02.svg') }}" alt="elemnt-04" class="img-fluid position-absolute top-0 Start-0">
                    </div>
                </div>
                <!-- /Total Companies -->

                <!-- Total Companies -->
                <div class="col-xl-3 col-sm-6 d-flex">
                    <div class="card flex-fill mb-0 position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <p class="fs-14 mb-1">Total Users</p>
                                        <h2 class="mb-1 fs-24">{{ $user->count() }}</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="avatar avatar-md rounded-circle bg-soft-warning border border-warning">
                                        <i class="ti ti-user-circle fs-16 text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('img/icons/elemnt-03.svg') }}" alt="elemnt-04" class="img-fluid position-absolute top-0 Start-0">
                    </div>
                </div>
                <!-- /Total Companies -->

                <!-- Total Companies -->
                <div class="col-xl-3 col-sm-6 d-flex">
                    <div class="card flex-fill mb-0 position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <p class="fs-14 mb-1">Total Category</p>
                                        <h2 class="mb-1 fs-24">{{ $category }}</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="avatar avatar-md rounded-circle bg-soft-danger border border-danger mb-3">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-danger icon-tabler icons-tabler-outline icon-tabler-category"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h6v6h-6z" /><path d="M14 4h6v6h-6z" /><path d="M4 14h6v6h-6z" /><path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('img/icons/elemnt-04.svg') }}" alt="elemnt-04" class="img-fluid position-absolute top-0 Start-0">
                    </div>
                </div>
                <!-- /Total Companies -->

            </div>
            <!-- end row -->
            </div>
            <!-- End Content -->

            <!-- Start Footer -->
            @include('admin.layouts.footer');
            <!-- End Footer -->

        </div>
    </div>
</body>

</html>