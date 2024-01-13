 <?php include_once('include/header.php');
       include('include/connection.php');
      ?>
      <!-- //validation -->
      
  <?php
   $nameErr = $emailErr = $genderErr = $phoneErr = $languageErr = $countryErr= $fileErr= "";
   $name = $email = $phone = $gender = $language = $c_id= $file=  "";
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } 
    else {
       $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
      
    if (empty($_POST["phone"])) {
      $phoneErr= "Phone number is required";
    } else {
      $phone = test_input($_POST["phone"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match ("/^[0-9]*$/", $phone) ) {  
        $phoneErr = "Only numeric value is allowed.";  
        }  
    }
     if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
      } else {
      $gender = test_input($_POST["gender"]);
      }
      // echo"<pre>";print_r($_POST);exit;
    if (empty($_POST["language"])) {
      $languageErr = "language is required";
    } else {
      $language=implode(',',$_POST['language']);
      $language = test_input($language);
    
    }
    if(empty($_POST['c_id'])){
      $countryErr="the country is required";
    
    }
  else{
    $c_id= test_input($_POST["c_id"]);
  }
  if(empty($_FILES['file']['name'])){
    $fileErr="the image is required";
  
  }
else{
  $file= test_input($_FILES['file']['name']);
  $path="include/upload/".$file;
  $tmp_file=$_FILES['file']['tmp_name'];
  move_uploaded_file($tmp_file,$path);
  }


  // Check if the file already exists
  if (file_exists($file)) {
      $fileErr="Sorry, the file already exists.";
  } else {
      // Check file size (you can customize the size limit)
      if ($_FILES["file"]["size"] > 500000) {
        $fileErr="Sorry, your file is too large.";
      } else {
          // Allow only certain file types (you can customize the allowed types)
          $allowed_types = array("jpg", "jpeg", "png", "gif");
          $file_extension = pathinfo($file, PATHINFO_EXTENSION);

          if (!in_array($file_extension, $allowed_types)) {
            $fileErr="Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
          } else {
             
          }
      
  }


   if ($nameErr == "" &&  $emailErr == "" && $genderErr == "" && $phoneErr == "" && $languageErr == "" && $countryErr == "" && $fileErr == "") {

    $query="INSERT into employee(`name`,`email`,`phone`,`gender`,`language`,`c_id`,`file`) values('$name','$email','$phone','$gender','$language','$c_id','$file')";
    //echo"</pre>";print_r($query);exit;
      $data=mysqli_query($conn,$query);
      if($data){
          echo"<script>
          alert('Contact Inquiry Registered Success');
          </script>";
           }
        else{
          echo"<script>
           alert('Not Registered Success');
           </script>";
        }
   }
  }
}
  else{
    $name = $email = $phone = $gender = $language = $c_id= $file= "";
  }
    
      function test_input($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
       }
     
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
     <h1 class="text-center">Add data</h1>
     <div class="container">
      <div class="text-right">
        <a href="display.php" class="btn btn-primary">View Data</a>
  </div></br>
       <div class="row">
       <div class="container col-md-8 my-4">
                  <div class="form-group">
				     <label>Name<span style="color:red">*</span></label>
                  <input class="form-control" name="name" type="text" value="<?php if(isset($name) && $name!='') { echo $name;} ?>" placeholder = "Enter your name">
                  <span class="error">* <?php echo  $nameErr; ?> </span>  
                </div><br>

                  <div class="form-group">
				     <label>Email<span style="color:red">*</span></label>
                  <input class="form-control" name="email" id="name" type="email" value="<?php if(isset($email) && $email!='') { echo $email;} ?>" placeholder = "Enter your email">
                  <span class="error">* <?php echo  $emailErr; ?> </span> 
                </div><br>

                  <div class="form-group">
				       <label>phone<span style="color:red">*</span></label>
                  <input class="form-control" name="phone" id="name" value="<?php if(isset($phone) && $phone!='') { echo $phone;} ?>" type="text" placeholder = "Enter your phone number">
                  <span class="error">* <?php echo  $phoneErr; ?> </span>   
                </div><br>

                  <div class="form-group">
				       <label>Gender:<span style="color:red">*</span></label>
                  <input type="radio" name="gender" value="male">Male
                  <input type="radio" name="gender" value="female">Female
                  <span class="error">* <?php echo  $genderErr; ?> </span>
                  </div><br>

                  <div class="form-group">
				        <label>Language:<span style="color:red">*</span></label>
                  <input type="checkbox" name="language[]" value="english">English
                  <input type="checkbox" name="language[]" value="hindi">Hindi
                  <input type="checkbox" name="language[]" value="bengali">Bengali
                  <span class="error">* <?php echo  $languageErr; ?> </span>
                  </div><br>

                  <div class="form-group">
				       <label>Country:</label>
                  <select id="country" name="c_id" onChange="getstate(this.value);" class="form-control">
                  <option value="">----Select country---</option>
                    <?php
                          $sel="SELECT * from country";
                             $data=mysqli_query($conn,$sel);
                               while($row=mysqli_fetch_array($data))
                            {
                               ?>
                                 <option value=<?php echo $row['c_id'];?>><?php echo $row['cnm'];?></option>
                                <?php
                                  }  
                                  ?>
                              </select>
                              <span class="error">* <?php echo  $countryErr; ?> </span>
                          </div>
          <div class=form-group>
            <label>State<small>(optional)</small></label>
             <select class="form-control" name="state" id="statelist"onChange="getcity(this.value);">
                <option value="">--select state</option>
                </select>
                </div>
          <div class=form-group>
                <label>City<small>(optional)</small></label>
                <select class="form-control" name="cityname" id="City" data-bs-toggle="dropdown">
                <option value="">--select City</option>
               </select>
            </div>
              <div class="form-groups">
                <label>File</label>
                <input type="file" name="file" class="form-control" placeholder="enter you file">
                <span class="error">*<?php echo $fileErr; ?> </span>
               </div><br>
          <button type="submit" id="contact_submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">Submit</button>
         <p class="text-center">Already have an account? Please <a href="login.php">Sign In</a></p>  </div>
       </div>
    </div>

</from>
</body>
</html>
<script>
            function getstate(val){
                $.ajax({
                type: "POST",
                url: "get_state.php",
                data: 'countrycode='+val,
                success:function(data){
                    $("#statelist").html(data)
                }
            });
            
            }
            function getcity(val){
                $.ajax({
                    type: "POST",
                    url: "get_city.php",
                    data: 'statecode='+val,
                    success:function(data){
                    $("#City").html(data)
                    }
                });
            }
            </script>