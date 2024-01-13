<?php
   include("connection.php");
   session_start();
   $nameErr= $emailErr= $passwordErr= $passErr= $confrimpasswordErr= $countryErr= $stateErr= $CityErr= $genderErr= NULL;
   $name= $email= $password= $confrimpassword= $country= $state= $City= $gender= NULL;
   $flag="true";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST['name'])){
        $nameErr="the name is required";
        $flag="false";
    }
    else{
        $name=test_input($_POST['name']);
       }
    if(empty($_POST['email'])){
        $emailErr="the email is required";
        $flag="false";
    }
    else{


        $email=test_input($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
        $emailErr = "Invalid email format";  
        }
      }
       if(empty($_POST['password'])){
        $passwordErr="the password is required";
        $flag="false";
        }
        else{
        $password=test_input(md5($_POST['password']));
        }
       if(empty($_POST['confrimpassword'])){
        $confrimpasswordErr="the confrimpassword is required";
        $flag="false";
       }
      else{
        $confrimpassword=test_input(md5($_POST['confrimpassword']));
      }
     if(empty($_POST['gender'])){
        $genderErr="the gender is required";
        $flag="false";
      }
    else{
        $gender=test_input($_POST['gender']);
    
    if(empty($_POST['country'])){
        $countryErr="the country is required";
        $flag="false";
      }
    else{
        $country=test_input($_POST['country']);
    }
    if(empty($_POST['state'])){
        $stateErr="the state is required";
        $flag="false";
      }
    else{
        $state=test_input($_POST['state']);
    }
    if(empty($_POST['cityname'])){
        $cityErr="the city is required";
        $flag="false";
      }
    else{
        $City=test_input($_POST['cityname']);
    
    }
   // echo"<pre/>";print_r($_POST);exit;
    if($password!=$confrimpassword){
    $passwordErr="password does not match";
             }   
    else{
     $sql="INSERT INTO student(name,email,password,confrimpassword,country,cityname,state,gender) VALUES('$name','$email','$password','$confrimpassword','$country','$state','$City','$gender')";
     $data=mysqli_query($conn,$sql);
    if($data){
        echo $_SESSION['status']="Data inserted succesfully";
        header("location:view.php");
     }
    else{
     echo"data not inserted";
     }
    }
    }
    
}
    function test_input($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
   }
  ?>
  <?php

  ?>
  
  
  

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h3{
    text-align: center;
}
input[type=text], select {
    width: 100px;
    padding: 12px 20px;
    margin: 8px 0;
    display:inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;

}

        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <style>
.error {color: #FF0000;}
h3{
    
    
text-align: center;
    }
</style>

<h3>Crud operation</h3>
     
</head>
<body>
<div class="container">
            <p><span class="error">* Required field</span></p>
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class=form-group>
            <label>Name</label>
            <input type="text" class="form-control" placeholder="enter a name" value="<?=$name?>" name="name">
            </div>
            <span class="error">*<?php echo $nameErr;?></span>
            <div class=form-group>
            <label>Email</label>
            <input type="email" class="form-control" placeholder="enter a email" value="<?=$email?>" name="email">
            <span class="error">*<?php echo $emailErr;?></span>
            </div>
            <div class=form-group>
            <label>Password</label>
            <input type="password" class="form-control"placeholder="enter password" value="<?=$password?>" name="password">
            <span class="error">*<?php echo $passwordErr;?></span> </div>
            <div class=form-group>
            <label>Confrim password</label>
            <input type="password" class="form-control"placeholder="enter confrim password" value="<?=$confrimpassword?>" name="confrimpassword">
            <span class="error">*<?php echo $confrimpasswordErr;?></span>
            </div>
            <div class=form-group>
            <lable>Country<small>(optional)</small></lable>
            <span class="error">*<?php echo $countryErr;?></span> 

        <select onChange="getstate(this.value);" name="country" class="form-control" id="country"> 
        <option value="">--select country</option>
        <?php 
        $query=mysqli_query($conn,"SELECT * from country");  
        while($row=mysqli_fetch_array($query)){

        ?>
       <option value=<?php echo $row['cid'];?>><?php echo $row['cnm'];?></option>
        <?php
        }
        ?>
        </select>
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
            <div class=form-group>
            <label>Gender:</label>
            <input type="radio" name="gender" value="male" > Male
             <input type="radio" name="gender" value="female" > Female  
             <input type="radio" name="gender" value="Other"> Other  
             <span class="error">*<?php echo $genderErr;?></span>
              </div>
             <input type ="submit" class="btn btn-primary"value="submit" name="submit"> 
           </div>
          
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