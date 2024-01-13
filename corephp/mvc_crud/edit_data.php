<?php include_once('header.php');?>
    <div class="content-wrapper">
         <div class="container">
		
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit data</h4>
                
                            </div>

        </div>
             <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Edit Data
                        </div>
                        <div class="panel-body">
                            <form role="form" action=" " method="post" enctype="multipart/form-data">
                                       
										<div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="<?php echo $fetch->name;?>" placeholder="Enter name" />
											
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" value="<?php echo $fetch->email;?>" placeholder="Enter email" />
                                           
                                        </div>
                                           
										
                                            <div class="form-group">
                                            <label>Mobile No</label>
                                            <input type="number" class="form-control" name="phone" value="<?php echo $fetch->phone;?>" placeholder="Enter mobile number">
                                         
										</div>
									     <div class="form-group">
                                            <label>Gender</label>
                                            <input type="radio" name="gender" value="Male" <?php if ($fetch-> gender == "Male"){echo"checked";}?>>Male
											<input type="radio" name="gender" value="Female" <?php if ($fetch-> gender == "Female"){echo"checked";}?>>Female
                                           
										</div>
										<div class="form-group">
                                            <label>Language</label>
											<?php
											$language=explode(',',$fetch->language);
											?>
                                            <input type="checkbox" name="language[]" value="English" <?php if (in_array('English', $language)){echo"checked";}?>>English
											<input type="checkbox" name="language[]" value="Hindi" <?php if (in_array('Hindi',$language)){echo"checked";}?>>Hindi
											<input type="checkbox" name="language[]" value="gujrati" <?php if (in_array('gujrati',$language)){echo"checked";}?>>Gujrati
                                           
										</div>
										<div class="form-group">
                                            <label>Image</label>
											<img src="upload/user/<?php echo $fetch->file;?>" width="50px" height="50px">
                                            <input type="file" name="file" class="form-control" >
										
                                        </div>
                                  </div>
                                 
                                        <button type="submit" name="save" class="btn btn-info">Save</button>

                                    </form>
                            </div>
                        </div>
                            </div>


        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include_once('header.php');?>