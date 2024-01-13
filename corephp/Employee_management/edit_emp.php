 <?php include_once('include/header.php');
 include_once('connection.php');
 $id=$_GET['id'];
 $query="SELECT*from employee where id='$id'";
 $data=mysqli_query($conn,$query);
 $row=mysqli_fetch_array($data);
 ?>
 <?php
 if(isset($_REQUEST['update'])){
    //echo "<pre/>";print_r($_REQUEST);exit;
    $name=$_REQUEST['name'];
    $username=$_REQUEST['username'];
    $department=$_REQUEST['department'];
    $date_of_birth=$_REQUEST['date_of_birth'];
    $date_of_join=$_REQUEST['date_of_join'];
    $basic_salary=$_REQUEST['basic_salary'];
    $file=$_FILES['file']['name'];
    $path="include/upload/".$file;
    $tmp_file=$_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_file,$path);
    
    $updated_at=date('Y-m-d H:i:s');

    $update="UPDATE employee set name='$name',username='$username',department='$department',
    date_of_birth='$date_of_birth',date_of_join='$date_of_join',basic_salary='$basic_salary',file='$file',updated_at='$updated_at' where id='$id'";
    $data=mysqli_query($conn,$update);
    if($data){

        echo"<script>
        alert('Data update Successfully');
        window.location='display.php';
        </script>";
    }
    else{
        echo"<script>
        alert('Failed');
        </script>";
    }
 }
 ?>


  <body>
  <style>
    .btn.custom-btn {
    background-color:  black; /* Set your desired background color */
    color: #FFFFFF; /* Set your desired text color */
}
</style>
 <form action="" method="post" enctype="multipart/form-data">
 <h1 class="text-center">Edit Employee</H1>
        <div class="container">
        <div class="row">
            
</div>
 <div class="container col-md-6 my-4">

    <div class="form-groups">
	            <label>Name</label>
                <input type="text" name="name" value="<?php echo $row['name']?>" class="form-control" placeholder="enter your name">
                </div><br>
         <div class="form-groups">
	        <label>Username</label>
                <input type="text" name="username" value="<?php echo $row['username']?>"  class="form-control" placeholder="enter your username">
                </div><br>

            <div class="form-groups">
	          <label>Department</label>
                <input type="text" name="department" value="<?php echo $row['department']?>"  class="form-control" placeholder="enter your department">
                </div><br>
                <div class="form-groups">
	          <label>Date-Of-Birth</label>
                 <input type="date" name="date_of_birth" value="<?php echo $row['date_of_birth']?>"  class="form-control" placeholder=" ">
                </div><br>
            <div class="form-groups">
	          <label>Date of joining</label>
                <input type="date" name="date_of_join" value="<?php echo $row['date_of_join']?>"  class="form-control" placeholder="enter your name">
                </div><br>
            <div class="form-groups">
	          <label>Basic salary</label>
                <input type="number" name="basic_salary" value="<?php echo $row['basic_salary']?>"  class="form-control" placeholder="enter your name">
                </div><br>
            <div class="form-groups">
                <label>File</label>
                <input type="file" name="file" class="form-control" placeholder="enter your file">
                 <img src="include/upload/<?php echo $row['file']?>"width="50px" height="50px"> 
            </div><br>
    <button type="submit" name="update" value="update" class="btn custom-btn form-control mt-4 mb-3">Save</button>
     </div>


</form>
</body>
</html>
<div>

</div>
</html>
