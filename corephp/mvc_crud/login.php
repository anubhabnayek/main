<?php include_once('header.php');?>
	<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
       
           
                          
             <div class="row">

              <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1 ">
			   
                    <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
                   
                    <div class="carousel-inner">
                        <div class="item active">

                            <img src="assets/img/1.jpg" alt="" />
                           
                        </div>
                        <div class="item">
                            <img src="assets/img/2.jpg" alt="" />
                          
                        </div>
                        <div class="item">
                            <img src="assets/img/3.jpg" alt="" />
                           
                        </div>
                    </div>
                    <!--INDICATORS-->
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                    <!--PREVIUS-NEXT BUTTONS-->
                     <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
                </div>
              </div>
			  </div>
                 </hr></br>
				 <div class="row pad-botm">
            <div class="col-md-12">
             <h4 class="text-center" >LOGIN FORM</h4>
               </div>
			   </div>
                 <div class="row">
               
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                     <div class="panel panel-info">
                        <div class="panel-heading">
                            Login Form
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" method="post">
										<div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type="email" name="email" />
                                        </div>
                                 <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password"/>
                                        </div>
                                
                                        </div>
                                        
                                       
                                        <button type="submit" name="submit" class="btn btn-success">Login</button>|<a href="add_data">Not Register Yet</a>
                                      

                                    </form>
                            </div>
                        </div>
                </div>

           

    </div>
  
  
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="website/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="website/assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="website/assets/js/custom.js"></script>
    <?php include_once('footer.php')?>
</body>
</html>
