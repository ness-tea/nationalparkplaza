<?php
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

try {
    // Using PDO to connect to our remote AWS RDS instance (database)
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    
    // SQL Create User table
    $sql1 = "CREATE TABLE Users (
        user_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(50) NOT NULL,
        birthdate VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(30) NOT NULL,
        reg_date TIMESTAMP
        )";   
    $conn->exec($sql1);

    echo "Users Table created successfully";

    // SQL Create Park table
    $sql2 = "CREATE TABLE Parks (
        park_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        parkname VARCHAR(100) NOT NULL,
        description VARCHAR(500) NOT NULL,
        longitude VARCHAR(50) NOT NULL,
        latitude VARCHAR(50) NOT NULL,
        sub_date TIMESTAMP
        )";
     $conn->exec($sql2);

     echo "Park Table created successfully";

     // SQL Create Review table;
     $sql3 = "CREATE TABLE Reviews (
        reviews_id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        parkname VARCHAR(100) NOT NULL,
        rating VARCHAR(30) NOT NULL,
        review VARCHAR(300),
        rev_date TIMESTAMP
        )";
    $conn->exec($sql3);

    echo "Review Table created successfully";
    }
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>