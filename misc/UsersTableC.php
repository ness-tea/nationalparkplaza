<?php

include("databaseAccess.php");  


// use sql creat table
$sql = "CREATE TABLE Users (
user_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
fullname VARCHAR(50) NOT NULL,
birthdate VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";
 
if (mysqli_query($conn, $sql)) {
    echo "Database Table Users created successful";
} else {
    echo "Database Table Users failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>