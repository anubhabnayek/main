
<?php include_once('include/header.php');
include('include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script>
	$(document).ready(function() 
	{
		$('#table').DataTable();
	} );
</script>
</head>
<body>
    <div class="container">
    <h2 style="color: blue; text-align: center;">
                    Employee
                </h2>
                <div class="text-right">
                    <a href="Add_data.php" class="btn btn-primary">Add Data</a>
     </div></br>
    <table id="table"  class="table table-bordered">
    <thead>
   <tr>
      <th scope="col">ID</th>
      <th scope="col">IMAGE</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE NUMBER</th>
      <th scope="col">GENDER</th>
      <th scope="col">LANGUAGE</th>
      <th scope="col">COUNTRY</th>
      <th  align="center">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php
      $sel="SELECT employee.*,country.cnm from employee inner join country on employee.c_id = country.c_id ";
       $data=mysqli_query($conn,$sel);
       $result=mysqli_num_rows($data);
         if($result){
        while($row=mysqli_fetch_array($data)){
      
    
         ?>
    <tr>
      <td><?php echo $row['id']?></td>
      <td><img src="include/upload/<?php echo $row['file']?>" height="50px" width="50px"></td>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['phone']?></td>
      <td><?php echo $row['gender']?></td>
      <td><?php echo $row['language']?></td>
      <td><?php echo $row['cnm']?></td>
      <td>
        <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-primary">Edit</a>
        <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
   <?php
         
        }
    }
   ?>
   
   
  </tbody>

</table>
</div>
</body>
</html>
