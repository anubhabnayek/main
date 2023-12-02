@extends('admin.layout.structure')

@section('main_container')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit Employee</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                        <div class="panel-heading">
                        Edit Employee
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" method="post" enctype="multipart/from-data">
                                        <div class="form-group">
                                            <label>Emp_name</label>
                                            <input class="form-control" type="text" name="Emp_name" value="<?php echo $fetch->Emp_name;?>">
                                        </div>
                                            <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email" value="<?php echo $fetch->email;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password" value="<?php echo $fetch->password;?>">
                                        </div>
                                            
                                  
                                 
                                        <button type="submit" name="submit" class="btn btn-info">Save</button>

                                    </form>
                            </div>
                        </div>
                            </div>
                             </div>
@endsection