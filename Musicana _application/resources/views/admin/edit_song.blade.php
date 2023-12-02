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
    <h1 class="page-header">Edit songs</h1>
        </div>
           <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit songs
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{url('/update_song/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                       @csrf
										<div class="form-group">
                                            <label>Songs Name</label>
                                            <input type="text" class="form-control" name="songs_name" value="{{$data->songs_name}}">

											 @error('songs_name')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                             </div>
                                         <div class="form-group">
                                            <label>Songs Image</label>
											 <input type="file" class="form-control" name="file">
											<img src="{{url('admin/upload/song_img/'.$data->file)}}" alt="{{$data->file}}" width="70px" height="70px" />
                                           

                                           
											 @error('file')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Songs</label>
											<input type="file" class="form-control" name="song" >
                                             <audio controls>
                                                <source src="{{url('admin/upload/song/'.$data->song)}}" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
											

											 @error('song')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
										<div class="form-group">
                                            <label>song Category</label>
                                            <select class="form-control" name="song_category" id="song_category">
											<option value="">--select--</option>
											 @if(!empty($songcategorie))
													 @foreach($songcategorie as $c)
												 <option value="{{$c->id}}"@if ($data->scat_id == $c->id) selected @endif>{{$c->category_name}}</option>
												 @endforeach
												 @endif

											</select>
											 @error('song_category')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                             @enderror
                                        </div>
                                       <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                       
                                    </form>
                                </div>
                                @endsection
