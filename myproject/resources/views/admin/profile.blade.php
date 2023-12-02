@extends('website.layout.structure')

@section('main_container')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color:#ADD8E6;
}
.navbar{
  background-color:blue;

}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
body{
  background-color:#7FFFD4;
}
/* nav{
  background-color:blue;

} */

.container-fluid{
  background-color:#00FFFF;
}
a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style=color:black; class="navbar-brand" href="#">Medical</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <a href="admin_logout"><i class="fa fa-sign-in "></i>Logout</a>
</li>
    </ul>
  </div>
</nav>


<h2 style="text-align:center">Admin Profile</h2>

<div class="card">
<img src="../upload/product/<?php echo $fetch->file;?>"height="250px" weight="250px" alt="">
     <p><b>ID :</b><?php echo $fetch->admin_id;?></p>
     <p><b>NAME :</b><?php echo $fetch->anm;?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button>Edit</button></p>
</div>

</body>
</html>
@endsection