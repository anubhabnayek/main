@extends('website.layout.structure')

@section('main_container')
<form action="{{url('/imageupload')}}" method="post" enctype="multipart/form-data">
<h1 class="text-center">PHATO UPLOAD </H1>
        <div class="container">
        <div class="row">
            <div class="container my-25">
                <a href="{{url('/imageview')}}" class="btn btn-primary">view gallery</a>
</div>

</div>
<div class="container col-md-6 my-4">

        <div class="form-groups">
		@csrf
		
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="enter your name">
            </div><br>
			
			@error('name')
            <div class="alert alert-danger">{{$meassage}}</div>
            @enderror

        <div class="form-groups">
                <label>File</label>
                <input type="file" name="file" class="form-control" placeholder="enter your file">
            </div><br>
            <div class="form-groups">
                <label>Description</label>
                <textarea name="description" cols="20" rows="10" class="form-control"></textarea>
				
    </div><br>
	<button type="submit" name="submit" class="btn btn-primary">Save</button>
  </div>


</form>
</body>
</html>
<div>
@endsection
</div>