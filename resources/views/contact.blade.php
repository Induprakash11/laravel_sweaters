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
            <div class="pattern-layer" style="background-image: url({{ asset('images/background/page-title.jpg') }});"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Contact us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>Contact us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- google-map-section -->
        <section class="google-map-section">
            <div class="map-column">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.153274844438!2d77.0242267!3d11.027124599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8579a84aefe27%3A0x833cd6c8dbffa18c!2sIdreamdevelopers!5e0!3m2!1sen!2sin!4v1757506381050!5m2!1sen!2sin"
                    style="border:0; height: 700px; width: 1280px;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        <!-- google-map-section -->

        <!-- contact-section -->
        <section class="contact-section">
            <div class="auto-container">
                <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 big-column">
                    <div class="sec-title">
                        <h2>Get In Touch</h2>
                        <p>Excepteur sint occaecat cupidatat non proident sunt</p>
                        <span class="separator"
                            style="background-image: url({{ asset('images/icons/separator-1.png') }});"></span>
                    </div>
                    <div class="form-inner">
                        <form method="post" id="contact-form" class="default-form" novalidate>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="name" id="name" placeholder="Name" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="email" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="subject" id="subject" placeholder="Subject" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="phone" id="phone" placeholder="Phone" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" id="message" placeholder="Message"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                    <button type="submit" class="theme-btn-two" name="submit-form">Submit Message<i
                                            class="flaticon-right-1"></i></button>
                                            <div id="responseMsg" class="mt-3"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->

        @include('layout.footer')
        <script>
            $(document).ready(function () {
                $("#contact-form").submit(function (e) {
                    e.preventDefault();

                    // Get values using IDs
                    let name = ($("#name").val() || "").trim();
                    let phone = ($("#phone").val() || "").trim();
                    let email = ($("#email").val() || "").trim();
                    let subject = ($("#subject").val() || "").trim();
                    let message = ($("#message").val() || "").trim();

                    // Basic validation
                    if (name === "" || phone === "" || email === "" || subject === "" || message === "") {
                        $("#responseMsg").html("<span style='color:red'>All fields are required.</span>");
                        return false;
                    }

                    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                        $("#responseMsg").html("<span style='color:red'>Enter a valid email address.</span>");
                        return false;
                    }

                    // AJAX request
                    $.ajax({
                        url: "{{ route('contactstore') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            name: name,
                            phone: phone,
                            email: email,
                            subject: subject,
                            message: message
                        },
                        success: function (response) {
                            $("#responseMsg").html("<span style='color:green'>" + response.success + "</span>");
                            $("#contact-form")[0].reset();
                        },
                        error: function (xhr) {
                            $("#responseMsg").html("<span style='color:red'>Something went wrong.</span>");
                        }
                    });
                });
            });
        </script>
</body><!-- End of .page_wrapper -->

</html>