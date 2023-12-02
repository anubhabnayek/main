@extends('employee.layout.structure')

@section('main_container')
<!DOCTYPE html>
<html>

<head>
    
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
                                           
                                            ?>
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td><img src="../upload/product_emp/<?php echo $d->product_img;?>" height="50px" weight="50px"></td>
                                            <td></td>
                                            <td><?php echo $d->main_price;?></td>
                                            <td><?php echo $d->description;?></td>
                                            <td><button type="button" class="btn btn-primary">Add</button>
                                            <a href="" class="btn btn-success">Edit</button>
                                            <a href="" class="btn btn-danger">Delete</a>

                                          </td>
                                        </tr>

                                         
                                           
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
@endsection