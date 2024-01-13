<?php
include("connection.php");
session_start();
$std_id=$_GET['std_id'];
$query="DELETE from student where std_id=$std_id";
$result=mysqli_query($conn,$query);
if($result){
    $_SESSION['status']="data deleted successfully";
    header('location:view.php');


}
else{

echo "data not delete";
}


?>