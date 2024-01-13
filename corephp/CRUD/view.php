
<?php include ('connection.php');
   session_start();
?>
<a href="index.php">Home</a>
    <style>
    table, th, td {
  border:1px solid black;
}
</style>
<table style="width:50%">
     <tr>
     <th>Id</th>

        <th>Image</th>
        <th>Title</th>
        <th>Created</th>
        <th colspan="2">Action</th>
    </tr>

 <?php
   if(isset($_SESSION['status'])){
    
      echo $_SESSION['status'];
      unset($_SESSION['status']);
}
?>
<?php
$query= "SELECT * from  gallery ";
$data=mysqli_query($conn,$query);
$result=mysqli_num_rows($data);
if($result){
while($row=mysqli_fetch_array($data)){
?>
    <tr>
        <td><?php echo $row['id'];?>
        </td>
        <td><?php echo $row['image'];?>
        </td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['created_at'];?>
        </td>
        <td><a href="view.php?id=<?php echo $row['id'];?>">view</a>
        </td>
   
        <td><a href="update.php?id=<?php echo $row['id'];?>">Edit</a>
        </td>
        <td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a>
        </td>
     </tr>
     <?php
}
}
else{

}
?>
</table>

  

  