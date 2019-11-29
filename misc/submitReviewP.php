<?php
extract($_POST);
include("databaseAccess.php");  


$fullname = $_POST['fullname'];
$parkname = $_POST['sname'];
$rating = $_POST['rating'];
$review = $_POST['review'];

$sql = "INSERT INTO Reviews (fullname, parkname, rating, review)
VALUES ('$fullname', '$parkname', '$rating', '$review');

if (mysqli_query($conn, $sql)) {
    echo "Insert new data into Table Reviews";
    
} else {
    echo "Insertion Table Reviews Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
