<?php 
    
// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Store user input from login.php
$email = $_POST['email'];
$pass = md5($_POST['pass']);

try
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($email) && isset($pass))
    {
        // Query we are using to check if the user exists in database
        $query = "SELECT * FROM Users WHERE email = :email AND pw = :pass";

        // // Prepared statement
        // $stmnt = $pdo->prepare($query);
        // try {
        //     $stmnt->execute(array(':email'=> $email, ':pass'=> $pass));
        // } catch (PDOException $e) {
        //     echo $e->getMessage();
        // }

        // // For getting data from the query to submitted above.
        // $rows = $stmnt->fetchAll();

        // // If there is only one user
        // if (count($rows) == 1){
        //     // Setting the session to the returned user ID.
        //     $_SESSION['fullname'] = $rows[0]['fullname'];
        //     // Redirect to table of users.
        //     header("Location: https://{$_SERVER['HTTP_HOST']}/index.php");
        // } else {
        //     header("Location: https://{$_SERVER['HTTP_HOST']}/index.php");
        // }

        echo "Log in successful";

    } else {
        // This path is dependent on where the root of your documents is located.
        // For this it is made to point back to the index file if login has failed.
        header("Location: https://{$_SERVER['HTTP_HOST']}/index.php");
    }
?>