<?php

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare SQL and bind parameters for preventing malicious attacks/injections
    $stmt = $conn->prepare("INSERT INTO Users (fullname, birthdate, email, pass) 
                            VALUES (:fullname, :birthdate, :email, :pass)");  
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':birthdate', $birthdate);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);

    // Insert user input from registration.php
    $fullname = $_POST['fullname'];
    $birthdate = $_POST['birthday'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);  // hash password for security
    
    if (!$stmt -> exec())
    {
        echo "Something in exec() failed";
    }
    
    echo "User added successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>