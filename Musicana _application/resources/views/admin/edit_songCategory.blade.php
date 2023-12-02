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
    <link href="{{url('admin/assets/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/plugins/pace/pace-theme-big-counter.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/css/main-style.css')}}" rel="stylesheet" />
</head>
<body>
<div class="col-lg-12">
    <h1 class="page-header">Edit song Categories</h1>
        </div>
           <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit song Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{url('/update_songCategory/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group">
                                            <label>Song Category Name</label>
                                            <input type="text" class="form-control" name="category_name" value="{{$data->category_name}}">
											@error('category_name')
					                       <div class="alert alert-danger">{{$message}}</div>
				                          @enderror
                                             </div>
                                        <div class="form-group">
                                            <label>Song Category Image</label>
                                            <input type="file" class="form-control" name="category_image">
											<img src="{{url('admin/upload/songcategory/'.$data->category_image)}}" height="50px" width="50px">
											@error('category_image')
					                       <div class="alert alert-danger">{{$message}}</div>
				                           @enderror
                                         </div>
                                       
                                        
                                       
                                        
                                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                   
                                    </form>
                                </div>
                                @endsection
