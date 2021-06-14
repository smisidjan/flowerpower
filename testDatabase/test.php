<?php
include "dbh.php";

echo "Hello world";

$sql = "SELECT * FROM artikel";
$result = $dbh->query($sql);
while ($row = $result->fetch_assoc()) {
    echo $row['naam'];
}
?>
