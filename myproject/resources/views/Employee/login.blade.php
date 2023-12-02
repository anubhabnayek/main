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
<script>
        function validate() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            // Validate if both fields are empty
            if (email === "" || password === "") {
                document.getElementById("errorDiv1").innerText = "email are required.";
                document.getElementById("errorDiv").innerText = "password are required.";
                return false;
            }
            if(!(password.length >=3  && password.length <= 8))
	{ 
            document.getElementById("errorDiv2").innerText ="Please,provide min 3 & max 8 char in pass.";

		//alert('Please,provide min 3 & max 8 char in pass');
		return false;
	}
	

            // Reset error message
            // document.getElementById("errorDiv").innerText = "";

            // // Continue with your login validation
            // if (username === "email" && password === "password") {
            //     alert("Login successful!");
            //     // Here, you can redirect the user or perform other actions.
            // } else {
            //     alert("Invalid email or password. Please try again.");
            // }
        }
        </script>

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
                        <form role="form" action="" method="post" onsubmit="return validate()">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" id="email" type="email" autofocus>
                                    <div id="errorDiv1" style="color: red;"></div>

                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id="password"  type="password" value="">
                                    <div id="errorDiv" style="color: red;"></div>

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
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
