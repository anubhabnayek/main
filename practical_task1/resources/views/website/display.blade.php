
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</head>
<body>
@include('sweetalert::alert')
<h2 style="color: blue; text-align: center;">
                   Data display
                </h2>
                <div class="text-right">
                  <a href="/index" class="btn btn-primary">ADD DATA</a>
</div><br>
<table class="table">
  <thead class="thead-light">
   
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">GENDER</th>
		<th scope="col">Language</th>
      <th colspan="3" align="center">Action</th>



      </tr>
    </thead>
  <tbody>
  @foreach($data_user as $d)
      <tr>
        <td>{{$d->id}}</td>
        <td><img src="{{url('upload/user/'.$d->file)}}" width="100px" height="100px"></td>
        <td>{{$d->name}}</td>
        <td>{{$d->email}}</td>
        <td>{{$d->gender}}</td>
        <td>{{$d->language}}</td>
        
		   

        <td>
         <a href="{{url('/edit_data/'.$d->id)}}" class="btn btn-primary">EDIT</a>
         <a href="{{url('/display/'.$d->id)}}" class="btn btn-danger">delete</a>
        </td>




      </tr>
      @endforeach

    </tbody>
   
</table>
</body>
</html>