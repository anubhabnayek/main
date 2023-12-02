@extends('website.layout.structure')
@section('main_container')

    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
          
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Song Category</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
    <!-- music_area  -->
    <div class="music_area music_gallery inc_padding">
        <div class="container">
            <div class="row">
            @if ($data->count() > 0)
               <div class="col-12">
                            <h2 class="contact-title text-center">Song Category</h2>
                        </div>
                        @foreach($data as $d)
						 <div class="col-md-3 p-3">
                            <div class="card">
                                <a href="{{url('/song/'.$d->id)}}">
                                    <img src="{{url('admin/upload/songcategory/'.$d->category_image)}}" alt="{{$d->category_image}}" class="card-img-top" width="200px" />
                                    <div class="card-body">
                                        <div class="name">
                                            <h2>{{$d->category_name}}</h2>
                                            @if (isset($d->created_at) && $d->created_at != '')
                                                <p>Created on {{date('d-m-Y', strtotime($d->created_at))}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                    <div class="col-12">
                        <h2 class="contact-title text-center">Currently there is no song category available. Please visit later.</h2>
                    </div>
              @endif

            </div>
        </div>
    </div>
    <!-- music_area end  -->

    <!-- youtube_video_area  -->
    
    <!-- / youtube_video_area  -->

    <!-- contact_rsvp -->
    <div class="contact_rsvp">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text text-center">
                        <h3>Contact For RSVP</h3>
                        <a class="boxed-btn3" href="contact.html">Contact Me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ contact_rsvp -->

   @endsection

    <!-- link that opens popup -->

    <!-- JS here -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
            crossorigin="anonymous">
    </script>
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
    <script src="js/audioplayer.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/slick.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    
		<script>
                $(function() {
                    $('audio').audioPlayer({

                    });
                });
            </script>
</body>

</html>