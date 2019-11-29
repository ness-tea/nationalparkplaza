// ------ Functions for Park Submission page -------

// Handles form validation for the park submission page
function validateSubmission() {
    // Get values of each input  
    var name = document.forms["submitPark"]["sname"];
    var desc = document.forms["submitPark"]["sdescription"];
    var latitude = document.forms["submitPark"]["latitude"];
    var longitude = document.forms["submitPark"]["longitude"];

    // Check each element for validation - if null, output a warning message.
    if (name.value == "") {
        window.alert("Please enter a valid park name.");
        name.focus();
        return false;
    }

    if (longitude.value == "") {
        window.alert("Please enter the park's coordinates.");
        longitude.focus();
        return false;
    }

    if (latitude.value == "") {
        window.alert("Please enter the park's coordinates.");
        latitude.focus();
        return false;
    }

    return true;
}

// Handles form validation for user registration page
function validateRegistration() {
    // Store form values in variables
    var name = document.forms["register"]["fullname"];
    var birth = document.forms["register"]["birthday"];
    var email = document.forms["register"]["email"];
    var pass = document.forms["register"]["pass"];

    // Check user inputs for validation - if null, output a warning message
    if (name.value == "") {
        window.alert("Name field can not be blank.");
        name.focus();
        return false;
    }

    if (/\d/.test(name.value) || name.value.match(/[(@!#\$%\^\&*]/))
    {
        window.alert("Your name shouldn't contain any special characters or digits!");
        name.focus();
        return false;
    }

    if (birth.value == "") {
        window.alert("Please enter in your birth date.");
        birth.focus();
        return false;
    }

    if (email.value == "") {
        window.alert("Please enter a valid email.");
        email.focus();
        return false;
    } else if(checkEmail(email.value) == false){
        window.alert("Please ensure that your email follows the following format: *@*.* ");
        return false;
    }

    // Check that the password meets the minimum length requirement (8 characters) 
    if (pass.value.length < 8) {
        window.alert("Your password needs to be at least 8 characters and satisfy the following rules: \n\n - Consists of letters a-z (case sensitive) \n - Has at least 1 digit (0-9) \n - Has at least 1 special character (!@#$%^&*)");
        pass.focus();
        return false;
    }

    // Check that the string has at least 1 digit
    if (!pass.value.match(/[_\W0-9]/))
    {
        window.alert("Your password needs to contain at least 1 digit!");
        pass.focus();
        return false;
    }

    // Check that the password has at least 1 special character.
    if (!pass.value.match(/[(@!#\$%\^\&*]/))
    {
        window.alert("Your password needs to contain at least 1 special character!!");
        pass.focus();
        return false;
    }

    return true;
}
function checkEmail(value){
　　 var myReg=/^[a-zA-Z0-9_-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org|ca)$/;
 
　　 if(myReg.test(value)){
        return true;
　　 }else{
        return false;
    }
}
// Updates coordinates on the park submission page if user decides to specify their location
function showPosition(position) {
    // Grab longitude and latitude values based on their ID's and update accordingly
    document.getElementById("latitude").value = position.coords.latitude;
    document.getElementById("longitude").value = position.coords.longitude;
}

function getUserLocation() {
    // Check if geolocation API is available - if so, then get user's position and update coordinate values
    if (navigator.geolocation) {
        // showPosition callback function to handle updating of coordinates
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        // Alert message to notify user that Geolocation API is not available
        window.alert("Geolocation is not available in this browser.")
    }
}







