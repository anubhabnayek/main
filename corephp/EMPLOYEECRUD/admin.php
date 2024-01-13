<?php if(isset($_GET['short-order']) && $_GET['short-order'] =="ascending"){echo "selected";}?>

<?php include('connection.php');
//echo"hello";
session_start();

/*if(isset($_SESSION[$login]) && $_SESSION[$login]==true){
$login= true;
}
else{
    $login= false;
    header("location: login.php")
}
/*
?>
<a href="registration.php">Home</a>
    
    
    <style>
        table, th, td {
  border:1px solid black;
}

</style>
<table style="width:50%">

<tr>
        <th>emp_code</th>
        <th>name</th>
        <th>username</th>
        <th>password</th>
        <th>department</th>
        <th>date of birth</th>
        <th>date of joining</th>
        <th>basicsalary</th>
        <th>grosssalary</th>
        <th>image</th>
        <th colspan="2">Action</th>


</tr>
<?php
//$query= "SELECT employee.name,employee.username,employee.password,employee.department,employee.birthday,employee.joining,
//employee.basicsalary,employee.grosssalary,employee.image,employee.emp_code from employee inner join admin on employee.emp_code = admin.emp_code";
$query="SELECT * from employee ";

$data=mysqli_query($conn,$query);
$result=mysqli_num_rows($data);
if($result){




while($row=mysqli_fetch_array($data)){
//echo "<pre/>";print_r($row);exit;


 ?>
    <tr>
        <td><?php echo $row['emp_code'];?>
</td>
    <td><?php echo $row['name'];?>
        </td>
        <td><?php echo $row['username'];?>
        </td>
        <td><?php echo $row['password'];?>
        </td>
        
        <td><?php echo $row['department'];?>
        </td>
        <td><?php echo $row['birthday'];?>
        </td>
        <td><?php echo $row['joining'];?>
        </td>
        <td><?php echo $row['basicsalary'];?>
        </td>
        <td><?php echo $row['grosssalary'];?>
        </td>
        <td><image src="upload/<?php echo $row['image']?>"height="120px" width="120px" style="broder-radius:30px;">
        </td>
        <td><a href="update.php?emp_code=<?php echo $row['emp_code'];?>">Edit</a>
        </td>
        <td><a href="delete.php?emp_code=<?php echo $row['emp_code'];?>">Delete</a>
        </td>
     </tr>
     <?php
}
}
else{

}
if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']);
}
?>

</table>

  