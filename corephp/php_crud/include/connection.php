<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mvc_crud";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    echo"";
}
else{
    echo"not connected";
}

?>