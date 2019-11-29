<?php
extract($_POST);
include("databaseAccess.php");  


$parkname = $_POST['sname'];
$description = $_POST['sdescription'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];


$sql = "INSERT INTO Parks (parkname, description, longitude, latitude)
VALUES ('$parkname', '$description', '$longitude', '$latitude')
WHERE NOT EXISTS (SELECT parkname FROM Parks WHERE parkname = '$parkname') LIMIT 1";

if (mysqli_query($conn, $sql)) {
    echo "Insert new data into Table Parks";
} else {
    echo "Insertion Table Parks Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
