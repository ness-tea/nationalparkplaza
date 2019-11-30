<?php 

// Need to track whether there is an active session or not
session_start();

// function to get the current page name
function PageName() {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
  
$current_page = PageName();

?>

<!-- Menu/nav bar and webpage title 
    - php script embedded in each menu link to set active page for highlight sigfnifier
    - php script embedded in Login/Logout link to check whether there is an active session or not  -->
<body>
    <div class="header">
        <ul>
            <div class="header-left">
                <li><a class="<?php echo $current_page == 'index.php' ? 'active':NULL ?>" href="index.php">Search</a></li>
                <li><a class="<?php echo $current_page == 'review.php' ? 'active':NULL ?>" href="<?php echo $_SESSION['loggedin'] == true ? 'review.php':'login.php' ?>">Write Review</a></li>
                <li><a class="<?php echo $current_page == 'submit.php' ? 'active':NULL ?>" href="<?php echo $_SESSION['loggedin'] == true ? 'submit.php':'login.php' ?>">Submit Park</a></li>
            </div>
            <div class="header-right">
                <li><a class="<?php echo $current_page == 'login.php' ? 'active':NULL ?>" 
                       href="<?php echo $_SESSION['loggedin'] == true ? 'logout.php':'login.php' ?>">
                       <?php echo $_SESSION['loggedin'] == true ? 'Logout':'Login' ?>
                    </a></li>
                <?php echo $_SESSION['loggedin'] == true ? :NULL:<li><a class="<?php echo $current_page == 'registration.php' ? 'active':NULL ?>" href="registration.php">Register</a></li> ?>
            </div>
        </ul>

        <h1 class="title">NATIONAL PARK PLAZA</h1> 
    </div>

    <hr class="divider">

