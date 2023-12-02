
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <!-- Core CSS - Include with every page -->
    <link href="{{url('admin/assets/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/plugins/pace/pace-theme-big-counter.css')}}" rel="stylesheet" />
   <link href="{{url('admin/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/css/main-style.css')}}" rel="stylesheet" />

</head>
@include('sweetalert::alert');

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <h1>LOGIN</h2>                
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form  action="{{url('/alogin_auth')}}" method="post" >
                           @csrf
						   <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="username" name="username" id="username" >
                                     @error('username')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror

                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password"  >
                                     @error('password')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror

                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="{{url('admin/assets/plugins/jquery-1.10.2.js')}}"></script>
    <script src="{{url('admin/assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{url('admin/assets/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

</body>

</html>
