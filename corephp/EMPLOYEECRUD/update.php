
<?php 
include('connection.php');
include_once("navbar.php");

//echo"helo";
session_start();
$login=false;
if(isset($_SESSION['login']) && $_SESSION['login']==true)
{
    $login=true;

}
else{
    $login=false;
    header("location:login.php");

}
$emp_code=$_SESSION['emp_code'];
$query="SELECT *from employee where emp_code='$emp_code'";
$data=mysqli_query($conn,$query);
$row=mysqli_fetch_array($data);
//echo "<pre/>";print_r($_row);exit;

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password= md5($_POST["password"]);
    $department=$_POST['department'];
    $birthday=date('y-m-d',strtotime($_POST['birthday']));
    $joining=date('y-m-d',strtotime($_POST['joining']));
    $basicsalary=$_POST['basicsalary'];
    //$da =$_POST['DA'];
    //$allowance = $POST['allowance'];
    $da = $basicsalary *0.04;
    $allowance = $basicsalary *0.1;
    $grosssalary=$da+$allowance;

    //$grosssalary=$_POST['grosssalary'];
    $imagefile=$_FILES['image']['name'];
    $file = $_FILES['image']['tmp_name'];
    $folder = "upload/";
    $path = $folder . $imagefile;
   // echo "<pre/>";print_r($_POST);exit;


   $update="UPDATE employee set name='$name',username='$username',password='$password',department='$department',
   birthday='$birthday',joining='$joining',basicsalary='$basicsalary',DA='$da',allowance='$allowance',grosssalary='$grosssalary',image='$imagefile' where emp_code=$emp_code";
  $data=mysqli_query($conn,$update);
  if($data){
 
    $_SESSION['status']="Data update sucesfully";
    header('location:'); 
//echo"data update";
    
        }
        
    else{
        echo"data not updated";
        
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
    <style>
h3{
    
    
text-align: center;
    }
</style>

<h3>Update from</h3>

</head>

<body>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
<div class=form-group>
<lable>Name</lable>
<input value= "<?php echo $row['name'];?>" type="text"palaceholder="name"class="form-control"id="name"name="name" >
</div>
<div class=form-group>
<lable>username</lable>
<input value= "<?php echo $row['username'];?>" type="text"palaceholder="Enter username"class="form-control"id="username"name="username" >
</div>
<div class=form-group>
<lable>password</lable>
<input value= "<?php echo $row['password'];?>" type="password"palaceholder="Enter a password"class="form-control"id="password"name="password" >
</div>
<div class=form-group>
<lable>Department</lable>
<input value= "<?php echo $row['department'];?>" type="text"palaceholder="Enter department"class="form-control"id="department"name="department" >
</div>
<div class=form-group>
<lable>Date of birth</lable>
<input type="date" value= "<?php echo $row['birthday'];?>" palaceholder="Enter date of birth"class="form-control" name="birthday">
</div>

<div class=form-group>
<lable>Date of joining</lable>
<input type="date" value= "<?php echo $row['joining'];?>" palaceholder="Enter date of joining"class="form-control" name="joining">
</div>
<div class=form-group>
<lable>Photo</lable>
<image src="upload/<?php echo $row['image']?>"height="120px" width="120px" style="broder-radius:30px;"><input type="file" name="image" placeholder="image" >
</div>
<div class=form-group>
<lable>Basic salary</lable>
<input value= "<?php echo $row['basicsalary'];?>" type="number"palaceholder="enter a basic salary"class="form-control"name="basicsalary" >
</div>
<div class=form-group>
<lable>DA</lable>
<input type="text"palaceholder=""class="form-control" value="<?php echo $row['DA'];?>"name="DA" >
</div>
<div class=form-group>
<lable>Allowance</lable>
<input type="text"palaceholder=""class="form-control"name="allowance" value="<?php echo $row['allowance'];?>"   >
</div>
<div class=form-group>
<lable>Gross salary</lable>
<input value= "<?php echo $row['grosssalary'];?>" type="number"palaceholder="enter a gross salary"class="form-control"name="grosssalary" >
</div>

<input type ="submit" class="btn btn-primary"value="update" name="update"> 
    </form>
    </body>
</html>
