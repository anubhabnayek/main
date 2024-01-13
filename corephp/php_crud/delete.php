<?php
include_once('include/connection.php');
$id=$_GET['id'];
$del="DELETE from student where id='$id'";
$data=mysqli_query($conn,$del);
if($data){
    echo"<script>
    alert('data deleted successfully');
    window.location='view_data.php';
    </script>
    ";
}
else{
    echo"<script>
    alert('data not deleted ');
    
    </script>
    ";
}

?>