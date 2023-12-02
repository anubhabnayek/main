

   @extends('admin.layout.structure')

@section('main_container')
    
   
<script>
	$(document).ready(function() 
	{
		$('#table').DataTable();
	} );
</script>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Category</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Category image</th>

                                           
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(!empty($data_category)){
                                            foreach($data_category as $d){
                                                ?>
                                                <tr>
                                                <td><?php echo $d->id?></td>
                                                <td><?php echo $d->category_name?></td>
                                                <td><img src="../upload/category/<?php echo $d->category_img;?>"width="50" height="50"></td>
                                                <td>
                                                <a href="editcate?editcategory_id=<?php echo $d->id?>" type="button" class="btn btn-success">Edit</a>
                                                <a href="delete?delcategory_id=<?php echo $d->id?>" type="button" class="btn btn-danger">Delete</a>
    
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
                    
                     <!-- End  Kitchen Sink -->
@endsection