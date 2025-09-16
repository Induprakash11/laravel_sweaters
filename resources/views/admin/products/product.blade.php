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
                        <h4 class="mb-1">Products<span
                                class="badge badge-soft-primary ms-2">{{ $productnew_count }}</span></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Products</li>
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

                <!-- <button type="button" class="btn btn-info bg-gradient">Add Products</button> -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">Products Table</h4>
                                <a href="#" class="btn btn-primary" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvas_add_2">
                                    <i class="ti ti-plus me-1"></i>Add Product
                                </a>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="productnew-table" class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Category</th>
                                                <th>Product_name</th>
                                                <th>Product_image</th>
                                                <th>specification</th>
                                                <th>information</th>
                                                <th>video_url</th>
                                                <th>Features</th>
                                                <th>application</th>
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
    <div class="offcanvas offcanvas-end offcanvas-large" tabindex="-1" id="offcanvas_add_2">
        <div class="offcanvas-header border-bottom">
            <h5 class="fw-semibold">Add Products</h5>
            <button type="button"
                class="btn-close custom-btn-close border p-1 me-0 d-flex align-items-center justify-content-center rounded-circle"
                data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="ti ti-x"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <form id="create-form" action="" enctype="multipart/form-data" method="POST">
                @csrf
                @method('POST')
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="category-input" class="form-label">Category</label>
                            <select class="form-select" id="category-input" name="category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="product_name-input" class="form-label">Product_name</label>
                            <input type="text" class="form-control" id="product_name-input" name="product_name"
                                placeholder="Enter product_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="specification-input" class="form-label">Specification</label>
                            <input type="text" class="form-control" id="specification-input" name="specification"
                                placeholder="Enter specification">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="video_url-input" class="form-label">Video_url</label>
                            <input type="text" class="form-control" id="video_url-input" name="video_url"
                                placeholder="Enter video_url">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="information-input" class="form-label">Information</label>
                            <input type="text" class="form-control" id="information-input" name="information"
                                placeholder="Enter information">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="features-input" class="form-label">Features</label>
                            <input type="text" class="form-control" id="features-input" name="features"
                                placeholder="Enter features">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="application-input" class="form-label">Application</label>
                            <input type="text" class="form-control" id="application-input" name="application"
                                placeholder="Enter APPLICATION">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="category-input" class="form-label">Status</label>
                            <select class="form-select" id="status-input" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="product_image-input" class="form-label">Product_image</label>
                            <input class="form-control" type="file" id="product_image-input" name="product_image">
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

    <!-- edit Product -->
    <div class="offcanvas offcanvas-end offcanvas-large" tabindex="-1" id="offcanvas_edit">
        <div class="offcanvas-header border-bottom">
            <h5 class="mb-0">Edit Product</h5>
            <button type="button"
                class="btn-close custom-btn-close border p-1 me-0 d-flex align-items-center justify-content-center rounded-circle"
                data-bs-dismiss="offcanvas" aria-label="Close">
            </button>
        </div>
        <div class="offcanvas-body">
            <form id="edit-form" action="" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="category-input" class="form-label">Category</label>
                            <select class="form-select" id="edit-category-input" name="category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="product_name-input" class="form-label">Product_name</label>
                            <input type="text" class="form-control" id="edit-product_name-input" name="product_name"
                                placeholder="Enter product_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="specification-input" class="form-label">Specification</label>
                            <input type="text" class="form-control" id="edit-specification-input" name="specification"
                                placeholder="Enter specification">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="video_url-input" class="form-label">Video_url</label>
                            <input type="text" class="form-control" id="edit-video_url-input" name="video_url"
                                placeholder="Enter video_url">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="information-input" class="form-label">Information</label>
                            <input type="text" class="form-control" id="edit-information-input" name="information"
                                placeholder="Enter information">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="features-input" class="form-label">Features</label>
                            <input type="text" class="form-control" id="edit-features-input" name="features"
                                placeholder="Enter features">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="application-input" class="form-label">Application</label>
                            <input type="text" class="form-control" id="edit-application-input" name="application"
                                placeholder="Enter APPLICATION">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status-input" class="form-label">Status</label>
                            <select class="form-select" id="edit-status-input" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="product_image-input" class="form-label">Product_image</label>
                            <img id="edit-image-preview" src="" alt="Preview" style="max-height:80px; display:none;">
                            <input class="form-control" type="file" id="edit-product_image-input" name="product_image">
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
    <!-- /edit Product -->

    <!-- DataTables Scripts -->

    <script>
        var table;
        document.addEventListener("DOMContentLoaded", function () {
            table = $('#productnew-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("productnew.index") }}',
                deferRender: true,
                pageLength: 10,
                responsive: true,
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'category', name: 'category' },
                    { data: 'product_name', name: 'product_name' },
                    { data: 'product_image', name: 'product_image', orderable: false, searchable: false },
                    {
                        data: 'specification', name: 'specification', render: function (data) {
                            return data && data.length > 30 ? data.substr(0, 30) + '...' : data;
                        }
                    },
                    {
                        data: 'video_url', name: 'video_url', render: function (data) {
                            return data && data.length > 30 ? data.substr(0, 30) + '...' : data;
                        }
                    },
                    {
                        data: 'information', name: 'information', render: function (data) {
                            return data && data.length > 30 ? data.substr(0, 30) + '...' : data;
                        }
                    },
                    {
                        data: 'features', name: 'features', render: function (data) {
                            return data && data.length > 30 ? data.substr(0, 30) + '...' : data;
                        }
                    },
                    {
                        data: 'application', name: 'application', render: function (data) {
                            return data && data.length > 30 ? data.substr(0, 30) + '...' : data;
                        }
                    },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                dom: 'lfrtip',
                initComplete: function () {
                    $('#loading').hide();
                }
            });
        });

        // Refresh button click event
        $(document).on('click', '.refresh-btn', function () {
            table.ajax.reload(null, true);
        });

        // Create form AJAX submission
        $("#create-form").submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: '{{ route("productnew.store") }}',
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire({ icon: 'success', title: 'Success', text: response.success });
                    $("#create-form")[0].reset();
                    $("#edit-image-preview").hide().attr("src", "");
                    $('#offcanvas_add_2').offcanvas('hide');
                    table.ajax.reload(null, false);
                },
                error: function () {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong.' });
                }
            });
        });

        // Edit button click event
        $(document).on('click', '.edit-btn', function () {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route("productnew.show", ":id") }}'.replace(':id', id),
                method: 'GET',
                success: function (data) {
                    if (data.product_image) {
                        $("#edit-product_image-preview").attr("src", "/" + data.product_image).show();
                    } else {
                        $("#edit-product_image-preview").hide();
                    }

                    $('#edit-status-input').val(data.status);
                    $('#edit-product_name-input').val(data.product_name);
                    $('#edit-video_url-input').val(data.video_url);
                    $('#edit-information-input').val(data.information);
                    $('#edit-features-input').val(data.features);
                    $('#edit-application-input').val(data.application);
                    $('#edit-category-input').val(data.category);
                    $('#edit-specification-input').val(data.specification);
                    $('#edit-form').attr('action', '{{ route("productnew.update", ":id") }}'.replace(':id', id));

                    let offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvas_edit'));
                    offcanvas.show();
                },
                error: function () {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong while fetching data.' });
                }
            });
        });

        // Edit form AJAX submission
        $("#edit-form").submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            formData.append('_method', 'PUT');

            $.ajax({
                url: $("#edit-form").attr('action'),
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire({ icon: 'success', title: 'Success', text: response.success });
                    $("#edit-form")[0].reset();
                    $("#edit-image-preview").hide().attr("src", "");
                    $('#offcanvas_edit').offcanvas('hide');
                    table.ajax.reload(null, false);
                },
                error: function () {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong while updating.' });
                }
            });
        });

        // Delete form submission
        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault();

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
                            table.ajax.reload(null, false);
                        },
                        error: function () {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });

        // Show success message from session (delete)
        @if(session('success'))
            Swal.fire({ icon: 'success', title: 'Success', text: '{{ session("success") }}' });
        @endif
    </script>

</body>

</html>