@extends('employee.layout.structure')

@section('main_container')
@include('sweetalert::alert') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Forms Page</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add employee
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3></h3>
                                    <form  action="{{url('/form')}}" method="post" enctype="multipart/form-data">
                                    @csrf   
                                    <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required/>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="PLease Enter email" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Date-Of-Birth</label>
                                            <input type="date" class="form-control" name="date_of_birth" placeholder="" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="number" class="form-control" name="phone" placeholder="Enter your phone number"required/>
                                           
                                        </div>


                                        <div class="form-group">
                                            <label>password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter your password"/>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender"  value="male" checked />Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender"  value="female"/>Female
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender"  value="others"/>Others
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
										  <label for="language">Language:</label>
                                                   Bengali<input type="checkbox" name="lag[]" value="bengali">
												   English<input type="checkbox" name="lag[]" value="English">
												   Hindi<input type="checkbox" name="lag[]" value="Hindi"><br><br>

                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" class="form-control" name="department" placeholder="Enter your department"/>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Salary</label>
                                            <input type="text" class="form-control" name="salary" placeholder=""/>
                                           
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>File</label>
                                            <input type="file"  class="form-control" name="file"/>
                                        </div>

                                       
                                        
                                       
                                      
                                        
                                       
                                        <button type="submit" name="submit" class="btn btn-success">Submit Button</button>
                                        <button type="reset" class="btn btn-primary">Reset Button</button>

                                    </form>
                                   
                             
                                   
                                    
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
   @endsection
   
</body>
</html>
