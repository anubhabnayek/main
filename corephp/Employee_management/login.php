<?php include_once('include/header.php')?>


<?php
      include('connection.php');
      session_start();
      if(isset($_POST["login"])){
      $username= ($_POST["username"]);
      $password= md5($_POST["password"]);
     // echo "<pre/>";print_r($_POST);exit;
      $sql="SELECT * FROM employee where username='$username' && password='$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      if ($row){

      if($password == $row["password"]){
          // $_SESSION['login']=true;
          // $_SESSION['name']=$row['name'];
          // $_SESSION['id']=$row['emp_code'];
          echo"<script>
          alert('Customers login Success');
          window.location='display.php';
          </script>";
          }else{
          echo"<script>
          alert('login failed due to Blocked Account');
          window.location='login.php';
          </script>";
           }

           }
         }
       ?>
<body>
<style>
.btn.custom-btn {
    background-color:  green; /* Set your desired background color */
    color: #FFFFFF; /* Set your desired text color */
}
</style>
<form action="" method="post" enctype="multipart/form-data">
  <h1 class="text-center">Login</H1>
    <div class="container">
    <div class="row">
    </div>
    <div class="container col-md-6 my-4">
       <div class="form-groups">
	        <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="enter your username">
                </div><br>
       <div class="form-groups">
	        <label>password</label>
              <input type="password" name="password" class="form-control" placeholder="enter your password">
                </div><br>
          <button type="submit" name="login" value="login" class="btn custom-btn form-control mt-4 mb-3">login</button>
          <p class="text-center">Don’t have an account? <a href="signup.php">Create One</a></p>

  </form>
  </body>
  </html>
  <div>

  </div>

