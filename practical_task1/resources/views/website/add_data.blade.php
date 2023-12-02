@extends('website.layout.structure')

@section('main_container')
@include('sweetalert::alert')


<h1 class="text-center">Add data</H1>

        <div class="container">
		   
		<form action="{{url('/index')}}" method="post" enctype="multipart/form-data">
		  @csrf
         <div class="row">
		 <div class="text-right">
                  <a href="/" class="btn btn-primary">VIEW DATA</a>
           </div><br>
			  <div class="col-lg-2"></div>
                <div class="col-lg-8">
				<div class="col-sm-12">
                <div class="form-group">
				  <label>Name</label>
                  <input class="form-control" name="name" id="name" type="text" placeholder = "Enter your name">
                </div>
				@error('name')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
              </div><br>
             
              
              <div class="col-sm-12">
                <div class="form-group">
				<label>Email</label>
                  <input class="form-control" name="email" id="email" type="email" placeholder ="Enter email address">
                </div>
				@error('email')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
              </div><br>
             
             
			  <div class="col-sm-12">
                <div class="form-group">
				<label>Image</label>
                  <input class="form-control" name="file" id="file" type="file" placeholder = "image">
                </div>
				@error('file')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
              </div><br>
			   <div class="col-12">
				<div class="form-group form-control">
					<label>Gender</label>
					<input type="radio" name="gender" id="gender" value="Male" @if (old('gender') == 'Male') checked @endif>Male
					<input type="radio" name="gender" id="gender2" value="Female" @if (old('gender') == 'Female') checked @endif>Female
				</div>
				@error('gender')
					<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div><br>
			<div class="col-12">
			<div class="form-group form-control">
				<label class="mb-2">Language </label>
				<input type="checkbox" name="language[]" value="Hindi" id="hindi" @if (in_array('Hindi', old('language', []))) checked @endif>
				<label for="hindi">Hindi</label>
				<input type="checkbox" name="language[]" value="English" id="english" @if (in_array('English', old('language', []))) checked @endif>
				<label for="english">English</label>
				<input type="checkbox" name="language[]" value="Gujarati" id="gujarati" @if (in_array('Gujarati', old('language', []))) checked @endif>
				<label for="gujarati">Gujarati</label>
			</div>
			@error('language')
				<div class="alert alert-danger">{{$message}}</div>
			@enderror
		    </div><br>
            </div>
               </div>
            <div class="form-group mt-3 text-center">
              <button type="submit" name="submit" class="btn btn-success">Register</button>
            </div>
          </form>
        </div>
        
          
  @endsection