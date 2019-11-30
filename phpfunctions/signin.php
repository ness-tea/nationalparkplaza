<?php 

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user input from login.php
$email = $_POST['email'];
$pass = md5($_POST['pass']); // decode hashed password

try {
    // Connect to the SQL databse using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to check if there are any existing users with the same email first
    $query = "SELECT COUNT(email) FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // // Check if there is the user's entry in the table - meaning that user does exist
    if ($stmt->fetchColumn() == 0)
    {
        // User does not exist
        echo "Login unsuccessful";

        // Redirect to table of users.
        header("Location: https://{$_SERVER['HTTP_HOST']}/login.php");
    } 
    else 
    {
        if ($pass == $data['pw'])
        {
            // User exists
            echo "Login successful";
            $_SESSION['user_id'] = $data['user_id'];
            
            header("Location: https://{$_SERVER['HTTP_HOST']}/index.php");
        }
        else{
            echo "user exists but pw is wrong";
        }

    }

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>