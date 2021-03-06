<?php
include "../header.php";

?>
<div style="margin-left: 20px; margin-right: 20px;">
<h3 style="text-align: left; margin-bottom: 10px; margin-top: 100px;">Berichten</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43; font-size: 11px;">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43; font-size: 11px;">FlowerPower</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size: 11px;">Berichten</li>
    </ol>
</nav>
<table class="table rounded"
       style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); margin-bottom: 400px;">
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
    require "../../default/dbh.php";

    $sql = "SELECT * FROM contact";
    $result = $dbh->query($sql);


    $row_count = $result->num_rows;
    while ($row = $result->fetch_assoc()) {
        echo "<tr><th style='font-size: 17px; text-align: left;'>" . $row["idcontact"] . "</th><td style='font-size: 17px; text-align: left; padding-left: 100px'>" . $row["naam"] . "</td><td style='font-size: 17px; text-align: left;'>" . $row["telefoon"] . "</td><td style='font-size: 17px; text-align: left;'>" . $row["email"] . "</td></td>";
        echo "<td><button data-toggle='modal' data-target='#myModal" . $row["idcontact"] . "' class='button button4'>Bekijken</button></td></tr>";
    }
    ?>
    </tbody>
</table>
    <?php $sql = "SELECT * FROM contact";
    $result = $dbh->query($sql);
    while ($row = $result->fetch_assoc()) { ?>
<!-- Modal bekijken -->
<div class="modal fade" id="myModal<?php echo $row["idcontact"] ?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content" style="border: 2px solid black;">
            <div class="modal-header">
                <h4 style="font-style: normal;">Bericht van <?php echo $row["naam"] ?> bekijken</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-12" style="text-align: left; font-size: 18px; font-weight: bold;">
                        <p><?php echo $row["naam"] ?></p>
                    </div>
                    <div class="col-12" style="text-align: left; font-size: 13px; margin-bottom: -10px;">
                    <p><?php echo $row["telefoon"] ?></p>
                    </div>
                    <div class="col-12" style="text-align: left; font-size: 13px;">
                    <p><?php echo $row["email"] ?></p>
                    </div>
                    <hr class="solid">
                    <div class="col-12" style="text-align: left; font-size: 18px; margin-top: 20px;">
                        <textarea class="form-control form-rounded" readonly><?php echo $row["notitie"] ?></textarea>
                    </div>
                </div>

                <input class="button button4"
                       style="cursor:pointer; text-decoration: none; margin-right: 30px; background-color: #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                       data-dismiss="modal" name="sluiten" value="sluiten">
            </div>
        </div>
    </div>
</div>
    <?php } ?>