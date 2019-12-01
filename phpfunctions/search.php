<?php

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user input if searched by name
$search_name = $_POST['name'];

// Store user input if searched by rating
// Because we are using submit onclick for rating search, store the URL as a string first and
// extract last char for the rating
$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$search_rating = substr($url,-1);

try {
    // Connect to the SQL databse using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['rating']))
    {
        echo "Searching by rating.";
    }
    else if (isset($_POST['name']))
    {
        echo "Searching by name.";
    }

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>