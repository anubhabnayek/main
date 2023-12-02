@extends('employee.layout.structure')

@section('main_container')
<!DOCTYPE html>
<html>



<body>
<div class="col-lg-12">
                    <h1 class="page-header">Add Category</h1>
                </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" class="form-control" palaceholder="Enter the name" name="category_name">
                                        </div>
                                        <div class="form-group">
                                            <label>Category image</label>
                                            <input type="file" class="form-control" placeholder="Enter text" name="category_img">
                                        </div>
                                       
                                       
                                        <button type="submit" name="submit" class="btn btn-primary">Submit Button</button>
                                        <button type="reset" class="btn btn-success">Reset Button</button>
                                    </form>
                                </div>
@endsection