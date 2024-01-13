
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="style.css"> 
      <style>
        h3{

          text-align:center;
        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
</style>
</head>
<body>
<h3>Adminlogin form<h3>

<div class="container">

<?php
    include('connection.php');
    session_start();
    if(isset($_POST["login"])){
    $username= ($_POST["username"]);
    $password= md5($_POST["password"]);


  //echo "<pre>";print_r($_POST);exit;

    $sql="SELECT * FROM `admin` where username='$username' && password='$password'";

     $result= mysqli_query($conn,$sql);

     $row = mysqli_fetch_array($result);
     if ($row){
    //echo "<pre>";print_r($row);exit;

      if($password == $row["password"]){
        $_SESSION['login']= true;
        $_SESSION['emp_code']=$row['emp_code'];

        header("Location: dashboard.php");
  
        die();
      
        }else{
          echo "<div class='alert alert-danger'>user does not match</div>";

        }
      }
    }
  
        ?>



  <form method="post">
  <div class="form-group">

    <label>Username</label>
    <input type="text" id="username" name="username" required>
    <br>
    <br>
    <div class="form-group">

    <label>Password</label>
    <input type="password" id="password" name="password" required>
    <br>
    <br>
    
    <input type ="submit" class="btn btn-primary"value="login" name="login"> 
    <p>Not yet a member? <a href="registration.php">Sign up</a>

  </form>
</div>
</body>
</html> 