<?php

extract($_POST);
include("databaseAccess.php");  

$email = $_POST['email'];
$password = $_POST['pass'];

if(isset($submit))
{
    $query = mysqli_query($conn, "SELECT * FROM Users WHERE email = '$email' AND password = '$password'");
    if(mysqli_num_rows($query)<1)
    {
        $found='N';
    }
    else
    {
        $_SESSION["login"]=$email;
    }
}
if(isset($_SESSION["login"]))
{
    echo "Login Successful!";
    exit;
}
 

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>National Park Plaza</title>

    <!-- Linking google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Forum|Julius+Sans+One|Lateef|Open+Sans&display=swap" rel="stylesheet">

    <!-- Linking the css stylesheet to style html elements -->
    <link href="css/main.css" type="text/css" rel="stylesheet">

    <!-- Linking favicon png -->
    <link rel="icon" href="assets/header-ico.png">

    <script src="scripts/js/validation.js"></script>
</head>

<body>
    <div class="wrap-login">
        <!-- Applying indent css styling -->
        <div id="indent"></div>

        <!-- Registration page content -->
        <div class="login-content">
            <h1>Log into an Account</h1>
            Log in and explore National Parks in your area today!
            <br>
            <br>
            <!-- Form tag for submitting user name, birth date, email and account password, as well as the submit/reset buttons -->
            <div class="login-form"  >

                <!-- Call validateRegistration on submit input -->
                <form name="register" onsubmit="return validateRegistration()" method="post">
                    <br>
                    <p>Email:</p>
                    <input required type="email" name="email">

                    <br>
                    <p>Account password:</p>
                    <input required type="password" name="pass">
                    <br>
                    <br>
                    <input type="submit" value="LogIn">
                    <input type="reset" value="Reset">

                </form>
            </div>
        </div>
        <br/><br/><br/>
    </div>

<?php
		  if(isset($found))
		  {
		  	echo '<p>Invalid user id or password<br><a href="loginP.php">Please try again</p>';
		  }
		  ?>

</body>

</html>