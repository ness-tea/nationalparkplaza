<?php 
    
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
        <a href="index.php">Login!</a>
    </header>
    <form action="phpfunctions/addUser.php" method="POST">
        <label>
            Email:
        </label>
        <input type="email" id="email" name="email"/>
        <label>
            Password:
        </label>
        <input type="password" id="password" name="password"/>
        <input type="submit" id="submit" value="Sign-Up"/>
    </form>
</body>
</html>