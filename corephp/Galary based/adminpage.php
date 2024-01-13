

<?php require_once("connection.php");
include_once("navbar.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title></title>
</head>
<body>
<h2 class="text-danger">Gallery</h2>

<div class="container_display">
		<span style="float:right;"><a href="upload.php"><button class="btn-primary">Add New image </button></a></span>
		<br><br>
	<?php 
	if(isset($_GET['image_success']))
		{
		echo '<div class="success">Image Uploaded successfully</div>'; 
		}

		if(isset($_GET['action']))
		{
    $action=$_GET['action'];
	if($action=='saved')
	{
		echo '<div class="success">Saved </div>'; 
	}
	elseif($action=='deleted')
	{
		echo '<div class="success">Image Deleted Successfully ... </div>'; 
	}
		}
	?>
    <style>
    table, th, td {
  border:1px solid black;
}
</style>
<table style="width:100%">
     <tr>
     <th>Id</th>

        <th>Image</th>
        <th>Title</th>
        <th>Created</th>
        <th colspan="2">Action</th>
    </tr>
   

    </tr>

		<?php
		$sql="SELECT* from gallery ORDER by gallery_id DESC";
        $res=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_array($res)) 
			{
				echo '<tr> 
                <td>'.$row['gallery_id'].'</td> 

                  <td><img src="upload/'.$row['image'].'" height="200"></td> 
                  <td>'.$row['title'].'</td> 
                  <td>'.$row['created_at'].'</td> 

                 <td><a href="view.php?gallery_id='.$row['gallery_id'].'"><button class="btn-primary">View </button></a>

                  <td><a href="edit.php?gallery_id='.$row['gallery_id'].'"><button class="btn-primary">Edit </button></a>
                  	<br> <br>
					  <a href=\'delete.php?gallery_id='.$row['gallery_id'].'\' onClick=\'return confirm("Are you sure you want to delete?")\'"><button class="btn-primary btn_del">Delete</button></a>
					  </td> 
				</tr>';
} ?>
		
	</table>
	</div>
</body>
</html>