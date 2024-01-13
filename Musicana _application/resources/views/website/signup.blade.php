    @extends('website.layout.structure')
	@section('main_container')
  @include('sweetalert::alert')

    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>signup</h3>
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
          <h2 class="contact-title text-center">Registration</h2>
        </div>
        <div class="col-lg-12">
          <form class="form" action="{{url('/signup')}}" method="post" id="userRegistrationForm" enctype= multipart/form-data>
          @csrf
          <div class="row">
			  <div class="col-lg-2"></div>
                <div class="col-lg-8">
				<div class="col-sm-12">
                <div class="form-group">
				  <label>Name</label>
                  <input class="form-control" name="name" id="name" type="text" placeholder = "Enter your name">
                </div>
				@error('name')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
              </div>
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
				<label>Email</label>
                  <input class="form-control" name="email" id="email" type="email" placeholder ="Enter email address">
                </div>
				@error('email')
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
              <div class="col-sm-12">
                <div class="form-group">
				<label>Phone No</label>
                  <input class="form-control" name="phone" id="Password" type="number" placeholder ="Enter your phone numbre">
                </div>
				@error('phone')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
              </div>
			  <div class="col-sm-12">
                <div class="form-group">
				<label>Image</label>
                  <input class="form-control" name="file" id="file" type="file" placeholder = "image">
                </div>
				@error('file')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
              </div>
			   <div class="col-12">
				<div class="form-group form-control">
					<label>Gender</label>
					<input type="radio" name="gender" id="gender" value="Male" @if (old('gender') == 'Male') checked @endif>Male
					<input type="radio" name="gender" id="gender2" value="Female" @if (old('gender') == 'Female') checked @endif>Female
				</div>
				@error('gender')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>
			<div class="col-12">
			<div class="form-group form-control">
				<label class="mb-2">Language </label>
				<input type="checkbox" name="language[]" value="Hindi" id="hindi" @if (in_array('Hindi', old('language', []))) checked @endif>
				<label for="hindi">Hindi</label>
				<input type="checkbox" name="language[]" value="English" id="english" @if (in_array('English', old('language', []))) checked @endif>
				<label for="english">English</label>
				<input type="checkbox" name="language[]" value="Gujarati" id="gujarati" @if (in_array('Gujarati', old('language', []))) checked @endif>
				<label for="gujarati">Gujarati</label>
			</div>
			@error('language')
				<div class="alert alert-danger">{{$message}}</div>
			@enderror
		    </div>
            </div>
               </div>
            <div class="form-group mt-3 text-center">
              <button type="submit" name="submit" class="button button-userregisterForm btn_4 boxed-btn "class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
        
          </div>
        
          
        
      </div>
    </div>
  </section>
  @endsection
  <!-- ================ contact section end ================= -->

   
</body>

</html>