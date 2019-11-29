<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>National Park Plaza</title>

    <!-- Linking google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Forum|Julius+Sans+One|Lateef|Open+Sans&display=swap" rel="stylesheet">

    <!-- Linking the css stylesheet to style html elements -->
    <link href="css/main.css" type="text/css" rel="stylesheet">

    <!-- Linking favicon png -->
    <link rel="icon" href="assets/header-ico.png">

    <script src="scripts/js/validation.js"></script>
</head>

<body>

<?php

extract($_POST);
include("databaseAccess.php");    
$sql = mysqli_query($conn, "SELECT * FROM Users WHERE login = '$email'");
if (mysqli_num_rows($sql) > 0) {
    echo "Login Email Already Exists";
    exit;
}
$fullname = $_POST['fullname'];
$birthdate = $_POST['birthday'];
$email = $_POST['email'];
$password = $_POST['pass'];

$query = "INSERT INTO Users (fullname, birthdate, email, password)
VALUES ('$fullname', '$birthdate', '$email', '$password')
WHERE NOT EXISTS (SELECT email FROM Users WHERE email = '$email') LIMIT 1";

if (mysqli_query($conn, $query)) {
    echo "User $email created successfully";
    
} else {
    echo "Insertion Table Users Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>


</body>

</html>
