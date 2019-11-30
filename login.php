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
    <!-- This is the header, which style defined in the css -->
    <div class="header">
        <ul>
            <div class="header-left">
                <li><a href="index.php">Search</a></li>
                <li><a href="review.php">Write Review</a></li>
                <li><a href="submit.php">Submit Park</a></li>
            </div>
            <div class="header-right">
                <li><a class="active" href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
            </div>
        </ul>
        <h1 class="title">NATIONAL PARK PLAZA</h1>
    </div>

    <hr class="divider">

    <!-- Wrapper for registration page content -->
    <div class="wrap-login">
        <!-- Applying indent css styling -->
        <div id="indent"></div>

        <!-- Registration page content -->
        <div class="login-content">
            <h1>Log into an Account</h1>
            Log in and explore National Parks in your area today!
            
            <!-- Form tag for submitting user name, birth date, email and account password, as well as the submit/reset buttons -->
            <div class="login-form"  >

                <!-- Call validateRegistration on submit input -->
                <form name="phpfunctions/register.php" onsubmit="return validateRegistration()" method="post">
                    <br>
                    <p>Email:</p>
                    <input required type="email" name="email">

                    <br>
                    <p>Account password:</p>
                    <input required type="password" name="pass">
                    
                    <br>
                    <br>
                    
                    <input type="submit" value="Log In">
                    <input type="reset" value="Reset">

                    <br>
                    <p style="font-size: 1em">Don't have an account? <a href="registration.php"><b>Register now</b></a></p>
                </form>
            </div>
        </div>
        <br/><br/><br/>
    </div>

    <!-- Footer layout for Contact Information -->
    <div class="footer">
        <footer>
            <h1 class="footer-title"><b>Contact Information</b></h1>
            <p>
                Jiuwei Wang <a href="mailto:wangj160@mcmaster.ca">wangj160@mcmaster.ca</a>,
                Vanessa Truong <a href="mailto:truonv1@mcmaster.ca">truonv1@mcmaster.ca</a>
            </p>
        </footer>
    </div>
</body>

</html>