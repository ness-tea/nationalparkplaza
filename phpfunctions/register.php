<?php

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user input from registration.php
$fullname = $_POST['fullname'];
$birthdate = $_POST['birthday'];
$email = $_POST['email'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);  // hash password for security

try {
    // Connect to the SQL databse using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to check if there are any existing users with the same email first
    $query = "SELECT COUNT(email) FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));
    
    // Check if the query returned no existing users - then we can add the account to the database
    if ($stmt->fetchColumn() == 0)
    {
        // Reassign Query to insert user's input into Users table for registration
        $query = "INSERT INTO Users (fullname, birthdate, email, pass) 
                VALUES (:fullname, :birthdate, :email, :pass)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(':fullname'=> $fullname, ':birthdate'=> $birthdate, ':email'=> $email, ':pass'=> $pass));
    
        echo "User added successfully";
    }
    else
    {
        echo "User already exists";
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>