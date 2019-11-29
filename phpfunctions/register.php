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
$pass = md5($_POST['pass']);  // hash password for security

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare SQL and bind parameters for preventing malicious attacks/injections
    
    if (!$stmt = $conn->prepare("INSERT INTO Users (fullname, birthdate, email, pw) 
                            VALUES (:fullname, :birthdate, :email, :pass)"))  
                            {
                                echo "Prepare failed";
                            }
    $stmt->execute(array(':fullname'=> $fullname, ':birthdate'=> $birthdate, ':email'=> $email, ':pass'=> $pass));
    
    echo "User added successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>