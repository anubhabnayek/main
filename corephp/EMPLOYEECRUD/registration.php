<?php 
    //session_start();
  /*  include("connection.php");
    session_start();
    if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password= md5($_POST["password"]);
    $department=$_POST['department'];
    $birthday=date('y-m-d',strtotime($_POST['birthday']));
    $joining=date('y-m-d',strtotime($_POST['joining']));
    $basicsalary=$_POST['basicsalary'];
    $da = $basicsalary *0.04;
    $allowance = $basicsalary *0.1;
    $grosssalary=$da+$allowance;
    $imagefile=$_FILES['image']['name'];
    $file = $_FILES['image']['tmp_name'];
    $folder = "upload/";
    $path = $folder . $imagefile;
    //echo "<pre>";print_r($_POST);exit;
    //$passwordHash = password_hash($password,PASSWORD_DEFAULT);
   // echo "<pre>";print_r($passwordHash);exit;

    $errors = array();

    if(empty($name) OR empty($username) OR empty($password)OR empty($department)OR empty($birthday)OR empty($joining)OR empty($basicsalary)OR empty($grosssalary)OR empty($imagefile) ){
    array_push($errors,"All fields are required");
     }
    
     if(strlen($password)<8){
        array_push($errors,"password must be at least 8 character long");
    
    }
     if($password!=$password){
        array_push($errors,"password does not match");
     }
     
   $sql="SELECT * FROM employee where username='$username'";

    $result = mysqli_query($conn,$sql);

    $rowcount = mysqli_num_rows($result);
    echo "<pre>";print_r($rowcount);exit;

    if($rowcount>0){
        array_push($errors,"username already exist");

    }
    if(count($errors)>0){
        foreach($errors as $error){
            echo "<div class='alert alert-danger'>$error</div>";
        }
        
    }else{
   
    $sql="INSERT INTO employee(`name`,`username`,`password`,`department`,`birthday`,`joining`,`basicsalary`,`grosssalary`,`image`,`da`,`allowance`)
    VALUES('$name','$username','$password','$department','$birthday','$joining','$basicsalary','$grosssalary','$imagefile','$da','$allowance')";
    $data=mysqli_query($conn,$sql); 
    if($data){
    if(move_uploaded_file($file,$path)){
            //$msg = ;
            echo "image upload successfully";
            
           }else{
            echo "Failed to upload image";
    
       }
    $last_id=mysqli_insert_id($conn);
    //echo "<pre/>";print_r($last_id);exit;

   $sql1 ="INSERT INTO admin(emp_code,username,password)VALUES('$last_id','$username','$password')";

   $result=mysqli_query($conn,$sql1);
    if($result){
    echo "<div class='alert alert-success'>You are register sucesfully</div>";

}
   else{
    die("somthing went wrong");

           
        }
    }

}
    }
    
    */?>


</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
<h1 class="text-center">signup us</H1>
        <div class="container">
        <div class="row">
            <div class="container my-25">
                <a href="" class="btn btn-primary">view gallery</a>
</div>

</div>
<div class="container col-md-6 my-4">

        <div class="form-groups">
		
		
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="enter your name">
            </div><br>
			 <label>Name</label>
                <input type="text" name="username" class="form-control" placeholder="enter your name">
            </div><br>
			 <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="enter your name">
            </div><br>
			 <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="enter your name">
            </div><br>
			 <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="enter your name">
            </div><br>
             <div class="form-groups">
                <label>File</label>
                <input type="file" name="file" class="form-control" placeholder="enter your file">
            </div><br>
            <div class="form-groups">
                <label>Description</label>
                <textarea name="description" cols="20" rows="10" class="form-control"></textarea>
				
    </div><br>
	<button type="submit" name="submit" class="btn btn-primary">Save</button>
  </div>


</form>
</body>
</html>
<div>
@endsection
</div>
</html>
