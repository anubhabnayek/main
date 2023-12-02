

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
                        <h1 class="page-head-line">Customer</h1>
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
                                            <th>id</th>
											<th>Image</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Language</th>
                                            <th>Email</th>
											<!--<th>phone</th>-->
											<th>country</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @if(!empty($data_customer))
                                            @foreach($data_customer as $d)
                                           
                                            <td>{{ $d->id}}</td>
											<td><img src="{{url('/upload/customer/'.$d->file)}}" width="50" height="50"</td>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->gender}}</td>
                                            <td>{{$d->lag}}</td>
                                            <td>{{$d->email}}</td>
											<!--<td>{{ $d->phone}}</td> -->
								             <td>{{ $d->cnm}}</td>

											


                                            <td>
                                            <a href="" class="btn btn-success">EDit</a>

                                            <a href="{{url('/manage_cust/'.$d->id)}}" class="btn btn-danger">Delete</a>
											<a href="{{url('/status/'.$d->id)}}" class="btn btn-primary">{{$d->status}}</a>
                                          </td>
                                        </tr>
                                     @endforeach
                                        @else
                                            
                                         ?>
                                         <tr>
                                            <td>DATA NOT FOUND</td>
                                        </tr>
                                        @endif
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
            @endsection