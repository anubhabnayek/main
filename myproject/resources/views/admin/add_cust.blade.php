@extends('website.layout.structure')

@section('main_container')
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Customer</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Add Customer
                        </div>
                        <div class="panel-body">
                            <form role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password">
                                        </div>
                                        <div class="form-group">
                                        <label>Gender:</label>
                                        <label class="radio-inline"> <input type="radio"  name="gender">Female</label>
                                        <label class="radio-inline"><input type="radio" name="gender">Male</label>
                                        <label class="radio-inline"><input type="radio" name="gender">Others</label></div>

                                <div class="form-group">
                                            <label>Category image</label>
                                            <input class="form-control" type="file" name="">
                                        </div>
                                            
                                  
                                 
                                        <button type="submit" name="submit" class="btn btn-info">Submit </button>

                                    </form>
                            </div>
                        </div>
                            </div>
</div>
@endsection