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
                <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                    <div>
                        <h4 class="mb-1">Banner<span class="badge badge-soft-primary ms-2">{{ $banner_count }}</span>
                        </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Banner</li>
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

                <!-- <button type="button" class="btn btn-info bg-gradient">Add Banner</button> -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">Banner Table</h4>
                                <a href="#" class="btn btn-primary" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvas_add_2">
                                    <i class="ti ti-plus me-1"></i>Add Banner
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-title-desc">

                                </p>

                                <div class="table-responsive">
                                    <table id="banner-table" class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div id="loading">
                                                <p>Datas Loading...</p>
                                            </div>
                                        </tbody>
                                    </table>
                                </div>

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

    <!-- Add New Deals -->
    <div class="offcanvas offcanvas-end offcanvas-large" tabindex="-1" id="offcanvas_add_2" style="width: 30%">
        <div class="offcanvas-header border-bottom">
            <h5 class="fw-semibold">Add Banner</h5>
            <button type="button"
                class="btn-close custom-btn-close border p-1 me-0 d-flex align-items-center justify-content-center rounded-circle"
                data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="ti ti-x"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <form id="create-form" enctype="multipart/form-data" method="POST">
                @csrf
                @method('POST')
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="category-select" class="form-label">Status</label>
                            <select class="form-select" id="status-input" name="status">

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="image-input" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image-input" name="image">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <button type="button" data-bs-dismiss="offcanvas" class="btn btn-light me-2">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- /Add New Deals -->

    <!-- edit Banner -->
    <div class="offcanvas offcanvas-end offcanvas-large" tabindex="-1" id="offcanvas_edit" style="width: 30%">
        <div class="offcanvas-header border-bottom">
            <h5 class="mb-0">Edit Banner</h5>
            <button type="button"
                class="btn-close custom-btn-close border p-1 me-0 d-flex align-items-center justify-content-center rounded-circle"
                data-bs-dismiss="offcanvas" aria-label="Close">
            </button>
        </div>
        <div class="offcanvas-body">
            <form id="edit-form" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="category-select" class="form-label">Status</label>
                            <select class="form-select" id="edit-status-input" name="status">

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="image-input" class="form-label">Image</label>
                            <input class="form-control" type="file" id="edit-image-input" name="image">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <button type="button" data-bs-dismiss="offcanvas" class="btn btn-light me-2">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /edit Banner -->




    <!-- DataTables Scripts -->


    <script>
        $(document).ready( function () {
            var table = $('#banner-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("banner.index") }}',
                deferRender: true,
                
                pageLength: 10,
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                dom: 'lfrtip',
                responsive: true,
                initComplete: function () {
                    $('#loading').hide();
                }
            });
        });

        // Refresh button click event
        $(document).on('click', '.refresh-btn', function () {
            table.ajax.reload(null, false); // false = stay on same page
        });


        // Create form AJAX submission
        $("#create-form").submit(function (e) {
            e.preventDefault();

            // Get values
            let status = $("#status-input").val();
            let image = $("#image-input")[0].files[0];

            // Basic validation
            if (status === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Status is required.'
                });
                return false;
            }

            // Image validation if provided
            if (image) {
                let allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/PNG', 'image/JPG'];
                if (!allowedTypes.includes(image.type)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Invalid image type. Only JPEG, PNG, JPG, GIF allowed.'
                    });
                    return false;
                }
                if (image.size > 5120 * 1024) { // 5MB
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Image size must be less than 5MB.'
                    });
                    return false;
                }
            }

            // Prepare FormData
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('status', status);
            if (image) {
                formData.append('image', image);
            }

            // AJAX request
            $.ajax({
                url: '{{ route("banner.store") }}',
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.success
                    });
                    // Reset + clear preview
                    $("#edit-form")[0].reset();
                    $("#edit-image-preview").hide().attr("src", "");
                    $('#offcanvas_add_2').offcanvas('hide');
                    table.ajax.reload(null, false);
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong.'
                    });
                }
            });
        });


        // Edit button click event + form submission
        $(document).on('click', '.edit-btn', function () {
            var id = $(this).data('id');

            // Fetch existing data
            $.ajax({
                url: '{{ route("banner.show", ":id") }}'.replace(':id', id),
                method: 'GET',
                success: function (data) {
                    // Fill form fields
                    $('#edit-status-input').val(data.status);
                    $('#edit-form').attr('action', '{{ route("banner.update", ":id") }}'.replace(':id', id));

                    // Show the offcanvas/modal
                    $('#offcanvas_edit').offcanvas('show');
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong while fetching data.'
                    });
                }
            });
        });

        // Edit form AJAX submission
        $("#edit-form").submit(function (e) {
            e.preventDefault();

            let status = $("#edit-status-input").val();
            let image = $("#edit-image-input")[0].files[0];

            // Validation
            if (status === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Status is required.'
                });
                return false;
            }

            if (image) {
                let allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!allowedTypes.includes(image.type)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Invalid image type. Only JPEG, PNG, JPG, GIF allowed.'
                    });
                    return false;
                }
                if (image.size > 5120 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Image size must be less than 5MB.'
                    });
                    return false;
                }
            }

            // Prepare FormData
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');
            formData.append('status', status);
            if (image) {
                formData.append('image', image);
            }

            // AJAX request
            $.ajax({
                url: $("#edit-form").attr('action'),
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.success
                    });
                    // Reset + clear preview
                    $("#edit-form")[0].reset();
                    $("#edit-image-preview").hide().attr("src", "");
                    $('#offcanvas_edit').offcanvas('hide');
                    if (typeof table !== "undefined") {
                        table.ajax.reload(null, false);
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong while updating.'
                    });
                }
            });
        });

        // Delete form submission with SweetAlert confirmation
        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let url = $(this).data('url');

            Swal.fire({
                title: 'Are you sure?',
                text: "This record will be deleted permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success: function (response) {
                            Swal.fire('Deleted!', response.message, 'success');
                            $('#banner-table').DataTable().ajax.reload(); // reload table
                        },
                        error: function (xhr) {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });


        // Show success message from session (for delete)
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session("success") }}'
            });
        @endif
    </script>
</body>

</html>