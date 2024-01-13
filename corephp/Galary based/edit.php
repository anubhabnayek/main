<?php require_once("connection.php");
 include_once("navbar.php");

 $gallery_id=$_GET['gallery_id']; 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
<?php
 if(isset($_POST['update_submit']))
{	
 $title=$_POST['title'];
 $folder = "upload/";
 $image_files=$_FILES['image']['name'];
 $file = $_FILES['image']['tmp_name'];
 $path = $folder . $image_files;  
 $target_file=$folder.basename($image_files);
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if($file!=''){
//Set image upload size 
    if ($_FILES["image"]["size"] > 500000) {
		$error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
	}
//Allow only JPG, JPEG, PNG & GIF 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
}
if(!isset($error))
{
if($file!='')
	{
$sql="SELECT* from gallery WHERE gallery_id=$gallery_id limit 1";
$res=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($res)) 
{
$deleteimage=$row['image']; 
}
unlink($folder.$deleteimage);
move_uploaded_file($file,$target_file); 
$sql="UPDATE gallery SET image='$image_files',title='$title' WHERE gallery_id=$gallery_id";
$result=mysqli_query($conn,$sql); 
	}
	else 
	{
	$sql="UPDATE gallery SET title='$title' WHERE gallery_id=$gallery_id";
	$result=mysqli_query($conn,$sql); 	
	} 
if($result)
{
 header("location: adminpage.php?action=saved");
}
else 
{
	echo 'Something went wrong'; 
}
}
		}


if(isset($error)){ 

foreach ($error as $error) { 
	echo '<div class="message">'.$error.'</div><br>'; 	
}

}
$sql="SELECT* from gallery WHERE gallery_id=$gallery_id limit 1";
$res=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($res)) 
{
$image=$row['image']; 
$title=$row['title']; 
}
	?> 
	<div class="container" style="width:500px;">
	<?php if(isset($update_sucess))
		{
		echo '<div class="success">Image Updated successfully</div>'; 
		} ?>
    <form action="" method="POST" enctype="multipart/form-data">
	<label>Image Preview </label><br>
	<img src="upload/<?php echo $image;?>" height="100"><br>
	<label>Change Image </label>
	
	<input type="file" name="image" class="form-control"><br><br>
	<label>Title</label>
	<input type="text" name="title" value="<?php echo $title;?>" class="form-control">
	<br><br>
	<button name="update_submit" class="btn-primary">Update </button>
</form>
</div>
</body>
</html>