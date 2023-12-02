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
                    <h1 class="page-header">Manage Category</h1>
                </div>
                 <!-- end  page header -->
                  <div class="row">
                <div class="col-lg-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            manage category
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Songs Name</th>
                                            <th>Songs Image</th>
											<th>Songs</th>
											<th>song Category</th>
											
                                            <th colspan="3" align="center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @if(!empty($data_song))
                                            @foreach($data_song as $d)
                                                
                                                <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->songs_name}}</td>
												<td><img src="{{url('admin/upload/song_img/'.$d->file)}}" width="50" height="50"></td>
                                                 <td>
													<audio controls>
														<source src="{{url('admin/upload/song/'.$d->song)}}" type="audio/mpeg">
														Your browser does not support the audio element.
													</audio>
                                                 </td>
												
												<td>{{$d->category_name}}</td>
                                                <td>
                                                <a href="{{url('/edit_song/'.$d->id)}}" class="btn btn-success">Edit</a>
                                                <a href="{{url('/manage_song/'.$d->id)}}" class="btn btn-danger">Delete</a>
    
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