<?php
include('connection.php');
$id=$_GET['id'];
$query="DELETE from profile where id='$id'";
$data=mysqli_query($conn,$query);
if($data){
    echo"<script>
    alert('deleted data');
    window.location='display_data.php';
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