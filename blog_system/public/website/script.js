
function validate() {
    var name = document.forms["myform"]["name"].value;
    if (name == "" || name == null) {
        alert('Please fill out the Name');
        return false;
    }

    var email = document.forms["myform"]["email"].value;
    if (email == "" || email == null) {
        alert('Please fill out the email');
        return false;
    }

    var mail = /^[a-zA-Z0-9_]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
    if (!mail.test(email)) {
        alert('Please fill in a proper email id');
        return false;
    }

    var date_of_birth = document.forms["myform"]["date_of_birth"].value;
    if (date_of_birth == "" || date_of_birth == null) {
        alert('Please fill out the Date of Birth');
        return false;
    }
    var phone = document.forms["myform"]["phone"].value;
    if (phone == "" || phone == null) {
        alert('Please fill out the phone number');
        return false;
    }
    var unm = document.forms["myform"]["unm"].value;
    if (unm == "" || unm == null) {
        alert('Please fill out the username');
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

