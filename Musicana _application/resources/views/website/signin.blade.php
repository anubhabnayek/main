    @extends('website.layout.structure')
	@section('main_container')
   @include('sweetalert::alert')

    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>signin</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
       


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title text-center">Login</h2>
        </div>
        <div class="col-lg-12">
          <form class="form-contact contact_form" action="{{url('/login_auth')}}" method="post" id="userLoginForm">
           @csrf
			<div class="row">
			  <div class="col-lg-2"></div>
                <div class="col-lg-8">
				
              <div class="col-12">
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" name="username" id="username" type="text" placeholder = "Enter your username" >
                </div>
				@error('username')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
              </div>
              
              <div class="col-sm-12">
                <div class="form-group">
				<label>Password</label>
                  <input class="form-control" name="password" id="password" type="password" placeholder ="Enter your password">
                </div>
				@error('password')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
              </div>
             
			 
			   
			
            </div>
               </div>
            <div class="form-group mt-3 text-center">
              <button type="submit" name="submit" class="button button-userregisterForm btn_4 boxed-btn">Submit</button>
            </div>
          </form>
        </div>
        
          </div>
        
          
        
      </div>
    </div>
  </section>
  @endsection
  <!-- ================ contact section end ================= -->

    <!-- footer start -->
    
    <!--/ footer end  -->

</body>

</html>