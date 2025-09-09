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
                                        <h1 class="mb-1 fs-24">{{ $products->count() }}</h1>
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
                                        <h2 class="mb-1 fs-24">{{ $blogs->count() }}</h2>
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
                                        <h2 class="mb-1 fs-24">{{ $category->count() }}</h2>
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

    <!-- DataTables Scripts -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#blogs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("blogs.index") }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'title', name: 'title' },
                    { data: 'message', name: 'message' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
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
            <h5 class="fw-semibold">Add Blogs</h5>
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
                            <label for="title-input" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title-input" name="title"
                                placeholder="Enter title">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="message-input" class="form-label">Message</label>
                            <input type="text" class="form-control" id="message-input" name="message"
                                placeholder="Enter message">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="category-select" class="form-label">Status</label>
                            <select class="form-select" id="status-select" name="status">
                                <option value="">Select Status</option>
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

    <!-- edit Blog -->
    <div class="offcanvas offcanvas-end offcanvas-large" tabindex="-1" id="offcanvas_edit" style="width: 30%">
        <div class="offcanvas-header border-bottom">
            <h5 class="mb-0">Edit Blog</h5>
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
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="title-input" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title-input" name="title"
                                placeholder="Enter title">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="message-input" class="form-label">Message</label>
                            <input type="text" class="form-control" id="message-input" name="message"
                                placeholder="Enter message">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="category-select" class="form-label">Status</label>
                            <select class="form-select" id="status-input" name="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="image-input" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image-input" name="image" v>
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
    <!-- /edit Blog -->

    <!-- delete modal -->
    <div class="modal fade" id="delete_blog">
        <div class="modal-dialog modal-dialog-centered modal-sm rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-body p-4 text-center position-relative">
                    <div class="mb-3 position-relative z-1">
                        <span class="avatar avatar-xl badge-soft-danger border-0 text-danger rounded-circle"><i
                                class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Delete Confirmation</h5>
                    <p class="mb-3">Are you sure you want to remove blog you selected.</p>
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
        // create blog script
        document.addEventListener('DOMContentLoaded', function () {
            var createForm = document.getElementById('create-form');
            createForm.action = '{{ route("blogs.store") }}';
        });

        //edit blog script
        document.addEventListener('DOMContentLoaded', function () {
            var editOffcanvas = document.getElementById('offcanvas_edit');
            var editForm = document.getElementById('edit-form');

            // Delegate click event for edit buttons
            document.querySelector('#blogs-table').addEventListener('click', function (e) {
                if (e.target.closest('.edit-btn')) {
                    var button = e.target.closest('.edit-btn');
                    var blogId = button.getAttribute('data-id');

                    // Fetch blog data via AJAX
                    fetch('{{ url("blogs") }}/' + blogId)
                        .then(response => response.json())
                        .then(data => {
                            // form fields
                            editForm.action = '{{ url("blogs") }}/' + blogId;
                            editForm.querySelector('#title-input').value = data.title || '';
                            editForm.querySelector('#message-input').value = data.message || '';
                            editForm.querySelector('#status-input').value = data.status || '';

                            var offcanvas = bootstrap.Offcanvas.getOrCreateInstance(editOffcanvas);
                            offcanvas.show();
                        })
                        .catch(error => {
                            console.error('Error fetching blog data:', error);
                        });
                }
            });
        });

        // delete blog script
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('delete_blog');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var blogId = button.getAttribute('data-id');
                var form = document.getElementById('delete-form');
                form.action = '{{ route("blogs.index") }}/' + blogId;
            });
        });
    </script>
</body>

</html>