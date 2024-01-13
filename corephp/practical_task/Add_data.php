<?php include_once('connection.php');?>
<?php
$nameErr= $emailErr= $phoneErr= $genderErr= $educationErr= $hobbiesErr= $fileErr= "";
$name= $email= $phone= $gender=  $e_id= $hobbies= $file= ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
    }
  
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
    }
  
    if (empty($_POST["phone"])) {
      $phoneErr = "Mobile no is required";
    } else {
      $phone = test_input($_POST["phone"]);
    }
  
    if (empty($_POST["hobbies"])) {
      $hobbiesErr = "Hobbies is required";
    } else {
      $hobbies = implode(",",$_POST["hobbies"]);
      $hobbies = test_input($hobbies);
    }
    if (empty($_POST["e_id"])) {
        $educationErr = " ";
      } else {
        $e_id= test_input($_POST["e_id"]);
      }
     // echo"<pre>";print_r($_POST);exit;
    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }
  
    if (empty($_FILES['file']['name'])) {
        $fileErr = "image is required";
      } else {
    $file= test_input($_FILES['file']['name']);
    $path="upload/user/".$file;
    $tmp_file=$_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_file,$path);  
}
    //echo"<pre>";print_r($_FILES);exit;
      if($nameErr == "" && $emailErr == "" && $phoneErr == "" && $genderErr == "" && $educationErr == "" && $hobbiesErr == "" && $fileErr == "")
       {
      $sql="INSERT into profile(`name`,`email`,`phone`,`gender`,`hobbies`,`e_id`,`file`) VALUES('$name','$email','$phone','$gender','$hobbies','$e_id','$file')";
       $data=mysqli_query($conn,$sql);
       if($data){
        echo"<script>
        alert('data register successfully');
        </script>
        ";
     }
     else{
        $name = $email = $phone = $gender = $hobbies = $e_id= $file= "";
      }
       }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
  ?>
  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <h2 class="text-center">profile</h2>
 <div class="container">
    <div class="text-right">
        <a href="display_data.php" class="btn btn-primary">view data</a>
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Enter name">
    <span class="error">*<?php echo $nameErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email">
    <span class="error">*<?php echo $emailErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">phone</label>
    <input type="text" name="phone" class="form-control" placeholder="Enter Mobile no">
    <span class="error">*<?php echo $phoneErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Gender</label>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female
    <span class="error">*<?php echo $genderErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Education</label>
    <select name="e_id" class="form-control">
        <option value="">--select Education--</option>
        <?php
        $sql="SELECT * from education";
        $data=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($data)){
            ?>
            <option value="<?php echo $row['id']?>"><?php echo $row['edu_name']?></option>
           <?php 
        }

        ?>
    
   </select>
   <span class="error">*<?php echo $educationErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hobbies</label>
    <input type="checkbox" name="hobbies[]" value="cricket">Cricket
    <input type="checkbox" name="hobbies[]" value="dancing">Dancing
    <input type="checkbox" name="hobbies[]" value="drawing">Drawing
    <input type="checkbox" name="hobbies[]" value="knitting">Knitting
    <span class="error">*<?php echo $hobbiesErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="file" class="form-control" placeholder="">
    <span class="error">*<?php echo $fileErr;?></span>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</body>
</html>