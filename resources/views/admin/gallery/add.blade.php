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
				<h4 class="mb-1">Gallery Form</h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Gallery</li>
					</ol>
				</nav>
			</div>
			<!-- End Page Header -->

            <div class="row justify-content-center">
                <div class="col-xl-8">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Create Gallery</h5>
						</div>
						<div class="card-body">
                        <form action="{{ route('gallery.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('POST')
							<div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="mb-3">
                                        <label for="title-input" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title-input" name="title" placeholder="Enter title">
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