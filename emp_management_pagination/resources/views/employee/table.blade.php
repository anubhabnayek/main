@extends('employee.layout.structure')

@section('main_container') 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Employee Tables</h2>   
                        <h5></h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
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
                                            <th>Phone</th>
                                            <th>Date-Of-Birth</th>
                                            <th>Gender</th>
                                            <th>Language</th>
                                            <th>Department</th>
                                            <th>Salary</th>
                                            <th>File</th>
                                            
                                          </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->email}}</td>
                                            <td>{{$d->phone}}</td>
                                            <td>{{$d->date_of_birth}}</td>
                                           
                                            <td>{{$d->gender}}</td>
                                            <td>{{$d->lag}}</td>
                                            <td>{{$d->department}}</td>
                                            <td>{{$d->salary}}</td>
                                            <td><img src="{{url('upload/employee/'.$d->file)}}" width="50"></td>
                                           
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                                {{$data->links()}}
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
  @endsection
   
</body>
</html>
