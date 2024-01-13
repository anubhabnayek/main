
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Tra	nsitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
// function getState(sid)
// {
// // 	if(window.XMLHttpRequest)
// // 	{
// // 		xmlhttp= new XMLHttpRequest();	
// // 	}
// // 	else
// // 	{
// // 		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");	
// // 	}
// // 	xmlhttp.onreadystatechange=function()
// // 	{
// // 		if(xmlhttp.readyState==4 && xmlhttp.status==200)
// // 		{
// // 			document.getElementById("sid").innerHTML=xmlhttp.responseText;	
// // 		}
// // 	}
// // xmlhttp.open("GET","statedata?btn=" + cid,true);
// // xmlhttp.send();
// $.ajax
// 	({
// 		type: "POST",
// 		url: "statedata",
// 		data:"btn=" + sid,
// 		success: function(data)
// 		{
// 			$("#sid").html(data) ;
// 		}
// 	});

// }
// // function getCity(sid)
// // {
// // 	$.ajax
// // 	({
// // 		type: "POST",
// // 		url: "citydata",
// // 		data:"btn=" + sid,
// // 		success: function(data)
// // 		{
// // 			$("#city_id").html(data) ;
// // 		}
// // 	});
// // }
</script>
<style>
    .con{
	height: px;
    width: px;
    margin-left:50px ;
    }
  </style>
</head>
<body>
<div class="con">
<form action="" method="post" enctype="multipart/form-data">
<h2 style="color: blue; text-align: center;">
diplay country state data using AJAX </h2>
    	
        
<div class="form-group">
	<label for="country"><span style="color: red">*</span>country:</label>
            
            <select name="c_id" class="form-control">
			<option value="">----Select Country----</option>
            <?php
            	foreach($country_arr as $f)
				{				
			?>
            	<option value="<?php echo $f->c_id;?>">
								<?php echo $f->cnm;?>
			    </option>
            <?php 
				}
			?>

            </select>
			</div>
        
	<!-- <div class="form-group">
            <label for="state"><span style="color: red">*</span>state:</label>
            <select id="sid" name="sid" required class="form-control">
            <option>----Select State----</option>
            </select>
            </div> -->
	    <!-- <div class="form-group">
            <label for="city"><span style="color: red">*</span>city:</label>
            <select id="city_id" name="city_id" required class="form-control">
            	<option>----Select city----</option>
            </select>
            </div> -->

             <button type="submit" name="submit" class="btn btn-primary">submit</button>
			
</div>
</form>

</body>
</html>