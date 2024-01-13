<?php
    session_start();
    include('connection.php');
    //include 'upload.php';
    
    $gallery_id= $_GET['gallery_id'];
     
    
    $sql ="SELECT * FROM `gallery` WHERE gallery_id = $gallery_id";
    
    $result = mysqli_query($conn,$sql);

    while($row=mysqli_fetch_array($result)) 
			{
				echo '<tr>

                  <td><img src="upload/'.$row['image'].'" height="500"></td> <br><br>
                  <td>'.$row['title'].'</td> 

        
                  <tr>';
            }
  
    ?>