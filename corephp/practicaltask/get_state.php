<?php
include('include/connection.php');
if(!empty($_POST["countrycode"])) 
{
$query =mysqli_query($conn,"SELECT * FROM state WHERE c_id = '" . $_POST["countrycode"] . "'");
?>
<option value="">Select State</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["sid"]; ?>"><?php echo $row["snm"]; ?></option>
<?php
}
}



?>
