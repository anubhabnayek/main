
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>,
<body>
<div class="container">
<form action="" method="get">
    <div class="row">
        <div class="col-md-4">
<div class="input-group mb-3">
    <select name="short-order" class="from-control">
        <option value="">--select option--</option>
        <option value="ascending"<?php if(isset($_GET['short-order']) && $_GET['short-order'] =="ascending"){echo "selected";}?>>(Ascending order)</option>
        <option value="descending" <?php if(isset($_GET['short-order']) && $_GET['short-order'] =="descending"){echo "selected";}?>>(Descending order)</option>
</select>
    <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">short</button>
</from>
  </div>
</div>
<div class=table-responsive>
    <table class="table table-broder">
<thead>
    <tr>
    <style>
        table, th, td {
  border:1px solid black;
}

</style>
<table style="width:50%">

<tr>
    <th>name</th>
    <th>date of joining</th>
    <th>grosssalary</th>

     </tr>
<tbody>


  <?php include('connection.php');

   session_start();
//$emp_code=$_SESSION['emp_code'];

   $short_option="";
   if(isset($_GET["short-order"]))
 {
    if($_GET["short-order"] == "ascdending")
   {
    $short_option="ASC";
    }
    elseif($_GET["short-order"] == "descending")
      {
      $short_option="DESC";
        }
    }
    $query="SELECT `name`,joining,grosssalary from employee order by joining $short_option";
    $data=mysqli_query($conn,$query);

    if(mysqli_num_rows($data)>0)
    {
     foreach($data as $row){
       // echo "<pre/>";print_r($row);exit;

?>
            <tr>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['joining'];?></td>
            <td><?php echo $row['grosssalary'];?></td>

            </tr>
        <?php
    }
}
    else{

    }

?>

</tbody>
</thead>
</table>
</body>
</html>