<?php
include("connection.php");
session_start();
$query="SELECT * from student";
$result=mysqli_query($conn,$query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<body style="margin: 20px;">
    <h1>list of student</h1>
    <a class='btn btn-primary btn-sm'href="index.php">Add student</a>
    <br>
    
    <table class="table">
        <thead>
            <tr>
                
                <th>name</th>
                <th>email</th>
                <th>password</th>
                <th>confrimpassword</th>
                <th>country</th>
                 <th>city</th>
                 <th>state</th>
                <th>gender</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
            
            <?php
            while($row=mysqli_fetch_assoc($result)){
                ?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['password'];?></td>
                <td><?php echo $row['confrimpassword'];?></td>
                <td><?php echo $row['country'];?></td>
                <td><?php echo $row['state'];?></td>
                <td><?php echo $row['cityname'];?>                
                <td><?php echo $row['gender'];?></td>
           <td>
            <a class='btn btn-primary btn-sm' href="update.php?std_id=<?php echo $row['std_id']?>">update</a></td>
            <td><a class='btn btn-danger btn-sm' href="delete.php?std_id=<?php echo $row['std_id']?>">delete</a>
            </td>
         </tr>
     <?php
            }
        ?>
        <?php
        if(isset($_SESSION['status'])) {
            echo $_SESSION['status'];
            unset($_SESSION['status']);
        }
        
        
        ?>
       </tbody>
        </table>
</body>
</html>