

<style>
.btn.custom-btn {
    background-color:  green; /* Set your desired background color */
    color: #FFFFFF; /* Set your desired text color */
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{url('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <div class="col-md-12">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
@include('sweetalert::alert')
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-cent">
            <h2 style="color:blue;text-align:center;"> Login From </h2>            
        </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form action="{{url('/alogin_auth')}}" method="post">
                              @csrf
                                    <h5>Enter Details to Login</h5>
                                       <br/>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="username"  class="form-control" placeholder="Your Username " />
                                            @error('username')
                                            <p class="text-danger">{{ $message }}</p>
                                           @enderror

                                        </div>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password"  class="form-control"  placeholder="Your Password"/>
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                           @enderror

                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pul
                                            l-right">
                                                   <a href="index" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                       <button type="submit" name="submit"  class="btn custom-btn form-control mt-4 mb-3">
                                            Sign in
                                        </button>
                                    <hr />
                                    Not register ? <a href="" >click here </a> or go to <a href="index">Home</a> 
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>

