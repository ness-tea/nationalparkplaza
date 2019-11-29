<?php

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user entries from registration.php
$fullname = mysql_real_escape_string($_POST['fullname']);
$birthdate = mysql_real_escape_string($_POST['birthday']);
$email = mysql_real_escape_string($_POST['email']);
$pass = md5(mysql_real_escape_string($_POST['pass']));  // hash password for security

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "INSERT INTO Users (fullname, birthdate, email, password) VALUES ('Vanessa', '01/08/1997', 'vanessatruong@gmail.com', 'Hello123!')";  

    $conn->exec($query);
    
    echo "User added successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>