<?php include("connection.php");
  session_start();
  $std_id= $_GET['std_id'];
  $sql="SELECT * from student where std_id='$std_id'";
  $data=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($data);
 
  /*if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $cityname=$_POST['cityname'];
   
    $gender=$_POST['gender'];*/
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
    }
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
    if(empty($_POST['gender'])){
        $genderErr="the gender is required";
        $flag="false";
      }
    else{
        $gender=test_input($_POST['gender']);
    
       //echo"<pre/>";print_r($_POST);exit;
      
    echo $update="UPDATE student set name='$name',email='$email',password='$password',country='$country',cityname='$cityname',state='$state',gender='$gender' where std_id='$std_id'";
    die();
    $data=mysqli_query($conn,$update);
    if($data){
    echo $_SESSION['status']="Data update succesfully";
        header("location:view.php");
     }
    else{
     echo"data not update";
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
  

  <?php

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
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

<h3>update from</h3>
     
</head>
<body>
<div class="container">
            <p><span class="error">* Required field</span></p>
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post">
            <div class=form-group>
            <label>Name</label>
            <input type="text" class="form-control" placeholder="enter a name" value="<?php echo $row['name'];?>" name="name">
            </div>
            <div class=form-group>
            <label>Email</label>
            <input type="email" class="form-control" placeholder="enter a email" value="<?php echo $row['email'];?>" name="email">
            </div>
            <div class=form-group>
            <label>Password</label>
            <input type="password" class="form-control"placeholder="enter password" value="" name="password">
            
            <div class=form-group>
            <lable>Country<small>(optional)</small></lable>

        <select onChange="getstate(this.value);" name="country" class="form-control" id="country"> 
        <option value="">--select country</option>
        <?php 
        $query=mysqli_query($conn,"SELECT * from country");  
        while($row=mysqli_fetch_array($query)){

        ?>
       <option value=<?php echo $row['country_id'];?>><?php echo $row['country'];?></option>
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
              </div>
             <input type ="submit" class="btn btn-primary"value="update" name="update"> 
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