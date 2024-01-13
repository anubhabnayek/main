<?php require_once("connection.php"); 
include_once("navbar.php");

$gallery_id=$_GET['gallery_id']; 
$sql="SELECT* from gallery WHERE gallery_id=$gallery_id limit 1";
$res=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($res)) 
{
$deleteimage=$row['image']; 
}
$folder="upload/";
unlink($folder.$deleteimage);
$sql="DELETE from gallery WHERE gallery_id=$gallery_id";
$result=mysqli_query($conn,$sql); 
if($result)
{
	 header("location:adminpage.php?action=deleted");
}
?>