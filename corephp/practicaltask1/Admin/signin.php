 <?php include_once('../include/header.php');
       //include('include/connection.php');
      ?>
      <!-- //validation -->
      
  <?php
  //  $usernameErr = $passwordErr = "";
  //  $username = $password = "";
  
  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   if (empty($_POST["name"])) {
  //     $nameErr = "Name is required";
  //   } 
  //   else {
  //      $name = test_input($_POST["name"]);
  //     // check if name only contains letters and whitespace
  //     if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
  //       $nameErr = "Only letters and white space allowed";
  //     }
  //   }
    
  //   if (empty($_POST["email"])) {
  //     $emailErr = "Email is required";
  //   } else {
  //     $email = test_input($_POST["email"]);
  //     // check if e-mail address is well-formed
  //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //       $emailErr = "Invalid email format";
  //     }
  //   }
      
   
      
  // }


  //  if ($usernameErr == "" &&  $passwordErr == "") {

  //   $query="INSERT into employee(`name`,`email`,`phone`,`gender`,`language`,`c_id`,`file`) values('$name','$email','$phone','$gender','$language','$c_id','$file')";
  //   //echo"</pre>";print_r($query);exit;
  //     $data=mysqli_query($conn,$query);
  //     if($data){
  //         echo"<script>
  //         alert('Contact Inquiry Registered Success');
  //         </script>";
  //          }
  //       else{
  //         echo"<script>
  //          alert('Not Registered Success');
  //          </script>";
  //       }
  //  }
  

  // else{
  //   $username = $password = "";
  // }
    
  //     function test_input($data){
  //       $data=trim($data);
  //       $data=stripcslashes($data);
  //       $data=htmlspecialchars($data);
  //       return $data;
  //      }
     
  ?>
   
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script type='text/javascript' src='jquery.min.js'></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<style>
   .error {color: #FF0001;}
   .btn.custom-btn {
    background-color:  black; /* Set your desired background color */
    color: #FFFFFF; /* Set your desired text color */
}

</style>

  <body>
  <form name="" action="" method="post" enctype="multipart/form-data">
     <h1 class="text-center">Sign in</h1>
     <div class="container">
      <div class="text-right">
        <a href="display.php" class="btn btn-primary">View Data</a>
  </div></br>
       <div class="row">
       <div class="container col-md-6 my-4">
                 

            <div class="form-group">
				      <label>Username<span style="color:red">*</span></label>
                  <input class="form-control" name="email" id="name" type="email" value="<?php if(isset($email) && $email!='') { echo $email;} ?>" placeholder = "Enter your email">
                  <span class="error">* <?php //echo  $emailErr; ?> </span> 
                </div><br> 
                <div class="form-group">
				      <label>Password<span style="color:red">*</span></label>
                  <input class="form-control" name="password" id="name" type="password" value="<?php if(isset($email) && $email!='') { echo $email;} ?>" placeholder = "Enter your email">
                  <span class="error">* <?php //echo  $emailErr; ?> </span> 
                </div><br>   
          <button type="submit" id="contact_submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">Submit</button>
         <p class="text-center">Already have an account? Please <a href="login.php">Sign In</a></p>  </div>
       </div>
    </div>

</from>
</body>
</html>