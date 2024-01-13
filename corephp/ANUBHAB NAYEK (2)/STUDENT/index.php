<?php
include("connection.php");
session_start();
if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $birthday = date('y-m-d',strtotime($_POST['birthday']));
    $maths=$_POST['maths'];
    $english=$_POST['english'];
    $hindi=$_POST['hindi'];
    $social=$_POST['social'];
    $sience=$_POST['sience'];
    
   if(empty($firstname) OR empty($lastname) OR empty($birthday) OR empty($maths) OR empty($english) OR empty($hindi) OR empty($social) OR empty($sience) ){
      echo "<div class='alert alert-danger'>All field are required</div>";

    }
   

    if ($maths < 0 || $maths > 100) {
    echo "<div class='alert alert-danger'>Invalid marks. Please enter marks between 0 and 100.</div>";

    }
    elseif( $english < 0 || $english > 100){
    echo "<div class='alert alert-danger'>Invalid marks. Please enter marks between 0 and 100.</div>";
    }
    elseif($hindi< 0 || $hindi> 100){
    echo "<div class='alert alert-danger'>Invalid marks. Please enter marks between 0 and 100.</div>";
    }
    elseif($social< 0 || $social > 100){
    echo "<div class='alert alert-danger'>Invalid marks. Please enter marks between 0 and 100.</div>";
     
    }
    elseif($sience< 0 || $sience > 100){
    echo "<div class='alert alert-danger'>Invalid marks. Please enter marks between 0 and 100.</div>";

    }
  

else{
    
   $sql="INSERT INTO student(firstname,lastname,birthday) VALUES('$firstname','$lastname','$birthday')";
   $data=mysqli_query($conn,$sql); 
   if($data){
    $last_id=mysqli_insert_id($conn);
    $sql1="INSERT INTO marksheet(std_id,maths,english,hindi,social,sience) VALUES('$last_id','$maths','$english','$hindi','$social','$sience')";
    $result=mysqli_query($conn,$sql1); 
    if($result){
    $_SESSION['status']="<div class='alert alert-success'>Data Added Successfully</div>";
    header('location:view.php');

     }
     else{
        $_SESSION['status']=" Data not Added sucesfully";
     }
    }
    else{
        
    }
}
}



?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    <link rel="stylesheet" href="style.css">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
    <link rel="stylesheet" href="style.css"> 
   <style>
h3{
    
    
text-align: center;
    }
</style>

<h3>Student Form</h3>

</head>

<body>
<div class="container">
<form action="" method="post">
<div class=form-group>
<lable>Firstname</lable>
<input type="text"palaceholder="Enter the Firstname"class="form-control"id="firstname"name="firstname" required >
</div>
<div class=form-group>
<lable>Lastname</lable>
<input type="text"palaceholder="Enter the Lastname"class="form-control"id="lastname"name="lastname"required >
</div>
<div class=form-group>
<lable>DOB</lable>
<input type="date"palaceholder="Enter a date of birth"class="form-control"id="birthday"name="birthday" max="<?= date('Y-m-d', strtotime('0 days')); ?>" required>
</div>
<div class=form-group>
<lable>Maths</lable>
<input type="text"palaceholder="Enter a number"class="form-control" name="maths"required>
</div>

<div class=form-group>
<lable>English</lable>
<input type="text"palaceholder="Enter a number"class="form-control" name="english"required>
</div>
<div class=form-group>
<lable>Hindi</lable>
<input type="text"palaceholder="Enter a number"class="form-control" name="hindi"required>
</div>
<div class=form-group>
<lable>Social</lable>
<input type="text"palaceholder="Enter a number"class="form-control"name="social"required>
</div>
<div class=form-group>
<lable>sience</lable>
<input type="text"palaceholder="enter a number"class="form-control"name="sience"required>
</div>
<input type ="submit" class="btn btn-primary"value="register" name="submit"> 
</div>
    </form>
    </body>
</html>
