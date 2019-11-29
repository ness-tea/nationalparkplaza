<?php

include("databaseAccess.php");  


// use sql creat table
$sql = "CREATE TABLE Parks (
park_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
parkname VARCHAR(100) NOT NULL,
description VARCHAR(500) NOT NULL,
longitude VARCHAR(50) NOT NULL,
latitude VARCHAR(50) NOT NULL,
sub_date TIMESTAMP
)";
 
if (mysqli_query($conn, $sql)) {
    echo "Database Table Parks created successful";
} else {
    echo "Database Table Parks failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>