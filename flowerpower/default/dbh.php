<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbnaam = "flowerpower";

$dbh = mysqli_connect($host, $user, $pass, $dbnaam);

if (!$dbh) {
    die("Connection failed: " . mysqli_connect_error());
}