<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{url('website/style1.css')}}">
  <link href="{{url('<https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200&display=swap>')}}" rel="stylesheet">
  <title>Edit form</title>
</head>
<body>
@include('sweetalert::alert')
  <form name="myform" action="{{url('/update/'.$data->id)}}" method="post"  enctype="multipart/form-data" >
    <h2>Signup form</h2>
    <div>
    @csrf
      <h4><label for="userId">Name</label><br></h4>
      <input type="text" class="input" name="name" value="{{$data->name}}" ><br>
      <span id="userIdErr"></span>
    </div>
    <div>
      <h4><label for="password">Email</label><br></h4>
      <input type="email" class="input" name="email"  value="{{$data->email}}" ><br>
      <span id="passwordErr"></span>
    </div>
    <div>
      <h4><label for="date of birth">date of birth</label><br></h4>
      <input type="date" class="input" name="date_of_birth"  value="{{$data->date_of_birth}}" ><br>
      <span id="emailErr"></span>
    </div>
    <div>
      <h4><label for="password">Username</label><br></h4>
      <input type="text" class="input" name="unm"  value="{{$data->unm}}"><br>
      <span id="passwordErr"></span>
    </div>
   
    <div>
      <h4><label for="name">Phone</label><br></h4>
      <input type="text" class="input" name="phone"  value="{{$data->phone}}" ><br>
      <span id="nameErr"></span>
    </div>
   
    
   
    <div>
      <h4>Select your gender</h4>
      <input type="radio" id="male" name="gender" value="male" @if($data->gender == "male") {{ "checked=checked"}} @endif>
      <label for="male">Male</label><br>
      <input type="radio" id="female" name="gender" value="female" @if($data->gender == "female") {{ "checked=checked"}} @endif>
      <label for="female">Female</label><br>
      <span id="genderErr"></span>
    </div>
    <div>
      <h4><label for="password">Image</label><br></h4>
      <input type="file" class="input" name="file" >
      <img src="{{url('upload/user/'.$data->file)}}" width="50" height="50">
      <br>
      <span id="passwordErr"></span>
    </div>
    <div>
    <input type="submit" name="submit" value="save" class="input" >
    <input type="reset" class="input">
    </div>
   
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