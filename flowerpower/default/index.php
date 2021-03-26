<?php
require '../Controllers/BloemenController.php';
include 'header.html';
include 'card.php';

$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbnaam = "flowerpower";

$dbh = mysqli_connect($host, $user, $pass, $dbnaam);

if (!$dbh) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "select * from artikel";

if ($result = $dbh -> query($sql)) {
    while ($row = $result -> fetch_row()) {
        printf ("%s (%s)\n", $row[0], $row[1]);
    }
    $result -> free_result();
}
?>

</body>
</div>
</html>