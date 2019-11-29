<?php

include("databaseAccess.php");  


// use sql creat table
$sql = "CREATE TABLE Reviews (
reviews_id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(50) NOT NULL,
parkname VARCHAR(100) NOT NULL,
rating VARCHAR(30) NOT NULL,
review VARCHAR(300),
rev_date TIMESTAMP
)";
 
if (mysqli_query($conn, $sql)) {
    echo "Database Table Reviews created successful";
} else {
    echo "Database Table Reviews failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>