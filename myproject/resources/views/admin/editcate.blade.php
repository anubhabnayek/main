@extends('admin.layout.structure')

@section('main_container')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit Category</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                        </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Edit Category
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category name</label>
                                            <input class="form-control" type="text" name="category_name" value="<?php echo $fetch->category_name;?>">
                                        </div>
                                 <div class="form-group">
                                            <label>Category image</label>
                                            <input class="form-control" type="file" value="" name="category_img">
                                            <img src="../upload/category/<?php echo $fetch->category_img;?>"height="150px" weight="150px" alt="">

                                        </div>
                                            
                                  
                                 
                                        <button type="submit" name="submit" class="btn btn-info">Save</button>

                                    </form>
                            </div>
                        </div>
                            </div>
</div>
@endsection