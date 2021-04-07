<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbnaam = "flowerpower";
$dbh = mysqli_connect($host, $user, $pass, $dbnaam);

session_start();

$check_klant = $_SESSION['login_klant'];
$check_medewerker = $_SESSION['login_medewerker'];

$query = "SELECT * FROM klant WHERE email = '$check_klant'";
$query2 = "SELECT * FROM medewerker WHERE email = '$check_medewerker'";

$ses_sql = mysqli_query($dbh, $query);
$ses_sql2 = mysqli_query($dbh, $query2);

$row = mysqli_fetch_assoc($ses_sql);
$row = mysqli_fetch_assoc($ses_sql2);

$login_session_klant = $row['email'];
$login_session_medewerker = $row['email'];