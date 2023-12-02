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
    <h1 class="page-header">Add Product</h1>
        </div>
           <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" name="product_name">
                                             </div>
                                        <div class="form-group">
                                            <label>Discount_price</label>
                                            <input type="number" class="form-control" name="discount_price" >
                                        </div>
                                        <div class="form-group">
                                        <label>Main_price</label>
                                        <input type="number" class="form-control"name="main_price">                                        
                                        </div>
                                        <div class="form-group">
                                            <label>Product_img</label>
                                            <input type="file"  class="form-control" name="product_img">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                        <input type="text" class="form-control" name="description">                                        
                                    </div>
                                       
                                        
                                        <button type="submit" name="submit" class="btn btn-primary">Submit Button</button>
                                        <button type="reset" class="btn btn-success">Reset Button</button>
                                    </form>
                                </div>
                                <?php include_once('footer.php')?>
