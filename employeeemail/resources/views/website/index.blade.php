@extends('website.layout.structure')

@section('main_container')
@include('sweetalert::alert')
 <style>
.btn.custom-btn {
    background-color:  black; /* Set your desired background color */
    color: #FFFFFF; /* Set your desired text color */
}
</style>
<body>

    @if(session('sucess'))  
     <div class="alert alert-success">
     {{session('sucess')}}
     </div>
     @endif



  <div class="container col-md-6 my-4">
  <h2 class="" style="color: blue; text-align: center;">
                   Employee Signup
                </h2>
  <form action=""{{url('/')}}"" method="post" enctype="multipart/form-data">
  <div class="form-group">
    @csrf
    <label for="Name">Name<span style="color: red">*</span></label>
    <input type="text" class="form-control" name="name"  placeholder="Enter name">
	 @error('name')
      <p class="text-danger">{{ $message }}</p>
     @enderror
  </div>
  <br>
  <div class="form-group">
    <label for="email">Email<span style="color: red">*</span></label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
	@error('email')
      <p class="text-danger">{{ $message }}</p>
     @enderror
  </div><br>
  <div class="form-group">
    <label for="date of birth">user name<span style="color: red">*</span></label>
    <input type="text" class="form-control" name="username"  placeholder="Enter username">
	@error('username')
      <p class="text-danger">{{ $message }}</p>
     @enderror
  </div>
  <br>
   <div class="form-group">
    <label for="phone no">password<span style="color: red">*</span></label>
    <input type="password" class="form-control" name="password" placeholder="Enter password">
	@error('password')
      <p class="text-danger">{{ $message }}</p>
     @enderror
  </div>
  <br>
  
  <div class="form-group">
    <label for="phone">phone<span style="color: red">*</span></label>
    <input type="text" class="form-control" name="mobile" value="" placeholder="Enter phone number">
	@error('mobile')
      <p class="text-danger">{{ $message }}</p>
     @enderror
  </div>
  
  <!--<div class="form-group">
                <textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea>
            </div-->
 <br>
  <div class="form-group">
    <label for="gender">Gender<span style="color: red">*</span></label>
    Male:<input type="radio" name="gender" value="male">
    Female:<input type="radio" name="gender" value="female">
    other:<input type="radio" name="gender" value="other">
	@error('gender')
      <p class="text-danger">{{ $message }}</p>
     @enderror
    </div>
	<br>
	<div class="form-group">
    <label for="department">Department<span style="color: red">*</span></label>
    <input type="text" class="form-control" name="department"  placeholder="Enter department">
	@error('department')
      <p class="text-danger">{{ $message }}</p>
     @enderror
  </div>
  <br>
   <div class="form-group">
    <label for="file">file </label>
    <input type="file" name="file" class="form-control-file">
	@error('file')
      <p class="text-danger">{{ $message }}</p>
     @enderror
    </div>
    <div class="form-group">
         <button type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">Submit</button>
       </div>
  
</form>
</div>

    
</body>
</html>
@endsection