<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Form </title>
    <link rel="stylesheet" href="{{url('website/style.css')}}">
</head>

<body>
@include('sweetalert::alert')
    <section class="container">

        <h2> Login Form </h2>
        <form action="{{url('/login_auth')}}" method="post" >
        @csrf
            <label for="userId"><span>Username</span></label>
            <input type="text" name="unm" id="userId">

            <label for="password"><span> Password </span></label>

            <input type="password" name="password" id="password">

            <button type="submit" name="submit">Login</button>
        </form>

        <p class="newUser">
           Not a member?<a href="signup" >Signup now</a>
        </p ></section>

</body>
</html