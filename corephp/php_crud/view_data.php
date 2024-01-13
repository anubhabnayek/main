<?php
include_once('include/connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

  <div class="container">
  <h2 style="color: blue; text-align: center;">
                    Employee
                </h2> 
  <div class="text-right">
                    <a href="add_data.php" class="btn btn-primary">Add Data</a>
     </div></br>
     
<table class="table">

  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Language</th>
      <th scope="col">Phone</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query="SELECT *from student";
    $data=mysqli_query($conn,$query);
    while($row=mysqli_fetch_object($data))
    {
    
    ?>
    <tr>
      <td><?php echo $row->id;?></td>
      <td><?php echo $row->name;?></td>
      <td><?php echo $row->email;?></td>
      <td><?php echo $row->gender;?></td>
      <td><?php echo $row->language;?></td>
      <td><?php echo $row->phone;?></td>
      <td><img src="upload/user/<?php echo $row->file;?>" height="50" width="50"></td>
      <td>
        <a href="edit_data.php?id=<?php echo $row->id?>" class="btn btn-primary">Edit</a>
        <a href="delete.php?id=<?php echo $row->id?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php
    }
    ?>
    
  </tbody>
</table>
</div>
</body>
</html>