<?php
include "header.html";

?>
<h3 style="text-align: left; margin-bottom: 10px;">Berichten</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43;">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43;">FlowerPower</a></li>
        <li class="breadcrumb-item active" aria-current="page">Berichten</li>
    </ol>
</nav>
<table class="table rounded" style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <thead style="background-color: #C3DF0E;">
    <tr>
        <th style='font-size: 17px;' scope="col">#</th>
        <th style='font-size: 17px; text-align: left; padding-left: 100px;' scope="col">Naam</th>
        <th style='font-size: 17px; text-align: left;' scope="col">Telefoonnummer</th>
        <th style='font-size: 17px; text-align: left;' scope="col">E-mailadres</th>
        <th style='font-size: 17px;text-align: left;' scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $dbnaam = "flowerpower";

    $dbh = mysqli_connect($host, $user, $pass, $dbnaam);
    if (!$dbh) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM contact";
    $result = $dbh -> query($sql);


    $row_count = $result->num_rows;
    while ($row = $result -> fetch_assoc()) {
        echo "<tr><th style='font-size: 17px; text-align: left;'>" . $row["idcontact"] . "</th><td style='font-size: 17px; text-align: left; padding-left: 100px'>" . $row["naam"]. "</td><td style='font-size: 17px; text-align: left;'>" . $row["telefoon"] . "</td><td style='font-size: 17px; text-align: left;'>" . $row["email"] . "</td></td>";
        echo "<td><button class='button button4'>Bekijken</button></td></tr>";
    }
    ?>
    </tbody>
</table>