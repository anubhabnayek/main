<?php
include("include/connection.php");
if(isset($_REQUEST['btn']))
{
$query =mysqli_query($conn,"SELECT * FROM state  WHERE c_id = '" . $_POST["btn"] . "'");
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
