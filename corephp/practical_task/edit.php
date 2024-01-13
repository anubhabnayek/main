<?php include_once('connection.php');?>
<?php
$id=$_GET['id'];
$sql="SELECT * from profile where id='$id'";
$data=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($data);
$old_img=$row['file'];
if(isset($_REQUEST['submit']))
{
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $gender=$_REQUEST['gender'];
    $hobbies_arr=$_REQUEST['hobbies'];
    $hobbies=implode(",",$hobbies_arr);
    $education=$_REQUEST['e_id'];

    if($_FILES['file']['size']>0)
    {

     $file=$_FILES['file']['name'];
     $path="upload/user/".$file;
     $tmp_file=$_FILES['file']['tmp_name'];
     move_uploaded_file($tmp_file,$path);
    
     $upd="UPDATE profile set name='$name',email='$email',phone='$phone',gender='$gender',hobbies='$hobbies',e_id='$education',file='$file' where id='$id'";
     $data=mysqli_query($conn,$upd);
     if($data){
        unlink('upload/user'.$old_img);
        echo"<script>
        alert('data update successfully');
        window.location='display_data.php';
        </script>
        ";
     }
    }
     else{
        $upd="UPDATE profile set name='$name',email='$email',phone='$phone',gender='$gender',hobbies='$hobbies',e_id='$education' where id='$id'";
        $data=mysqli_query($conn,$upd);
        if($data){
        echo"<script>
        alert('data update successfully');
        window.location='display_data.php';
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
    <h2 class="text-center">Edit profile</h2>
 <div class="container">
    <div class="text-right">
        <a href="display_data.php" class="btn btn-primary">view data</a>
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo$row['name'];?>" placeholder="Enter name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo$row['email'];?>" placeholder="Enter email">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">phone</label>
    <input type="text" name="phone" class="form-control"value="<?php echo$row['phone'];?>"  placeholder="Enter Mobile no">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Gender</label>
    <input type="radio" name="gender" value="male" <?php if($row['gender']=='male'){echo "checked";}?>>Male
    <input type="radio" name="gender" value="female" <?php if($row['gender']=='female'){echo "checked";}?>>Female
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Education</label>
    <select name="e_id" class="form-control">
        <option value="">--select Education--</option>
        <?php
        $sql="SELECT * from education ";
        $data=mysqli_query($conn,$sql);
        while($d=mysqli_fetch_array($data)){
            if($d['id']==$row['e_id']){
            ?>
            <option value="<?php echo $d['id']?>"selected><?php echo $d['edu_name']?></option>
            <?php 
            }
            else{
                ?>
                <option value="<?php echo $d['id']?>"><?php echo $d['edu_name']?></option>
            <?php
            }
        }

        ?>
    
   </select>
  
  </div>
  <div class="form-group">
  <?php
      $hobbies=explode(",",$row['hobbies']);
    ?>
    <label for="exampleInputPassword1">Hobbies</label>
    <input type="checkbox" name="hobbies[]" value="cricket" <?php if(in_array('cricket',$hobbies)){echo"checked";}?>>Cricket
    <input type="checkbox" name="hobbies[]" value="dancing"<?php if(in_array('dancing',
    $hobbies)){echo"checked";}?>>Dancing
    <input type="checkbox" name="hobbies[]" value="drawing" <?php if(in_array('drawing',$hobbies)){echo"checked";}?>>Drawing
    <input type="checkbox" name="hobbies[]" value="knitting" <?php if(in_array('knitting',$hobbies)){echo"checked";}?>>Knitting
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="file" class="form-control" placeholder="">
    <img src="upload/user/<?php echo $row['file'];?>" height="50px" weight="50px">

  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</body>
</html>