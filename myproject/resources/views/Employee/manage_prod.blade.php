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
 <!--  page header -->
 <div class="col-lg-12">
                    <h1 class="page-header"> Manage product</h1>
                </div>
                 <!-- end  page header -->
                  <div class="row">
                <div class="col-lg-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            manage product
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                
                                        <tr>
                                        <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Product image</th>
                                            <th>Discount price</th>
                                            <th>Main price</th>
                                             <th>Description</th>
                                              <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         if(!empty($data_product)){
                                            foreach($data_product as $d){
                                            ?>
                                            <tr>
                                            <td><?php echo $d->id;?></td>
                                            <td><?php echo $d->product_name;?></td>
                                            <td><img src="../upload/product_emp/<?php echo $d->product_img;?>" height="50px" weight="50px"></td>
                                            <td><?php echo $d->discount_price;?></td>
                                            <td><?php echo $d->main_price;?></td>
                                            <td><?php echo $d->description;?></td>
                                            <td><button type="button" class="btn btn-primary">Add</button>
                                            <a href="editprod?editproduct_id=<?php echo $d->id;?>" class="btn btn-success">Edit</button>
                                            <a href="delete?delproduct_id=<?php echo $d->id;?>" class="btn btn-danger">Delete</a>

                                          </td>
                                        </tr>

                                         <?php



                                            }
                                           
                                           }
                                           else{
                                             ?>
                                            <tr>
                                                <td>Data Not Found</td>
                                           </tr>
                                           <?php
                                           }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                <?php include_once('footer.php')?>