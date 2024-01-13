<?php include_once('connection.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<h2 class="text-center">display profile</h2>

<div class="container">
<div class="text-right">
        <a href="Add_data.php" class="btn btn-primary">Add data</a>
    </div><br><br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Education</th>
      <th scope="col">Hobbies</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT profile.*,education.edu_name from profile inner join education on profile.e_id = education.id";    $data=mysqli_query($conn,$sql);
    $data=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($data);
    if($result){
     while($row=mysqli_fetch_array($data)){
        ?>
     
    <tr>
    <td><?php echo $row['id'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['phone'];?></td>
      <td><?php echo $row['edu_name'];?></td>
      <td><?php echo $row['hobbies'];?></td>
      <td><img src="upload/user/<?php echo $row['file']?>" height="50px"width="50px"></td>
      <td><a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-primary">Edit</a>
      <a href="delete.php?id=<?php echo $row['id']?>"class="btn btn-danger">Delete</a>
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