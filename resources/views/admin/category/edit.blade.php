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
			<div class="mb-4">
				<h4 class="mb-1">Category Form</h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Category</li>
					</ol>
				</nav>
			</div>
			<!-- End Page Header -->

            <div class="row justify-content-center">
                <div class="col-xl-8">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Update Category</h5>
						</div>
						<div class="card-body">
                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

							<div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="mb-3">
                                        <label for="category-input" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="category-input" name="name" value="{{ $category->name }}" placeholder="Enter category">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="mb-3">
                                        <label for="category-select" class="form-label">Status</label>
										<select class="form-select" id="status-select" name="status" value="{{ $category->status }}">
                                            <option value="">Select Status</option>
											<option value="1">Active</option>
											<option value="0">Inactive</option>
										</select>
									</div>
								</div>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
            @include('admin.layouts.footer');
            <!-- End Footer -->

        </div>
    </div>
</body>

</html>