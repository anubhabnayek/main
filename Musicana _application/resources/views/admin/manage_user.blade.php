@extends('admin.layout.structure')

@section('main_container')
@include('sweetalert::alert')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />



</head>

<body>
 <!--  page header -->
 <div class="col-lg-12">
                    <h1 class="page-header">User Details</h1>
                </div>
                 <!-- end  page header -->
                  <div class="row">
                <div class="col-lg-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       User Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
											<th>Image</th>
                                            <th>Name</th>
							                <th>Username </th> 
							                <th>Phone No</th>
                                            <th>Gender</th>
                                            <th>Language</th>
                                            <th>Email</th>
                                            <th colspan="3" align="center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        @if(!empty($data_user))
                                            @foreach($data_user as $d)
                                               
                                                <tr>
                                                <td>{{$d->id}}</td>
                                                <td><img src="{{url('/upload/user/'.$d->file)}}"width="50px" height="50px"></td>
                                                <td>{{$d->name}}</td>
                                                <td>{{ $d->username}}</td>
                                                <td>{{$d->phone}}</td>
                                                <td>{{$d->gender}}</td>
												<td>{{$d->language}}</td>
												<td>{{$d->email}}</td>

                                             <td>
                                            <a href="" class="btn btn-success">EDit</a>

                                            <a href="{{url('/manage_user/'.$d->id)}}" class="btn btn-danger">Delete</a>
											<a href="{{url('/status/'.$d->id)}}" class="btn btn-primary">{{$d->status}}</a>
                                          </td>                                       
                                            </tr>
                                             @endforeach
                                            @else
                                          
                                         <tr>
                                            <td>Data Not found</td>
                                         </tr>

                                    @endif
                                       
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
              @endsection