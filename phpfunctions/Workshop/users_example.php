<?php 
    session_start();
    // Check if session is a logged in one, if it isn't then redirect to login.
    if (!isset($_SESSION['ID'])){
        header("Location: https://{$_SERVER['HTTP_HOST']}/Workshop7/index.php");
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bad User Database</title>
</head>
<body>
    <header>
        <a href="phpfunctions/logout.php">Logout!</a>
    </header>
    <!-- Here we would like to get all user data from the user table and display it -->
    <!-- We will write some php here to obtain data to be presented. -->
    <table>
        <tr>
            <th>Emails</th>
        </tr>
    <?php
        // Connectinig to Database
         $pdo = new PDO('mysql:host=localhost;dbname=workshop7', 'chaneh', 'test');
         $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //  Selecting all emails on the users table
         $sql = "Select Email from users";
         $stmnt = $pdo->prepare($sql);
        try{
            $stmnt->execute();
        } catch(PDOException $e) {   
            echo $e->getMessage();
        }

        // Iterating through each row of the returned query
        while ($row = $stmnt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr><td>'.$row['Email'].'</td></tr>';
        }
    ?>
    </table>
</body>
</html>
