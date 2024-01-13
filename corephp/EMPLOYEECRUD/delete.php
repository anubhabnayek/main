<?php
include("connection.php");
session_start();
$emp_code=$_GET['emp_code'];
$sql="DELETE from employee where emp_code='$emp_code'";
$data=mysqli_query($conn,$sql);
if($data){
    $_SESSION['status']="data deleted successfully";
         header('location: dashboard.php');
}
else{
    echo"data not deleted";
}

?>