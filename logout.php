<?php 
    session_start();
    session_destroy();  
    unset($_SESSION['email']);
    unset($_SESSION['loggedin']);
    header("Location: https://{$_SERVER['HTTP_HOST']}/index.php");
?>