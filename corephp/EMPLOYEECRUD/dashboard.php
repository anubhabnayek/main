

<?php include ('connection.php');
include_once("navbar.php");

//echo"hello";
session_start();
$login=false;
if(isset($_SESSION['login']) && $_SESSION['login']==true)
{
    $login=true;

}
else{
    $login=false;
    header("location:adminlogin.php");

}

?>
    
    
    <style>
        table, th, td {
  border:2px solid black;
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
        <th>DA</th>
        <th>allowance</th>
        <th>grosssalary</th>
        <th>image</th>
        <th colspan="2">Action</th>
     </tr>
<?php


$query="SELECT * from employee order by emp_code DESC ";
$data=mysqli_query($conn,$query);
$result=mysqli_num_rows($data);
//echo "<pre/>";print_r($data);exit;

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
        <td><?php echo $row['DA'];?>
        </td>
        <td><?php echo $row['allowance'];?>
        </td>
        <td><?php echo $row['grosssalary'];?>
        </td>
        <td><image src="upload/<?php echo $row['image']?>"height="120px" width="120px" style="broder-radius:30px;">
        </td>
        <td><a href="update1.php?emp_code=<?php echo $row['emp_code'];?>">Edit</a>
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

  