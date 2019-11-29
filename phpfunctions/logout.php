<?php 
    session_unset();
    header("Location: https://{$_SERVER['HTTP_HOST']}/workshop7/index.php");
?>