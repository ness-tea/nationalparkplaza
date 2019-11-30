<?php
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

try {
    // Using PDO to connect to our remote AWS RDS instance (database)
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    
    // SQL Create Users table
    $createUsers = "CREATE TABLE Users (
        user_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(50) NOT NULL,
        birthdate VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        pass VARCHAR(255) NOT NULL
        )";   
    $conn->exec($createUsers);

    echo "Users Table created successfully";

    // SQL Create Park table
    $createParks = "CREATE TABLE Parks (
        park_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        parkname VARCHAR(100) NOT NULL,
        dsc VARCHAR(500) NOT NULL,      
        longitude VARCHAR(50) NOT NULL,
        latitude VARCHAR(50) NOT NULL
        )";
     $conn->exec($createParks);

     echo "Park Table created successfully";

     // SQL Create Review table;
     $createReviews = "CREATE TABLE Reviews (
        reviews_id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        parkname VARCHAR(100) NOT NULL,
        rating VARCHAR(30) NOT NULL,
        review VARCHAR(300)
        )";
    $conn->exec($createReviews);

    echo "Review Table created successfully";
    }
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>