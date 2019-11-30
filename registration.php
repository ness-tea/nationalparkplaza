<!doctype html>
<html>

<?php 
    include('header.php');
    include('menu.php'); 
?>

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
                <form action="phpfunctions/users.php" name="register" onsubmit="return validateRegistration()" method="post">

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

                    <input type="submit" name="btnRegister" value="Submit">
                    <input type="reset" value="Reset">
                    <br>
                    <p style="font-size: 1em">Already a user? <a href="login.php"><b>Log In</b></a></p>
                </form>
            </div>
        </div>
        <br/><br/><br/>
    </div>

<?php include('footer.php'); ?>
