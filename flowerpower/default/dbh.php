<?php
$host = 'sftp://flowerpower-roc-dev.nl.transurl.nl';
$user = 'flowerpower-roc-dev.nl';
$pass = 'SaraiM16!';
$dbnaam = "flowerpower_roc_dev_nl_flowerpower";

$dbh = mysqli_connect($host, $user, $pass, $dbnaam);

if (!$dbh) {
    die("Connection failed: " . mysqli_connect_error());
}

