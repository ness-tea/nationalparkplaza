<?php 
    
// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user input from login.php
$email = $_POST['email'];
$pass = md5($_POST['pass']);

try
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query we are using to check if the user exists in database
    $query = "SELECT COUNT(email) FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));

    // Check if there is the user's entry in the table - meaning that user does exist
    if ($stmt->fetchColumn() == 1)
    {
        echo "Log in successful";
        // // Setting the session to the returned user ID.
        // $_SESSION['user_id'] = $rows[0]['ID'];
        
        // // Redirect to table of users.
        // header("Location: https://{$_SERVER['HTTP_HOST']}/index.php");
    } else {
        echo "Login not successful";
        // header("Location: https://{$_SERVER['HTTP_HOST']}/registration.php");
    }


?>