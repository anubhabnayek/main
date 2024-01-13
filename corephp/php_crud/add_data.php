<?php include_once('include/connection.php')?>
<?php
if(isset($_REQUEST['submit'])){
    
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $password= md5($_REQUEST['password']);
    $phone=$_REQUEST['phone'];
    $gender=$_REQUEST['gender'];
    $language_arr=$_REQUEST['language'];
    $language=implode(',',$language_arr);
    //echo"<pre>";print_r($_REQUEST);exit;
    $file=$_FILES['file']['name'];
    $path="upload/user/".$file;
    $tmp_file=$_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_file,$path);

   $query="INSERT into student(`name`,`email`,`password`,`phone`,`gender`,`language`,`file`) values
    ('$name','$email','$password','$phone','$gender','$language','$file')";
     $data=mysqli_query($conn,$query);
    if($data){
        echo"<script>
        alert('data inserted successfully');
        window.location='view_data.php';
        </script>";
    }
    else{
        echo"<script>
         alert('data not inserted ');
         </script>";
    }

}

?>

<script>
function validate() {
    var name = document.forms["myform"]["name"].value;
    if (name == "" || name == null) {
        alert('Please fill out the  Name');
		//document.getElementById("errorDiv").innerText = "Name are required.";
        return false;
    }

    var email = document.forms["myform"]["email"].value;
    if (email == "" || email == null) {
        alert('Please fill out the email');
		//document.getElementById("errorDiv1").innerText = "Email are required.";
        return false;
    }

    var mail = /^[a-zA-Z0-9_]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
    if (!mail.test(email)) {
        alert('Please fill in a proper email id');
        return false;
    }

    var password = document.forms["myform"]["password"].value;
    if (password == "" || password == null) {
        alert('Please fill out the password');
        return false;
    }

    if (!(password.length >= 3 && password.length <= 8)) {
        alert('Please provide a password with a minimum of 3 and a maximum of 8 characters');
        return false;
    }

    var gen_arr = document.getElementsByName("gender");
    if (gen_arr[0].checked == true) {

    } else if (gen_arr[1].checked == true) {

    } else {
        alert('Please Select Gender');
        return false;
    }

    var lan_arr = document.getElementsByName("language[]");
    if (lan_arr[0].checked == true) {

    } else if (lan_arr[1].checked == true) {

    } else if (lan_arr[2].checked == true) {

    } else {
        alert('Please Select at least one language');
        return false;
    }

    // var selectElement = document.getElementById("inputstate");
    // var selectedValue = selectElement.value;

    // if (selectedValue === "") {
    //     alert("Please select a country.");
    //     return false;
    // }
    
    // Validate the image file
    var fileInput = document.forms["myform"]["file"];
    var allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Allowed image file extensions
    var maxFileSizeInBytes = 5 * 1024 * 1024; // 5MB maximum file size

    if (fileInput.files.length === 0) {
        alert("Please select an image file.");
        return false;
    }

    var fileName = fileInput.files[0].name;
    var fileExtension = fileName.split(".").pop().toLowerCase();

    if (allowedExtensions.indexOf(fileExtension) === -1) {
        alert("Invalid file type. Allowed file types are: " + allowedExtensions.join(", "));
        return false;
    }

    if (fileInput.files[0].size > maxFileSizeInBytes) {
        alert("File size exceeds the maximum allowed size of 5MB.");
        return false;
    }


    // ... (the rest of your form validation code)
}


</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center" style="color: blue;">Add Data</h1>
<form name="myform" action="" method="post" enctype="multipart/form-data" onsubmit="return validate()">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1"  placeholder="Enter name">
 </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
 </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Mobile No</label>
    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"  placeholder="Enter mobile no">
 </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password"name="password" class="form-control" id="exampleInputEmail1"  placeholder="Enter password">
 </div>
 <div class="form-group">
    <label for="">Gender</label>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female
 </div>
 <div class="form-group">
    <label for="">Language</label>
    <input type="checkbox" name="language[]" value="English">English
    <input type="checkbox" name="language[]" value="Hindi">Hindi
    <input type="checkbox" name="language[]" value="Gujrati">Gujrati
 </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="file" class="form-control" id="" placeholder="Password">
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
 </div>
</body>
</html>