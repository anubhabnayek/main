<?php
require_once('connection.php');



if(isset($_GET['gid']) && !empty($_GET['uid'])){
    $gid=$_GET['gid'];
    $uid=$_GET['uid'];
    

    $likeid= 0;
   
   $sql="INSERT INTO `like table`(`gallery_id`,`user_id`,`liked`) values ('$gid','$uid','$likeid')";
   $query=mysqli_query($conn,$sql);
   header('location:dashboard.php');
   
   
    }




?>