<?php
include('include/connection.php');
if(!empty($_POST["statecode"])) 
{
$statecode=$_POST["statecode"];
$query1 =mysqli_query($conn,"SELECT city.city_id as cityid,city.city_name FROM city 
	join state on state.sid=city.sid 
	-- join country on country.cid=city.cityid 
	WHERE city.sid = '$statecode'");
?>
<option value="">Select City</option>
<?php
while($row1=mysqli_fetch_array($query1))  
{
?>
<option value="<?php echo $row1["cityid"];?>"><?php echo $row1["city_name"]; ?></option>
<?php
}
}
?>
