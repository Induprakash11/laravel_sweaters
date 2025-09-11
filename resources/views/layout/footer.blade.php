<!-- main-footer -->
<footer class="main-footer">
  <div class="footer-top">
    <div class="auto-container">
      <div class="row clearfix">
        <div class="col-lg-6 col-md-12 col-sm-12 big-column">
          <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
              <div class="footer-widget logo-widget">
                <figure class="footer-logo"><a href="{{ route('home') }}"><img src="{{ asset('images/footer-logo.png') }}"
                      alt=""></a>
                </figure>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
              <div class="footer-widget links-widget">
                <div class="widget-title">
                  <h3>Category</h3>
                </div>
                <div class="widget-content">
                  <ul class="links-list clearfix">
                    @foreach ($category->sortByDesc('name')->take(6) as $cate)
                      <li><a href="{{ url('category/' . $cate->id) }}">{{ $cate->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
              <div class="footer-widget links-widget">
                <div class="widget-title">
                  <h3>Useful Link</h3>
                </div>
                <div class="widget-content">
                  <ul class="links-list clearfix">
                    <li><a href="">Home</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">Blogs</a></li>
                    <li><a href="">Testimonials</a></li>
                    <li><a href="">Contact</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 big-column">
          <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
              <div class="footer-widget contact-widget">
                <div class="widget-title">
                  <h3>Contact</h3>
                </div>
                <ul class="info-list clearfix">
                  <li>Peelamedu, <br />Coimbatore, IN</li>
                  <li><a href="tel:23055873407">+91 889-900-6363</a></li>
                  @if($users)
                    <li><a href="{{ $users->email }}">{{ $users->email }}</a></li>
                  @endif
                </ul>
                <ul class="footer-social clearfix">
                  @foreach($socialMediaUrl as $socialurl)
                    <li><a href="{{ $socialurl->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{ $socialurl->twitter }}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{ $socialurl->instagram }}"><i class="fab fa-instagram"></i></a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
              <div class="footer-widget newsletter-widget">
                <div class="widget-title">
                  <h3>Reach Us</h3>
                </div>
                <div class="widget-content">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.153274844438!2d77.0242267!3d11.027124599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8579a84aefe27%3A0x833cd6c8dbffa18c!2sIdreamdevelopers!5e0!3m2!1sen!2sin!4v1757506381050!5m2!1sen!2sin"
                    width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="auto-container clearfix">
      <ul class="cart-list pull-left clearfix">
        <li><p>Designed and Developed By <a href="" class="text-danger">Idreamdevelpoer</a></p></li>
      </ul>
      <div class="copyright pull-right">
        <p><a href="" class="text-primary">Sweaters India</a> &copy; 202 All Right Reserved</p>
      </div>
    </div>
  </div>
</footer>
<!-- main-footer end -->


<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
  <i class="fas fa-long-arrow-alt-up"></i>
</button>
</div>


<!-- jequery plugins -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/validation.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/TweenMax.min.js') }}"></script>
<script src="{{ asset('js/appear.js') }}"></script>
<script src="{{ asset('js/scrollbar.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/isotope.js') }}"></script>

<!-- main-js -->
<script src="{{ asset('js/script1.js') }}"></script>