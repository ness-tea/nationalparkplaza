<?php

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user input from submit.php (Park submission)
$pname = $_POST['parkname'];
$desc = $_POST['desc'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

try {
    // Connect to the SQL databse using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO Parks (parkname, dsc, longitude, latitude) 
            VALUES (:parkname, :dsc, :longitude, :latitude)";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(':parkname'=> $pname, ':dsc'=> $desc, ':longitude'=> $longitude, ':latitude'=> $latitude));

    echo "Review added successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>