<?php

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Get park_id from URL
$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$parkid = $_GET['parkid']; 

try {
    // Connect to the SQL databse using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query Parks table for parkid = $parkid
    $query = "SELECT * FROM Parks WHERE park_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($parkid));

    $park = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>