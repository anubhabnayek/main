<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";


$conn = mysqli_connect($servername, $username, $password,$dbname);


 if ($conn) {
     echo "";
 }
 else{
     echo"Db not connected";
 }


?>
