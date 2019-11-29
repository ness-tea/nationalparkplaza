<?php

include("databaseAccess.php");  


$query = mysqli_query("SELECT AVG(rating) as AVGRATE FROM Reviews WHERE status = 1");
$row = mysqli_fetch_array($query);
$AVGRAGE = $row['AVERAGE'];
 
$query = mysqli_query("SELECT count(rating) as Total FROM Reviews WHERE status = 1");
$row = mysqli_fetch_array($query);
$Total = $row['Total'];

$query = mysqli_query("SELECT count(review) as Totalreview FROM Reviews WHERE status = 1 ORDER BY rev_date DESC LIMIT 3");
$row = mysqli_fetch_array($query);
$Total = $row['Total'];

$rating = mysqli_query("SELECT count(*) as Total, rating FROM Reviews GROUP BY rating ORDER BY rating DESC");
$review = mysqli_query("SELECT review, rating, email FROM Reviews WHERE status = 1 ORDER BY rev_date DESC LIMIT 3");


mysqli_close($conn);
?>