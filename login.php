<!doctype html>
<html>

<?php
    include('header.php');
    include('menu.php');
?>

    <!-- Wrapper for registration page content -->
    <div class="wrap-login">
        <!-- Applying indent css styling -->
        <div id="indent"></div>

        <!-- Registration page content -->
        <div class="login-content">
            <h1>Log into an Account</h1>
            <br/>
            You must be logged in to write a review or submit a park. 
            <br/>
            Log in to explore National Parks in your area today!
            
            <!-- Form tag for submitting user name, birth date, email and account password, as well as the submit/reset buttons -->
            <div class="login-form"  >

                <!-- Call validateRegistration on submit input -->
                <form action="phpfunctions/users.php" name="signin" method="post">
                    <br>
                    <p>Email:</p>
                    <input required type="email" id="email" name="email">

                    <br>
                    <p>Account password:</p>
                    <input required type="password" id="pass" name="pass">
                    
                    <br>
                    <br>
                    
                    <input type="submit" name="btnLogin" value="Log In">
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