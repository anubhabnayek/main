@extends('admin.layout.structure')

@section('main_container')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Category</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                        </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Add Category
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category name</label>
                                            <input class="form-control" type="text" name="category_name">
                                        </div>
                                 <div class="form-group">
                                            <label>Category image</label>
                                            <input class="form-control" type="file" name="category_img">
                                        </div>
                                            
                                  
                                 
                                        <button type="submit" name="submit" class="btn btn-info">Submit </button>

                                    </form>
                            </div>
                        </div>
                            </div>
</div>
@endsection