<?php include_once('header.php')?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />



</head>

<body>
<div class="col-lg-12">
                    <h1 class="page-header">Edit Category</h1>
                </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" class="form-control" palaceholder="Enter the name" name="category_name" value="<?php echo $fetch->category_name;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Category image</label>
                                            <input type="file" class="form-control" placeholder="Enter text" name="category_img">
                                            <img src="../upload/category_emp/<?php echo $fetch->category_img;?>"width="50" height="50">
                                        </div>
                                       
                                       
                                        <button type="submit" name="submit" class="btn btn-primary">Save Button</button>
                                        <button type="reset" class="btn btn-success">Reset Button</button>
                                    </form>
                                </div>
                                <?php include_once('footer.php')?>
