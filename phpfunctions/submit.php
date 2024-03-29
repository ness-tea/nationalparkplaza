<?php

session_start();

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user input from submitpark.php

// Reformat parkname input to only contain relevant keywords
$pname = str_ireplace("park", "", $_POST['parkname']);    // Remove any instances of park
$pname = str_ireplace("national", "", $pname);      // Remove any instances of national
$pname = trim(ucwords(strtolower($pname)));  // Trim leading/following white spaces, convert string to lowercase, then capitlize first letter of every word.
$pname = str_ireplace("  ", " ", $pname);   // remove any cases of double white space

$desc = $_POST['desc'];
$activ = $_POST['activities'];
$disc = $_POST['discover'];
$mgmt = $_POST['parkmgmt']; 
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

// Store user input from submitreview.php
$rating = $_POST['rating'];
$review = $_POST['review'];

$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$search_rating = substr($url,-1);

// If submitting a review from object page, autofill the title for user
$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$parkpage = substr($url,-1);

try {
    // Connect to the SQL databse using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to check if there are any parks in the database matching the user's input
    $query = "SELECT * FROM Parks WHERE parkname LIKE CONCAT('%',?,'%')";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($pname));

    // User is doing a Park submission
    if (isset($_POST['submitpark']))
    {   
        // Check if the park doesn't already exist in the database
        if ($stmt->fetchColumn() == 0)
        {
            // Park doesn't exist - add the user's park to the database
            $query = "INSERT INTO Parks (parkname, dsc, activities, discover, parkmgmt, longitude, latitude) 
                    VALUES (:parkname, :dsc, :activ, :disc, :mgmt, :longitude, :latitude)";
            $stmt = $conn->prepare($query);
            $stmt->execute(array(':parkname'=> $pname, ':dsc'=> $desc, ':activ'=> $activ, ':disc'=> $disc, ':mgmt'=> $mgmt, ':longitude'=> $longitude, ':latitude'=> $latitude));

            echo "Park added successfully";

            // Redirect to page for this park page.
            header("Location: https://{$_SERVER['HTTP_HOST']}/search.php");
        }
        else
        {
            echo "Park already exists in database";

            // Redirect to registration page.
            header("Location: https://{$_SERVER['HTTP_HOST']}/submitpark.php");
        }
    }

    // User is doing a Review Submission
    else if (isset($_POST['submitreview']))
    {
        // Check if the park exists in the database.
        if ($stmt->fetchColumn() != 0)
        {
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // The park exists. We can add the user's review to the database.
            $query = "INSERT INTO Reviews (email, parkname, rating, review)
                    VALUES (:email, :parkname, :rating, :review)";   
            $stmt = $conn->prepare($query);
            $stmt->execute(array(':email'=> $_SESSION['email'], ':parkname'=> $pname, ':rating'=> $rating, ':review'=> $review));
            
            echo "Park review submitted successfully";

            
            // Redirect to page for this park page.
            if (strpos($_SERVER['REQUEST_URI'], 'parkid') != false)
            {
                header("Location:javascript://history.go(-1)");    
            }
            else
            {
                header("Location: https://{$_SERVER['HTTP_HOST']}/search.php");
            }
        }
        else
        {
            echo "Park does not exist";
        }
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>