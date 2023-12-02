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
                    <h1 class="page-header">Edit product</h1>
                </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>	products name</label>
                                            <input class="form-control" type="text" name="product_name" value="<?php echo $fetch->product_name;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>	Discount price</label>
                                            <input class="form-control" type="number" name="discount_price"value="<?php echo $fetch->discount_price;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Main price</label>
                                            <input class="form-control" type="number" name="main_price" value="<?php echo $fetch->main_price;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Product image</label>
                                            <input class="form-control" type="file" name="product_img">
                                            <img src="../upload/product_emp/<?php echo $fetch->product_img;?>"width="50" height="50">
                                        </div>
                                 <div class="form-group">
                                            <label>Description</label>
                                            <input class="form-control" type="text" name="description" value="<?php echo $fetch->description;?>">
                                        </div>

                                       
                                       
                                        <button type="submit" name="submit" class="btn btn-primary">Save Button</button>
                                        <button type="reset" class="btn btn-success">Reset Button</button>
                                    </form>
                                </div>
                                <?php include_once('footer.php')?>
