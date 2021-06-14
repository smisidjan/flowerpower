<?php
$host = 'localhost';
$user = 'flowerpower_roc_dev_nl_flowerpower';
$pass = '9GrVD4w2948H';
$dbnaam = "flowerpower_roc_dev_nl_flowerpower";

$dbh = mysqli_connect($host, $user, $pass, $dbnaam);

if (!$dbh) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
