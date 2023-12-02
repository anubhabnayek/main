    @extends('website.layout.structure')
	@section('main_container')
  @include('sweetalert::alert')
    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>contact</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      

      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">contact</h2>
        </div>
        
              <div class="col-12">
              <form class="form-contact contact_form" action="{{url('/contact')}}" method="post" id="contactForm" enctype= multipart/form-data>
              @csrf
              
              <div class="col-sm-8">
                <div class="form-group">
                <lable>Name</lable>
                  <input class="form-control" name="name" id="name" type="text" placeholder = 'Enter your name'>
                    @error('name')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-8">
                <div class="form-group">
                <lable>Email</lable>
                  <input class="form-control" name="email" id="email" type="email"  placeholder = 'Enter email address'>
                  @error('email')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              
				   <div class="col-sm-8">
                <div class="form-group">
                  <lable>Comment</lable>
                  <input class="form-control" name="comment" id="comment" type="text" placeholder = 'Enter message'>
                  @error('comment')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="submit" class="button button-contactForm btn_4 boxed-btn">Send Message</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

   @endsection


  <!-- JS here -->
  <script src="js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/ajax-form.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
  <script src="js/scrollIt.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/nice-select.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/gijgo.min.js"></script>

  <!--contact js-->
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>

  <script src="js/main.js"></script>
</body>

</html>