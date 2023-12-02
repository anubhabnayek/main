

@extends('admin.layout.structure')

@section('main_container')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Employee</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Employee
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(!empty($data_employee)){
                                        foreach($data_employee as $d){
                                            ?>
                                        
                                        <tr>
                                        <td><?php echo $d->emp_id;?></td>
                                        <td><?php echo $d->Emp_name;?></td>
                                        <td><?php echo $d->email;?></td>

                                        <td><a href="status1?statusemp_id=<?php echo $d->emp_id;?>" type="button" class="btn btn-primary"><?php echo $d->Status;?></a>
                                        <a href="editemp?editemployee_id=<?php echo $d->emp_id;?>" type="button" class="btn btn-success">Edit</a>
                                        <a href="delete?delemployee_id=<?php echo $d->emp_id;?>" class="btn btn-danger">Delete</button>

                                      </td>
                                    </tr>
                                   <?php
                                    }
                                }
                                    else{
                                        ?>
                                       <tr>
                                        <td>DATA NOT FOUND</td>
                                       </tr>
                                   <?php    
                                    }
                                    
                                    ?>    
                                        
                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
          @endsection