<!DOCTYPE hmtl>


<?php
    session_start();

    include('header.php');
    include('menu.php');
?>

<!-- Wrapper for registration page content -->
<div class="wrap-profile">
    <!-- Applying indentations from css styling -->
    <div id="indent"></div>

    <!-- Registration page content -->
    <div class="profile-content">
        <h1>Your Profile</h1>
        <br/>
        <h3>Name:</h3>
        <p><?php echo $_SESSION['fullname']; ?></p>
        <br/>
        <h3>Email:</h3>
        <p><?php echo $_SESSION['email']; ?></p>
        <br/>
        <h3>Birth Date:</h3>
        <p>Place Holder Birth Date here.</p>
        
        <!-- (TODO) Display Reviews by current user -->
        <h2>Your Reviews</h2>
        <br/>
        <br/>
        <br/>
        <br/>
        <h2>Your Parks</h2>
        <br/>
        <br/>
        <br/>
        <br/>
        <a class="margin-right: 5%" href="registration.php"><b>Write another review</b></a>
        <a href="submit.php"><b>Submit a park</b></a>
       
    </div>
    <br/><br/><br/>
</div>

<?php
    include('footer.php');
?>