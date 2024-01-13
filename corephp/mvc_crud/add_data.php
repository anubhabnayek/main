<?php include_once('header.php');?>

<script>
function validate() {
    var name = document.forms["myform"]["name"].value;
    if (name == "" || name == null) {
        alert('Please fill out the User  Name');
		//document.getElementById("errorDiv").innerText = "Name are required.";
        return false;
    }

    var email = document.forms["myform"]["email"].value;
    if (email == "" || email == null) {
        alert('Please fill out the email');
		//document.getElementById("errorDiv1").innerText = "Email are required.";
        return false;
    }

    var mail = /^[a-zA-Z0-9_]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
    if (!mail.test(email)) {
        alert('Please fill in a proper email id');
        return false;
    }

    var password = document.forms["myform"]["password"].value;
    if (password == "" || password == null) {
        alert('Please fill out the password');
        return false;
    }

    if (!(password.length >= 3 && password.length <= 8)) {
        alert('Please provide a password with a minimum of 3 and a maximum of 8 characters');
        return false;
    }

    var gen_arr = document.getElementsByName("gender");
    if (gen_arr[0].checked == true) {

    } else if (gen_arr[1].checked == true) {

    } else {
        alert('Please Select Gender');
        return false;
    }

    var lan_arr = document.getElementsByName("language[]");
    if (lan_arr[0].checked == true) {

    } else if (lan_arr[1].checked == true) {

    } else if (lan_arr[2].checked == true) {

    } else {
        alert('Please Select at least one language');
        return false;
    }

    var selectElement = document.getElementById("inputstate");
    var selectedValue = selectElement.value;

    if (selectedValue === "") {
        alert("Please select a country.");
        return false;
    }
    
    // Validate the image file
    var fileInput = document.forms["myform"]["file"];
    var allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Allowed image file extensions
    var maxFileSizeInBytes = 5 * 1024 * 1024; // 5MB maximum file size

    if (fileInput.files.length === 0) {
        alert("Please select an image file.");
        return false;
    }

    var fileName = fileInput.files[0].name;
    var fileExtension = fileName.split(".").pop().toLowerCase();

    if (allowedExtensions.indexOf(fileExtension) === -1) {
        alert("Invalid file type. Allowed file types are: " + allowedExtensions.join(", "));
        return false;
    }

    if (fileInput.files[0].size > maxFileSizeInBytes) {
        alert("File size exceeds the maximum allowed size of 5MB.");
        return false;
    }

    // ... (the rest of your form validation code)
}


</script>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add data</h4>
                
                            </div>

        </div>
             <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           BASIC FORM
                        </div>
                        <div class="panel-body">
                            <form name="myform" action="" method="post" enctype="multipart/form-data" onsubmit="return validate()">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="" placeholder="Enter name" />
											
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" value="" placeholder="Enter email" />
                                            
                                        </div>
                                            <div class="form-group">
                                            <label>password</label>
                                            <input type="password" class="form-control" name="password" value="" placeholder="Enter password">
                                        </div>
										
                                            <div class="form-group">
                                            <label>Mobile No</label>
                                            <input type="number" class="form-control" name="phone" value="" placeholder="Enter mobile number">
                                        </div>
									     <div class="form-group">
                                            <label>Gender</label>
                                            <input type="radio" name="gender" value="Male">Male
											<input type="radio" name="gender" value="Female">Female
                                        </div>
										<div class="form-group">
                                            <label>Language</label>
                                            <input type="checkbox" name="language[]" value="English">English
											<input type="checkbox" name="language[]" value="Hindi">Hindi
											<input type="checkbox" name="language[]" value="gujrati">Gujrati
                                        </div>
										<div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="file" id="file" class="form-control" >
											
                                        </div>
                                  
                                 
                                        <button type="submit" name="submit" class="btn btn-info">Submit</button>

                                    </form>
                            </div>
                        </div>
                            </div>


        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
     <?php include_once('footer.php')?>