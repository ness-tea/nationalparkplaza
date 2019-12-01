<?php 
session_start();

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user input from login.php
// Store user input from registration.php
$fullname = $_POST['fullname'];
$birthdate = $_POST['birthday'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$hash = password_hash($pass, PASSWORD_DEFAULT);  // hash password for security

try {
    // Connect to the SQL databse using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to check if there are any existing users with the same email first
    $query = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));

    if (isset($_POST['btnRegister']))
    {
        // Check if the query returned no existing users - then we can add the account to the database
        if ($stmt->fetchColumn() == 0)
        {
            // Reassign Query to insert user's input into Users table for registration
            $query = "INSERT INTO Users (fullname, birthdate, email, pass) 
                    VALUES (:fullname, :birthdate, :email, :pass)";
            $stmt = $conn->prepare($query);
            $stmt->execute(array(':fullname'=> $fullname, ':birthdate'=> $birthdate, ':email'=> $email, ':pass'=> $hash));
        
            echo "User added successfully";

            // Redirect to login page.
            header("Location: https://{$_SERVER['HTTP_HOST']}/login.php");
        }
        else
        {
            echo "User already exists";

            // Redirect to registration page.
            header("Location: https://{$_SERVER['HTTP_HOST']}/registration.php");
        }
    }
    else if (isset($_POST['btnLogin']))
    {
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($data[0]['pass']);
    
        // // Check if there is the user's entry in the table - meaning that user does exist
        if ($stmt->rowCount() == 0 || !password_verify($pass, $data[0]['pass']))
        {
            // User does not exist
            echo "Login unsuccessful";
    
            // Redirect to login page.
            header("Location: https://{$_SERVER['HTTP_HOST']}/login.php");
        } 
        else 
        {
            // User exists
            echo "Login successful";
            $_SESSION['fullname'] = $data[0]['fullname'];
            $_SESSION['email'] = $data[0]['email'];
            $_SESSION['loggedin'] = true;
            
            header("Location: https://{$_SERVER['HTTP_HOST']}/index.php");
        }
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>