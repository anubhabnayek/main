<?php 
    include_once("navbar.php");

    session_start();
    include('connection.php');
    if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];

    $password=$_POST['password'];
    $pswrepeat=$_POST['psw-repeat'];
    $user_type=$_POST['user_type'];
    //echo "<pre>";print_r($_POST);exit;
    $passwordHash = password_hash($password,PASSWORD_DEFAULT);
    $errors = array();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
    /*if(empty($name) OR empty($email) OR empty($username) OR empty($password) OR empty($pswrepeat) ){
    array_push($errors,"All fields are required");
     }*/
     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($errors,"Email is not valid");
        //"array_push";
     }
     if(strlen($password)<8){
        array_push($errors,"password must be at least 8 character long");
    
    }
     if($password!=$pswrepeat){
        array_push($errors,"password does not match");
     }
     $sql="SELECT * FROM user where email='$email'&& password='$password'";

     $result = mysqli_query($conn,$sql);
     $rowcount = mysqli_num_rows($result);
     if($rowcount>0){
        array_push($errors,"email already exist");

    }
    if(count($errors)>0){
        foreach($errors as $error){
            echo "<div class='alert alert-danger'>$error</div>";
        }
        
    }else{
   
   $sql ="INSERT INTO user(name,email,password,pswrepeat,user_type)VALUES('$name','$email','$password','$pswrepeat','$user_type')";
   $stmt = mysqli_stmt_init($conn);
   $preparestmt =mysqli_stmt_prepare($stmt,$sql);
   if($preparestmt){
    #mysqli_stmt_bind_param($stmt,"ssssss", $fname, $lname,$phone, $email,$username,$passwordHash);
    mysqli_stmt_execute($stmt);
    echo "<div class='alert alert-success'>You are register sucesfully</div>";


   }else{
    die("somthing went wrong");

           
        }
    }
    
   // else{

 
  // }

   }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
    <style>
h3{
    
    
text-align: center;
    }
</style>

<h3>Registration Form</h3>

</head>

<body>
<div class="container">
<form action="" method="post">
<div class=form-group>
<lable>Name</lable>
<input type="text"palaceholder="Enter a name"class="form-control"name="name"id="name" required>
</div>
<div class=form-group>

<lable>Email</lable>
<input type="email"palaceholder="Enter email"class="form-control"name="email"id="email" required>
</div>

<div class=form-group>
<lable>password</lable>
<input type="password"palaceholder="Enter password"class="form-control"id="password"name="password" required>
</div>
<div class=form-group>
<lable>Repeat Password</lable>
<input type="password"palaceholder="Enter Repeat Password"class="form-control"id="psw-repeat"name="psw-repeat" required>
</div>
<div class=form-group>
<select name="user_type">
<option value="user">user</option>
<option value="admin">Admin</option>
<div>
<input type ="submit" class="btn btn-primary"value="register" name="submit"> 
<p>Already a member? <a href="login.php">Sign in</a>
    </form>
    </body>
</html>
