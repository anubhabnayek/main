<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajax1";


$conn = mysqli_connect($servername, $username, $password,$dbname);


 if ($conn) {
     echo "";
 }
 else{
     echo"Db not connected";
 }


?>


