<?php
include("include/connection.php");
if(isset($_REQUEST['btn']))
{
$btn=$_POST["btn"];
$query1 =mysqli_query($conn,"SELECT city.city_id as city_id,city.ccity_name FROM city 
	join state on states.sid=city.sid 
	join country on country.c_id=city.c_id 
	WHERE city.sid = '$btn'");
?>
<option value="">Select City</option>
<?php
while($row1=mysqli_fetch_array($query1))  
{
?>
<option value="<?php echo $row1["city_id"];?>"><?php echo $row1["city_name"]; ?></option>
<?php
}
}
?>
