<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{url('website/style1.css')}}">
  <link href="{{url('<https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200&display=swap>')}}" rel="stylesheet">
  <title>Signup form</title>
</head>
<body>
@include('sweetalert::alert')
  <form name="myform" action="{{url('/signup')}}" method="post"  enctype="multipart/form-data" onsubmit="return validate()">
    <h2>Signup form</h2>
    <div>
    @csrf
      <h4><label for="userId">Name</label><br></h4>
      <input type="text" class="input" name="name" ><br>
      <span id="userIdErr"></span>
    </div>
    <div>
      <h4><label for="password">Email</label><br></h4>
      <input type="email" class="input" name="email" ><br>
      <span id="passwordErr"></span>
    </div>
    <div>
      <h4><label for="date of birth">date of birth</label><br></h4>
      <input type="date" class="input" name="date_of_birth" ><br>
      <span id="emailErr"></span>
    </div>
    <div>
      <h4><label for="password">Username</label><br></h4>
      <input type="text" class="input" name="unm"><br>
      <span id="passwordErr"></span>
    </div>
    <div>
      <h4><label for="password">Password</label><br></h4>
      <input type="password" class="input" name="password" ><br>
      <span id="passwordErr"></span>
    </div>
    <div>
      <h4><label for="name">Phone</label><br></h4>
      <input type="text" class="input" name="phone" ><br>
      <span id="nameErr"></span>
    </div>
   
    
   
    <div>
      <h4>Select your gender</h4>
      <input type="radio" id="male" name="gender" value="male">
      <label for="male">Male</label><br>
      <input type="radio" id="female" name="gender" value="female">
      <label for="female">Female</label><br>
      <span id="genderErr"></span>
    </div>
    <div>
      <h4><label for="password">Image</label><br></h4>
      <input type="file" class="input" name="file" ><br>
      <span id="passwordErr"></span>
    </div>
    <div>
    <input type="submit" name="submit" class="input" >
    <input type="reset" class="input">
    </div>
    <p class="text-center">
Already have an account? Please <a href="signin" >Signin now</a>
        </p >
  </form>
  
  <div id="popup" style="display: none;">
    <div id="data">
      
      <span class="close">&times;</span><br>
      <p></p>
    </div>
  </div>
  <script src="{{url('website/script.js')}}"></script>
</body>
</html>