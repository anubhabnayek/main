 <?php include_once('include/header.php')?>

<?php 

   //session_start();
    include("connection.php");
    date_default_timezone_set('asia/calcutta');
    //session_start();
    if(isset($_REQUEST['submit'])){
    $name=$_REQUEST['name'];
    $username=$_REQUEST['username'];
    $password= md5($_REQUEST["password"]);
    $department=$_REQUEST['department'];
    $date_of_birth=date('y-m-d',strtotime($_REQUEST['date_of_birth']));
    $date_of_join=date('y-m-d',strtotime($_REQUEST['date_of_join']));
    $basic_salary=$_REQUEST['basic_salary'];
    $da = $basic_salary *0.04;
    $allowance = $basic_salary *0.1;
    $grosssalary=$da+$allowance;
   
    $file=$_FILES['file']['name'];
    $path="include/upload/".$file;
    $tmp_file=$_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_file,$path);
    //echo "<pre/>";print_r($_FILES);exit;
    $created_at=date("y-m-d H:i:s");
    $updated_at=date("y-m-d H:i:s");
    $sql="INSERT INTO employee(`name`,`username`,`password`,`department`,`date_of_birth`,`date_of_join`,`basic_salary`,`file`,`da`,`allowance`,`grosssalary`,`created_at`,`updated_at`)
    VALUES('$name','$username','$password','$department','$date_of_birth','$date_of_join','$basic_salary','$file','$da','$allowance','$grosssalary','$created_at','$updated_at')";
    $data=mysqli_query($conn,$sql); 
    if($data){

        echo"<script>
        alert('Contact Inquiry Registered Success');
        </script>";
    }
    else{
        echo"<script>
        alert('Failed');
        </script>";
    }
}
   
    
    ?>
    <script>
    function validate() {
    var name = document.forms["myform"]["name"].value;
    if (name == "" || name == null) {
        alert('Please fill out the User  Name');
        return false;
    }

    var username = document.forms["myform"]["username"].value;
    if (username == "" ||username == null) {
        alert('Please fill out the username');
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
    var  department = document.forms["myform"]["department"].value;
    if ( department == "" || department == null) {
        alert('Please fill out the  department');
        return false;
    }
    
    var date_of_birth = document.forms["myform"]["date_of_birth"].value;
    if (date_of_birth == "" ||date_of_birth == null) {
        alert('Please fill out the date_of_birth');
        return false;
    }
    var date_of_join = document.forms["myform"]["date_of_join"].value;
    if (date_of_join == "" ||date_of_join == null) {
        alert('Please fill out the date_of_join');
        return false;
    }
    var basic_salary = document.forms["myform"]["basic_salary"].value;
    if (basic_salary == "" ||basic_salary == null) {
        alert('Please fill out the basic salary');
        return false;
    }
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
  <body>
  <style>
.btn.custom-btn {
    background-color:  black; /* Set your desired background color */
    color: #FFFFFF; /* Set your desired text color */
}
</style>
 <form name="myform" action="" method="post" enctype="multipart/form-data" onsubmit="return validate()">
 <h1 class="text-center">Sign Up</H1>
        <div class="container">
        <div class="row">
            <div class="container my-25">
                <a href="display.php" class="btn btn-primary">view Data</a>
   </div>
</div>
 <div class="container col-md-6 my-4">

    <div class="form-groups">
	            <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="enter your name">
                </div><br>
         <div class="form-groups">
	        <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="enter your username">
                </div><br>
          <div class="form-groups">
	         <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="enter your password">
                </div><br>
            <div class="form-groups">
	          <label>Department</label>
                <input type="text" name="department" class="form-control" placeholder="enter your department">
                </div><br>
                <div class="form-groups">
	          <label>Date-Of-Birth</label>
                 <input type="date" name="date_of_birth" class="form-control" placeholder=" ">
                </div><br>
            <div class="form-groups">
	          <label>Date of joining</label>
                <input type="date" name="date_of_join" class="form-control" placeholder="enter your name">
                </div><br>
            <div class="form-groups">
	          <label>Basic salary</label>
                <input type="number" name="basic_salary" class="form-control" placeholder="enter your name">
                </div><br>
            <div class="form-groups">
                <label>File</label>
                <input type="file" name="file" class="form-control" placeholder="enter your file">
               </div><br>
    <button type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">Submit</button>
    <p class="text-center">Already have an account? Please <a href="login.php">Sign In</a></p>  </div>
</form>
</body>
</html>
<div>

</div>
</html>
<?php include_once('include/footer.php')?>