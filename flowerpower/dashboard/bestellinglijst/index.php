<?php
include "header.html";

?>
<h3 style="text-align: left; margin-bottom: 10px;">Bestellinglijst</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43;">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43;">FlowerPower</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bestellinglijst</li>
    </ol>
</nav>
<table class="table rounded" style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <thead style="background-color: #C3DF0E;">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">Aantal artikelen</th>
        <th scope="col">Adres</th>
        <th scope="col">Datum</th>
        <th scope="col"></th>
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

    $sql = "SELECT * FROM factuur";
    $result = $dbh -> query($sql);

    foreach ($result as $factuur) {
        $idklant = $factuur['idklant'];
        var_dump($idklant);
    }

    $sql1 = "SELECT * FROM klant where idklant is '$idklant'";
    $result1 = $dbh -> query($sql1);

    $row_count = $result->num_rows;
    while ($row = $result -> fetch_assoc() and $row1 = $result1 -> fetch_assoc()) {
        echo "<tr><th>" . $row["idfactuur"] . "</th><td>" . $row1["naam"]. "</td><td>" . $row1["telefoonnummer"] . "</td><td>" . $row1["email"] . "</td></td>";
        echo "<td><button class='button button4'>Bekijken</button></td></tr>";
    }
    ?>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td><button class="button button4">Bekijken</button></td>
    </tr>
    </tbody>
</table>