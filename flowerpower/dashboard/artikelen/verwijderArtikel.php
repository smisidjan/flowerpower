<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbnaam = "flowerpower";

$dbh = mysqli_connect($host, $user, $pass, $dbnaam);
if (!$dbh) {
    die("Connection failed: " . mysqli_connect_error());
}

//// sql to delete a record
//$sql = "DELETE FROM artikel WHERE idartikel='".$_GET['id']."' ";
//
//if ($dbh->query($sql) === TRUE) {
//    header("Location: index.php");
//} else {
//    echo "Error deleting record: " . $dbh->error;
//}
//
//$dbh->close();

?>