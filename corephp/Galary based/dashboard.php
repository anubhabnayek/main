
<?php
session_start();

include "connection.php";
include_once("navbar.php");

$login =false;
//print_r($_SESSION);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
  </head>
  <body container col-lg-12>
    <div class="d-flex m-4 container col-lg-12">
  
  <?php
 
  $sql = "SELECT * FROM user";
  $query = mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($query);
  $sql = "SELECT * FROM gallery";
  $query = mysqli_query($conn,$sql);
  $sql="SELECT * FROM `like table`";
  $query1=mysqli_query($conn,$sql);

 while($row=mysqli_fetch_array($query)){
  
  


    $gallery =  "<div class='container'> 
                 <div class='col-sm-3 col-xs-5 col-md-2 col-lg-2'>  

                  <img src= 'upload/". $row['image']. "' height='200' alt='image Failure'></img><br>
                  <div class='container m-2 col-lg-3'><h3>". $row['title'] ." </h3></div>
                  </div> ";
    $like = "<div class='container my-3 col-lg-4'>
                <form method='get'>
                <button type='submit' class='btn btn-primary' name='like' style='padding: 5px 35px;margin: -25px 3px;'>
                <a class='text-decoration-none text-white' href='like.php?gid={$row['gallery_id']}&uid={$_SESSION['user_id']}'><i class='fa fa-heart'></i> Like</a></button>
                </form>
            </div></div>";           
  
    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
      $login = true;

     if($_SESSION['user_type']='user'){
        echo $gallery;
      $_SESSION['gid']=$row['gallery_id'];   
        echo $like;
     }  
     elseif($_SESSION['user_type'] == 'Admin'){
     // echo $gallery."</div>";   
  }
     
 
   }else {   

     $login = false;
   }
}
  ?>








  

          


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>




  

