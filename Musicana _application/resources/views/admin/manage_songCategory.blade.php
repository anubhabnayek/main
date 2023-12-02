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
                    <h1 class="page-header"> Manage songCategory</h1>
                </div>
                 <!-- end  page header -->
                  <div class="row">
                <div class="col-lg-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage songCategory
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                
                                        <tr>
                                        <th>ID</th>
                                        <th>Song Category Name</th>
                                        <th>Song Category Image</th>
                                           
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                         @if(!empty($data_category))
                                            @foreach($data_category as $d)
                                            
                                            <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->category_name}}</td>
                                                <td><img src="{{url('admin/upload/songcategory/'.$d->category_image)}}"width="50px" height="50px"></td>
                                           
                                            <td><button type="button" class="btn btn-primary">Add</button>
                                            <a href="{{url('/edit_songCategory/'.$d->id)}}" class="btn btn-success">Edit</button>
                                            <a href="{{url('/manage_songCategory/'.$d->id)}}"  class="btn btn-danger">Delete</a>

                                          </td>
                                        </tr>
                                          @endforeach
                                         
                                           @else
                                            
                                            <tr>
                                                <td>Data Not Found</td>
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