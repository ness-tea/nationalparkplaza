<?php

$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

$fullname = $_POST['fullname'];
$birthdate = $_POST['birthday'];
$email = $_POST['email'];
$pass = $_POST['pass'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // // $query = "INSERT INTO Users (fullname, birthdate, email, password) 
    // //           VALUES ('$fullname', '$birthdate', '$email', '$pass') 
    // //           WHERE NOT EXISTS (SELECT email FROM Users WHERE email = '$email') LIMIT 1";  
    
    // $conn->exec($query);
    
    echo "Connection successful";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>