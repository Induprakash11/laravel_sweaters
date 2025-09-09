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
                        <h4 class="mb-1">Testimonial<span
                                class="badge badge-soft-primary ms-2">{{ count($testimonial) }}</span></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Testimonial</li>
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

                <!-- <button type="button" class="btn btn-info bg-gradient">Add Testimonial</button> -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">Testimonial Table</h4>
                                <a href="#" class="btn btn-primary" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvas_add_2">
                                    <i class="ti ti-plus me-1"></i>Add Testimonial
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-title-desc">

                                </p>

                                <div class="table-responsive">
                                    <table id="testimonial-table" class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Image</th>
                                                <th>name</th>
                                                <th>message</th>
                                                <th>Status</th>
                                                <th>rating</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
            @include('admin.layouts.footer');
            <!-- End Footer -->

        </div>
    </div>

    <!-- DataTables Scripts -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#testimonial-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("testimonial.index") }}',
                columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'message',
                    name: 'message'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'rating',
                    render: function (data, type, row) {
                        let starsHtml = '<div class="set-star rating-select filled">';
                        for (let i = 1; i <= 5; i++) {
                            if (i <= row.rating) {
                                starsHtml += '<i class="ti ti-star-filled text-warning fs-16 me-1"></i>';
                            } else {
                                starsHtml += '<i class="ti ti-star fs-16 me-1"></i>';
                            }
                        }
                        starsHtml += '</div>';
                        return starsHtml;
                    }
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
                ]
            });

            // Refresh button click event
            $(document).on('click', '.refresh-btn', function () {
                table.ajax.reload(null, false); // false = stay on same page
            });
        });
    </script>

    <!-- Add New Deals -->
    <div class="offcanvas offcanvas-end offcanvas-large" tabindex="-1" id="offcanvas_add_2" style="width: 30%">
        <div class="offcanvas-header border-bottom">
            <h5 class="fw-semibold">Add Testimonial</h5>
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
                            <label for="name-input" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name-input" name="name"
                                placeholder="Enter name">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="message-input" class="form-label">Message</label>
                            <textarea name="message" id="message" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="status-select" class="form-label">Status</label>
                            <select class="form-select" id="status-select" name="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <label for="rating-select" class="form-label">Rating</label>
                        <div class="mt-2">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio1" name="rating" value="1" class="form-check-input">
                                <label class="form-check-label" for="customRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio2" name="rating" value="2" class="form-check-input">
                                <label class="form-check-label" for="customRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio3" name="rating" value="3" class="form-check-input">
                                <label class="form-check-label" for="customRadio3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio4" name="rating" value="4" class="form-check-input">
                                <label class="form-check-label" for="customRadio4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio5" name="rating" value="5" class="form-check-input">
                                <label class="form-check-label" for="customRadio5">5</label>
                            </div>
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

    <!-- edit Testimonial -->
    <div class="offcanvas offcanvas-end offcanvas-large" tabindex="-1" id="offcanvas_edit" style="width: 30%">
        <div class="offcanvas-header border-bottom">
            <h5 class="mb-0">Edit Testimonial</h5>
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
                            <label for="name-input" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name-input" name="name"
                                placeholder="Enter name">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <textarea name="message" id="message-input"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="status-select" class="form-label">Status</label>
                            <select class="form-select" id="status-input" name="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mt-2">
                            <label for="rating-select" class="form-label">Rating</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio1" name="rating" value="1" class="form-check-input">
                                <label class="form-check-label" for="customRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio2" name="rating" value="2" class="form-check-input">
                                <label class="form-check-label" for="customRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio3" name="rating" value="3" class="form-check-input">
                                <label class="form-check-label" for="customRadio3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio4" name="rating" value="4" class="form-check-input">
                                <label class="form-check-label" for="customRadio4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadio5" name="rating" value="5" class="form-check-input">
                                <label class="form-check-label" for="customRadio5">5</label>
                            </div>
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
    <!-- /edit Testimonial -->

    <!-- delete modal -->
    <div class="modal fade" id="delete_testimonial">
        <div class="modal-dialog modal-dialog-centered modal-sm rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-body p-4 text-center position-relative">
                    <div class="mb-3 position-relative z-1">
                        <span class="avatar avatar-xl badge-soft-danger border-0 text-danger rounded-circle"><i
                                class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to remove testimonial you selected.</p>
                    <form id="delete-form" action="" method="POST" style="display:inline;">
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-light position-relative z-1 me-2 w-100"
                                data-bs-dismiss="modal">Cancel</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger position-relative z-1 w-100"
                                title="Delete" data-bs-dismiss="modal">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal -->

    <script>
        // create testimonial script
        document.addEventListener('DOMContentLoaded', function () {
            var createForm = document.getElementById('create-form');
            createForm.action = '{{ route("testimonial.store") }}';
        });

        //edit testimonial script
        document.addEventListener('DOMContentLoaded', function () {
            var editOffcanvas = document.getElementById('offcanvas_edit');
            var editForm = document.getElementById('edit-form');

            // Delegate click event for edit buttons
            document.querySelector('#testimonial-table').addEventListener('click', function (e) {
                if (e.target.closest('.edit-btn')) {
                    var button = e.target.closest('.edit-btn');
                    var testimonialId = button.getAttribute('data-id');

                    // Fetch testimonial data via AJAX
                    fetch('{{ url("testimonial") }}/' + testimonialId)
                        .then(response => response.json())
                        .then(data => {
                            // form fields
                            editForm.action = '{{ url("testimonial") }}/' + testimonialId;
                            editForm.querySelector('#name-input').value = data.name || '';
                            editForm.querySelector('#message-input').value = data.message || '';
                            editForm.querySelector('#status-input').value = data.status || '';
                            if (data.rating) {
                                let radio = editForm.querySelector(`input[name="rating"][value="${data.rating}"]`);
                                if (radio) {
                                    radio.checked = true;
                                }
                            }

                            var offcanvas = bootstrap.Offcanvas.getOrCreateInstance(editOffcanvas);
                            offcanvas.show();
                        })
                        .catch(error => {
                            console.error('Error fetching testimonial data:', error);
                        });
                }
            });
        });

        // delete testimonial script
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('delete_testimonial');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var testimonialId = button.getAttribute('data-id');
                var form = document.getElementById('delete-form');
                form.action = '{{ route("testimonial.index") }}/' + testimonialId;
            });
        });
    </script>

</body>

</html>