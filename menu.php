<?php 

// Need to track whether there is an active session or not
session_start();

// function to get the current page name
function PageName() {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
  
$current_page = PageName();

?>

<!-- Menu/nav bar and webpage title -->
<body>
    <div class="header">
        <ul>
            <div class="header-left">
                <li><a class="<?php echo $current_page == 'index.php' ? 'active':NULL ?>" href="index.php">Search</a></li>
                <li><a class="<?php echo $current_page == 'review.php' ? 'active':NULL ?>" href="review.php">Write Review</a></li>
                <li><a class="<?php echo $current_page == 'submit.php' ? 'active':NULL ?>" href="submit.php">Submit Park</a></li>
            </div>
            <div class="header-right">
                <li><a class="<?php echo $current_page == 'login.php' ? 'active':NULL ?>" href="login.php"><?php echo $_SESSION['loggedin'] == 'Logout' ? true:'Login' ?></a></li>
                <li><a class="<?php echo $current_page == 'registration.php' ? 'active':NULL ?>" href="registration.php">Register</a></li>
            </div>
        </ul>

        <h1 class="title">NATIONAL PARK PLAZA</h1> 
    </div>

    <hr class="divider">

