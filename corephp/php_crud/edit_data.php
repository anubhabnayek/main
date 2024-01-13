<?php include_once('include/connection.php')?>
<?php
 $id=$_GET['id'];
 $query="SELECT*from student where id='$id' ";
 $data=mysqli_query($conn,$query);
 $row=mysqli_fetch_array($data);
 $old_img=$row['file'];

if(isset($_REQUEST['submit'])){
    
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $gender=$_REQUEST['gender'];
    $language_arr=$_REQUEST['language'];
    $language=implode(",",$language_arr);
    //echo"<pre>";print_r($_REQUEST);exit;

    if($_FILES['file']['size']>0)
    {
    
   
    $file=$_FILES['file']['name'];
    $path="upload/user/".$file;
    $tmp_file=$_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_file,$path);

    $update="UPDATE student set name='$name',email='$email',phone='$phone',gender='$gender',language='$language',file='$file' where id='$id'";    
    $data=mysqli_query($conn,$update);
    if($data){
        unlink('upload/user/'.$old_img);
        echo"<script>
        alert('data updated successfully');
        window.location='view_data.php';
        </script>
        ";
    }
}
    else{
        $update="UPDATE student set name='$name',email='$email',phone='$phone',gender='$gender',language='$language' where id='$id'";    

     $data=mysqli_query($conn,$update);

       if($data){
            echo"<script>
        alert('not updated successfully');
        window.location='view_data.php';
        </script>
        "; 
        }
    }

}

?>


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
    <h1 class="text-center" style="color: blue;">Edit Data</h1>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>" id="exampleInputEmail1" placeholder="Enter email">
 </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
 </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Mobile No</label>
    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
 </div>
 
 <div class="form-group">
    <label for="">Gender</label>
    <input type="radio" name="gender" value="male"<?php if($row['gender']=="male"){echo "checked";}?>>Male
    <input type="radio" name="gender" value="female"<?php if($row['gender']=="female"){echo "checked";}?>>Female
 </div>
 <div class="form-group">
     <?php
      $language=explode(',',$row['language']);
    ?>
    <label for="">Language</label>
    <input type="checkbox" name="language[]" value="English"<?php if(in_array('English',$language)){echo"checked";}?>>English
    <input type="checkbox" name="language[]" value="Hindi"<?php if(in_array('Hindi',$language)){echo"checked";}?>>Hindi
    <input type="checkbox" name="language[]" value="Gujrati"<?php if(in_array('Gujrati',$language)){echo"checked";}?>>Gujrati
 </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="file" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <img src="upload/user/<?php echo $row['file']?>" height="50" width="50">
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary">save</button>
</form>
 </div>
</body>
</html>