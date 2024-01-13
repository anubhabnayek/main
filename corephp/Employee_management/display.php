<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
 
</head>
<?php include_once('include/header.php');
 include_once('connection.php');
//  session_start();
//  if(isset($_SESSION['login'])&& $_SESSION['login']==true){
//   $login=true;
//  }
//  else{
//   $login=false;

//  }
?>
<body>
<div class="container">
<h2 style="color: blue; text-align: center;">
                    Employee
                </h2>
<table class="table">
  <thead class="thead-light">
   
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Date of birth</th>
        <th scope="col">Date of joining</th>
        <th scope="col">Department</th>
        <th scope="col">Basic salary</th>
        <th scope="col">DA</th>
        <th scope="col">Allowance</th>
        <th scope="col">Gross salary</th>
        <th colspan="3" align="center">Action</th>
    </tr>
    </thead>
    <tbody>
      <?php
      $query="SELECT * from employee";
      $data=mysqli_query($conn,$query);
      $result=mysqli_num_rows($data);
      if($result){
        while($row=mysqli_fetch_array($data)){
          $basic_salary=$row['basic_salary'];
          $da = $basic_salary *0.04; 
          $allowance = $basic_salary *0.1;
          $grosssalary=$da+$allowance;
?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><img src="include/upload/<?php echo $row['file']?>" width="50px" height="50px"></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['date_of_birth']?></td>
            <td><?php echo $row['date_of_join']?></td>
            <td><?php echo $row['department']?></td>
            <td><?php echo $row['basic_salary']?></td>
            <td><?php echo $da?></td>
            <td><?php  echo $allowance?></td>
            <td><?php  echo $grosssalary ?></td>


        <td>
         <a href="edit_emp.php?id=<?php echo $row['id']?>" class="btn btn-primary">EDIT</a>
         <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">delete</a>
        </td>
        </tr>
<?php
        }
      }

      
      ?>
   

       




    
      <!-- @endforeach -->


    </tbody>
</table>
    </div>
</body>
</html>