<?php 
    $servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
    $username = "truonv1";
    $password = "12345678";
    $dbname = "nationalparkplaza";
    $email = $_POST['email'];
    $password = $_POST['pass'];

    session_start();
    
    // using php data objects we set the login parameters for the database. 
    // More information here: https://www.php.net/manual/en/intro.pdo.php
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($email) && isset($password)){

        // Query we are using to check if the user is legit
        //$sql = "Select * from Users where Email=? and Password=?";
        $query = "SELECT * FROM Users WHERE email = '$email' AND password = '$password'";
        // Prepared statements: For when we don't have all the parameters so we store a template to be executed
        // More information here: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
        $stmnt = $conn->prepare($query);
        try {
            $stmnt->execute([$email, $password]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        // For getting data from the query to submitted above.
        $rows = $stmnt->fetchAll();

        // If there is only one user
        if (count($rows) == 1){
            // Setting the session to the returned user ID.
            $_SESSION['ID'] = $rows[0]['ID'];
            // Redirect to table of users.
            
            header("Location: https://nationalparksplaza.ga/index.php");
        } else {
            header("Location: https://nationalparksplaza.ga/index.php");
        }

    } else {
        // This path is dependent on where the root of your documents is located.
        // For this it is made to point back to the index file if login has failed.
        header("Location: https://nationalparksplaza.ga/index.php");
    }
?>