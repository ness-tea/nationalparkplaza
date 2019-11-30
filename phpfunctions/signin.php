<?php 
    
// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user input from login.php
$email = $_POST['email'];
$pass = md5($_POST['pass']); // decode hashed password

try 
{   
    // Connect to the SQL databse using PDO
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query we are using to check if the user exists in database
    $query = "SELECT * FROM Users WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $rowCount = $stmt->rowCount();

    // // Check if there is the user's entry in the table - meaning that user does exist
    if ($rowCount == 0 || $pass == $data['pw'])
    {
        // Usesr does not exist
        echo "Login unsuccessful";
        
        // Redirect to table of users.
        header("Location: https://{$_SERVER['HTTP_HOST']}/login.php");
    } 
    else 
    {
        // User exists
        echo "Login successful";
        $_SESSION['email'] = $data['email'];
        
        header("Location: https://{$_SERVER['HTTP_HOST']}/index.php");
    }0

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>