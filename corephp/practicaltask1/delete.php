<?php
include('include/connection.php');
$id=$_GET['id'];
$query="DELETE from employee where id='$id'";
$data=mysqli_query($conn,$query);
if($data){
    echo"<script>
    alert('deleted data');
    window.location='display.php';
    </script>
    ";
}
else{
    echo"<script>
    alert('data not deleted');
    </script>
    ";
}
?>