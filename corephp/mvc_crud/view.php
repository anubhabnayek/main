<?php include_once('header.php');?>
    <div class="content-wrapper">
         <div class="container">
		
        <div class="row pad-botm">
            <div class="col-md-12">
			<div class="text-right">
				<a href="add_data" class="btn btn-primary">Add Data</a>
				 </div>

                <h4 class="header-line">TABLE EXAMPLES</h4>
                
                            </div>
							
        </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Gender</th>
                                            <th>Language</th>
                                            <th>Image</th>
											<th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									   <?php
                                        if(!empty($data_view)){
                                            foreach($data_view as $c)
                                            {

                                          
                                       ?>
                                        <tr>
                                            <td><?php echo $c->id;?></td>
                                            <td><?php echo $c->name;?></td>
                                            <td><?php echo $c->email;?></td>
                                            <td><?php echo $c->phone;?></td>
                                            <td><?php echo $c->gender;?></td>
											<td><?php echo $c->language;?></td>
											<td><img src="upload/user/<?php echo $c->file;?>" height="50" width="50"></td>
											<td>
											<a href="edit?edit_id=<?php echo $c->id?>" class="btn btn-primary">Edit</a>
											<a href="delete?delete_id=<?php echo $c->id?>" class="btn btn-danger">Delete</a>
											</td>
                                        </tr>
                                        <?php
                                            }
                                    } 
                                    else{
									   ?>
										   <tr>
										   <td>data not found</td>
										   </tr>
                                           <?php
                                          }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

                <!-- /. ROW  -->
    </div>
    </div>
    
<?php include_once('footer.php')?>