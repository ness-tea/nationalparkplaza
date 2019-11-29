<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <!-- This is the webside title -->
    <title>National Park Plaza</title>
    <!-- This is the link to the css file -->
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <!--- Google fonts --->
    <link href="https://fonts.googleapis.com/css?family=Forum|Julius+Sans+One|Lateef|Open+Sans&display=swap" rel="stylesheet">
    <!-- This is the icon shows before the url link -->
    <link rel="icon" href="assets/header-ico.png">
    <script type="text/javascript" src="scripts/js/searchPage.js"></script>
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
                <li><a href="login.php">Login</a></li>
                <li><a class="active" href="registration.php">Register</a></li>
            </div>
        </ul>
        <h1 class="title">NATIONAL PARK PLAZA</h1>
    </div>

    <hr class="divider">

    <!-- Wrapper for registration page content -->
    <div class="wrap-register">
        <!-- Applying indent css styling -->
        <div id="indent"></div>

        <!-- Registration page content -->
        <div class="register-content">
            <h1>Register an Account</h1>
            Sign up and explore National Parks in your area today!
            <br>
            <br>
            <!-- Form tag for submitting user name, birth date, email and account password, as well as the submit/reset buttons -->
            <div class="register-form"  >

                <!-- Call validateRegistration on submit input -->
                <form action="phpfunctions/register.php" name="register" onsubmit="return validateRegistration()" method="post">

                    <p>Full Name:</p>
                    <input type="text" placeholder="Enter your name" id="fullname" name="fullname">
                    
                    <br>
                    <p>Birth Date:</p>
                    <input style="font-family: sans-serif;color:gray" type="date" id="birthday" name="birthday">

                    <br>    
                    <p>Email:</p>
                    <input type="email" id="email" name="email">

                    <br>
                    <p>Account password:</p>
                    <input type="password" id="pass" name="pass">
                    
                    <br>
                    <br>

                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                    <br>
                    <p style="font-size: 1em">Already a user? <a href="login.php"><b>Log In</b></a></p>
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
