<?php include_once('include/header.php');
include('include/connection.php');
 ?>
 <?php
    $id=$_GET['id'];
    $query="SELECT *from employee where id='$id'";
    $data=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($data);
  if(isset($_REQUEST['submit'])){
     $name=$_REQUEST['name'];
     $email=$_REQUEST['email'];
     $phone=$_REQUEST['phone'];
     $gender=$_REQUEST['gender'];
     $language_arr=$_REQUEST['language'];
     $language=implode(",",$language_arr);
     $c_id=$_REQUEST['c_id'];
    //echo"</pre>";print_r($_REQUEST);exit;
    $update="UPDATE employee set name='$name',email='$email',phone='$phone',gender='$gender',language='$language',c_id='$c_id' where id='$id'";
    $data=mysqli_query($conn,$update);
    if($data){
        echo"<script>
        alert('Data update successfully');
        window.location='display.php';
        </script>";
        }
     else{
      echo"<script>
      alert('Not Registered Success');
      </script>";
       }
 }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>
<style>
   .btn.custom-btn {
    background-color:  black; /* Set your desired background color */
    color: #FFFFFF; /* Set your desired text color */
}
</style>
  <body>
  <form name="myform" action="" method="post" enctype="multipart/form-data">
     <h1 class="text-center">Edit Data</h1>
     <div class="container">
       <div class="row">
       <div class="container col-md-8 my-4">
                  <div class="form-group">
				  <label>Name</label>
                  <input class="form-control" name="name" id="name" type="text" value="<?php echo $row['name']?>" placeholder = "Enter your name">
                  </div><br>

                  <div class="form-group">
				  <label>Email</label>
                  <input class="form-control" name="email" id="name" type="email" value="<?php echo $row['email']?>" placeholder = "Enter your email">
                  </div><br>

                  <div class="form-group">
				  <label>phone</label>
                  <input class="form-control" name="phone" id="name" type="text" value="<?php echo $row['phone']?>" placeholder = "Enter your phone number">
                  </div><br>

                  <div class="form-group">
				  <label>Gender:</label>
                  <input type="radio" name="gender" value="male"<?php if($row['gender']=="male"){echo"checked";}?>>Male
                  <input type="radio" name="gender" value="female" <?php if($row['gender']=="female"){echo"checked";}?>>Female
                  </div><br>

                  <div class="form-group">
				  <label>Language:</label>
                  <?php
                   $language=explode(',',$row['language']);
                  
                  
                  ?>
                  <input type="checkbox" name="language[]" value="english"<?php if(in_array('english',$language)){echo"checked";}?>>English
                  <input type="checkbox" name="language[]" value="hindi"<?php if(in_array('hindi',$language)){echo"checked";}?>>Hindi
                  <input type="checkbox" name="language[]" value="bengali"<?php if(in_array('bengali',$language)){echo"checked";}?>>Bengali
                  </div><br>

                  <div class="form-group">
				  <label>Country:</label>
                  <select id="" name="c_id" class="form-control">
                  <option value="">----Select country---</option>
                    <?php
                            $sel="SELECT employee.*,country.cnm from employee inner join country   on   employee.c_id = country.c_id ";
                            $data=mysqli_query($conn,$sel);
                             while($d=mysqli_fetch_array($data))
                              {
                                if($d['c_id']==$row['c_id'])
                                {
                                 ?>
                                <option value="<?php echo $d['c_id']?>" selected><?php echo $d['cnm']?></option>
                                <?php
                                }
                                 else{
                                    ?>
                                  <option value="<?php echo $d['c_id']?>"><?php echo $d['cnm']?></option>

                                    <?php
                                }
                                  }  
                                  ?>
                              </select>
                          </div><br>
                  <div class="form-groups">
                <label>File</label>
                <img src="include/upload/<?php echo $row['file']?>" height="50px" width="50px"> 
             <input type="file" name="file" class="form-control" placeholder="enter your file">
              </div><br>
          <button type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">Save</button>
         <p class="text-center">Already have an account? Please <a href="login.php">Sign In</a></p>  </div>
       </div>
    </div>

</from>
</body>
</html>

