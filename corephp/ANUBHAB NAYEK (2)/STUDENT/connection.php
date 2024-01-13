<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "std";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){
    echo"ok ";
}
else{
    echo"not connected";
}


?>