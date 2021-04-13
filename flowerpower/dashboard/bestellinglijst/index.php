<?php
include "../header.php";

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
        <th scope="col" style='font-size: 17px;'>#</th>
        <th scope="col" style='font-size: 17px; text-align: left; padding-left: 80px;'>Naam</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Aantal artikelen</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Adres</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Datum</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Afgehaald</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    require "../../default/dbh.php";

    $sql = "SELECT * FROM factuur";
    $result = $dbh -> query($sql);

    foreach ($result as $factuur) {
        $idklant = $factuur['idklant'];

        $sql1 = "SELECT * FROM klant where idklant = $idklant";
        $klant = $dbh -> query($sql1);

        $row_count = $result->num_rows;
        while ($row1 = $klant -> fetch_assoc()) {

            while ($row = $result -> fetch_assoc()) {
                echo "<tr><td style='font-size: 17px;'>" . $row["idfactuur"] . "</td>"."<td style='font-size: 17px; text-align: left; padding-left: 80px;'>" . $row1["naam"] . "</td>"."<td style='font-size: 17px; text-align: left;'> aantal artikelen </td>"."<td style='font-size: 17px; text-align: left;'> adres </td>"."<td style='font-size: 17px; text-align: left;'>" . $row["datum"]. "</td>"."<td style='font-size: 17px; text-align: left;'>" . $row["afgehaald"]. "</td>";
                echo "<td><button style='cursor: pointer' data-toggle='modal' data-target='#myModal' class='button button4'>Bekijken</button></td></tr>";
            }
        }
    }
    ?>
    </tbody>
</table>
<!-- Modal bekijken -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content" style="border: 2px solid black;">
            <div class="modal-header">
                <h4 style="font-style: normal;">Bestelling </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-12" style="text-align: left; font-size: 18px;">
                        <p>Naam</p>
                    </div>
                    <div class="col-12" style="text-align: left; font-size: 13px; margin-bottom: -10px;">
                        <p>adres</p>
                    </div>
                    <div class="col-12" style="text-align: left; font-size: 13px; margin-bottom: -10px;">
                        <p>Telefoonnummer</p>
                    </div>
                    <div class="col-12" style="text-align: left; font-size: 13px;">
                        <p>Email</p>
                    </div>
                    <hr class="solid">
                    <div class="col-12" style="text-align: left; font-size: 18px;">
                        <textarea class="form-control form-rounded">Notitie</textarea>
                    </div>
                </div>

                <input class="button button4"
                       style="cursor:pointer; text-decoration: none; margin-right: 30px; background-color: #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" name="opslaan" value="opslaan">
                <input class="button button4"
                       style="cursor:pointer; text-decoration: none; margin-right: 30px; background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                       data-dismiss="modal" name="sluiten" value="sluiten">
            </div>
        </div>
    </div>
</div>