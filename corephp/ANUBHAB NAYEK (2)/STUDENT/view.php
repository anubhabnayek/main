
<?php include ('connection.php');
session_start();
?>
<a href="index.php">Home</a>
    
    
    <style>
       
        table, th, td {
  border:1px solid black;
  text-align: center;

    }

</style>
<h2>Student Record</h2>

<table style="width:70%">

<tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>DOB</th>
        <th>Age</th>
        <th>Maths</th>
        <th>English</th>
        <th>Hindi</th>
        <th>Social</th>
        <th>sience</th>
        <th>Total</th>
        <th>Percentage(%)</th>
        <th>Grade</th>
</tr>
<?php
if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']);
}

?>
<?php
$query= "SELECT student.firstname,student.lastname,student.birthday,marksheet.maths,marksheet.english,
marksheet.hindi,marksheet.social,marksheet.sience from student inner join marksheet on student.std_id = marksheet.std_id";
$data=mysqli_query($conn,$query);
$result=mysqli_num_rows($data);
//echo "<pre/>";print_r($result);exit;
if($result){
while($row=mysqli_fetch_array($data)){
//echo "<pre/>";print_r($data);exit;
?>
 <?php
 $dob = $row['birthday']; 
   //$age = date_diff(date_create($dob), date_create('today'))->y;
 $today = date("Y-m-d");
 $diff = date_diff(date_create($dob), date_create($today));
 $age=$diff->format('%y');

    $Maths= $row['maths'];
    $English= $row['english'];
    $Hindi=$row['hindi'];
    $Social= $row['social'];
    $Sience= $row['sience'];
    $Total=(int)$Maths+(int)$English+(int)$Hindi+(int)$Social+(int)$Sience;
    $Percentage=((float)$Total*100)/500;
    switch($Percentage){
    case $Percentage>=70;
    $Grade="Distinction"; 
    break;
    case $Percentage>=60 && $Percentage<=69;
    $Grade ="First class";
    break;
    case $Percentage>=50 && $Percentage<=59;
    $Grade ="Second class";
    break;
    case $Percentage>=40 &&  $Percentage<=49;
    $Grade ="Third class";
    break;
    default:
    $Grade ="Fail"; 
   }
   ?>
    <tr>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['birthday']; ?> </td>
        <td><?php echo $age; ?></td>
        <td><?php echo $row['maths'];?></td>
        <td><?php echo $row['english'];?></td>
        <td><?php echo $row['hindi'];?> </td>
        <td><?php echo $row['social'];?> </td>
        <td><?php echo $row['sience'];?> </td>
        <td><?php echo $Total; ?> </td>
        <td><?php echo $Percentage ."%";?> </td>
        <td><?php echo $Grade ;?> </td>
        </tr>
     <?php
}
}
?>

</table>

  

  