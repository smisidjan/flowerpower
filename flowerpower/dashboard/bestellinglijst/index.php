<?php
include '../../Controllers/BestellinglijstController.php';
include "../header.php";

if (isset($_POST['wijzig'])) {
    $wijzig = new BestellinglijstController();

    if (isset($_POST['idfactuur'])) {
        $idfactuur = $_POST['idfactuur'];
    }
    if (isset($_POST['idmedewerker'])) {
        $idmedewerker = $_POST['idmedewerker'];
    }
    if (isset($_POST['afgehaald'])) {
        $afgehaald = $_POST['afgehaald'];
    }

    $wijzig->wijzigFactuur($idfactuur, $idmedewerker, $afgehaald);
}

?>
    <h3 style="text-align: left; margin-bottom: 10px;">Bestellinglijst</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
            <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43;">Home</a></li>
            <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43;">FlowerPower</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bestellinglijst</li>
        </ol>
    </nav>
    <table class="table rounded"
           style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
        <thead style="background-color: #C3DF0E;">
        <tr>
            <th scope="col" style='font-size: 17px;'>#</th>
            <th scope="col" style='font-size: 17px; text-align: left; padding-left: 80px;'>Naam</th>
            <th scope="col" style='font-size: 17px; text-align: left;'>Aantal artikelen</th>
            <th scope="col" style='font-size: 17px; text-align: left;'>Adres</th>
            <th scope="col" style='font-size: 17px; text-align: left;'>Datum</th>
            <th scope="col" style='font-size: 17px; text-align: left;'>Afgehaald</th>
            <th scope="col" style='font-size: 17px; text-align: left;'>Medewerker</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        require "../../default/dbh.php";

        $sql = "SELECT * FROM factuur";
        $result = $dbh->query($sql);
        $sqlArtikel = $dbh->query("SELECT aantal FROM artikel_has_factuur");
        foreach ($result as $factuur) {
            $idklant = $factuur['idklant'];
            $sql1 = "SELECT * FROM klant where idklant = $idklant";
            $klant = $dbh->query($sql1);
            while ($row1 = $klant->fetch_assoc()) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td style='font-size: 17px;'>" . $row["idfactuur"] . "</td>";
                    echo "<td style='font-size: 17px; text-align: left; padding-left: 80px;'>" . $row1["naam"] . " " . $row1["tussenvoegsel"] . " " . $row1["achternaam"] . "</td>";
                    $rowArtikelen = $sqlArtikel->fetch_assoc();
                    echo "<td style='font-size: 17px; text-align: left;'>" . $rowArtikelen["aantal"] . "</td>";
                    echo "<td style='font-size: 17px; text-align: left;'>" . $row1["adres"] . " " . $row1["huisnummer"] . " " . $row1["postcode"] . " " . $row1["plaats"] . "</td>";
                    echo "<td style='font-size: 17px; text-align: left;'>" . $row["datum"] . "</td>";
                    echo "<td style='font-size: 17px; text-align: left;'>" . $row["afgehaald"] . "</td>";
                    if (isset($row['idmedewerker'])) {
                        $id = $row['idmedewerker'];
                        $sqlMedewerker = $dbh->query("SELECT * FROM medewerker where idmedewerker ='$id'");
                        while ($rowMw = $sqlMedewerker->fetch_assoc()) {
                            echo "<td style='font-size: 17px; text-align: left;'>" . $rowMw["naam"] . " " . $rowMw["tussenvoegsel"] . " " . $rowMw["achternaam"] . "</td>";
                        }
                    } else {
                        echo "<td style='font-size: 17px; text-align: left;'>Nog niet afgehandeld</td>";
                    }
                    echo "<td><button style='cursor: pointer' data-toggle='modal' data-target='#myModal" . $row["idfactuur"] . "' class='button button4'>Bekijken</button></td></tr>";
                }
            }
        }
        ?>
        </tbody>
    </table>
<?php
$sql = "SELECT * FROM factuur";
$result = $dbh->query($sql);
foreach ($result as $factuur) {
    $idklant = $factuur['idklant'];
    $sql1 = "SELECT * FROM klant where idklant = $idklant";
    $klant = $dbh->query($sql1);
    while ($row1 = $klant->fetch_assoc()) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <!-- Modal bekijken -->
            <div class="modal fade" id="myModal<?php echo $row['idfactuur'] ?>" role="dialog">
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
                                    <p><?php echo $row1['naam'] . " " . $row1['tussenvoegsel'] . " " . $row1['achternaam'] ?></p>
                                </div>
                                <div class="col-12" style="text-align: left; font-size: 13px; margin-bottom: -10px;">
                                    <p><?php echo $row1['adres'] . " " . $row1['huisnummer'] . " " . $row1['postcode'] . " " . $row1['plaats'] ?></p>
                                </div>
                                <div class="col-12" style="text-align: left; font-size: 13px; margin-bottom: -10px;">
                                    <p><?php echo $row1['telefoon'] ?></p>
                                </div>
                                <div class="col-12" style="text-align: left; font-size: 13px;">
                                    <p><?php echo $row1['email'] ?></p>
                                </div>
                                <hr class="solid">
                                <form action="index.php" method="post">
                                    <input type="hidden" value="<?php echo $row["idfactuur"];?>" name="idfactuur">
                                        <div class="col-12">
                                            <select name="idmedewerker" class="form-select form-control" style="height: 40px;">
                                                <option selected>Medewerker</option>
                                                <?php $medewerker = $dbh->query("select * from medewerker");
                                                while ($rowMedewerker = $medewerker->fetch_assoc()) {?>
                                                    <option value="<?php echo $rowMedewerker['idmedewerker'] ?>"
                                                            name="<?php echo $rowMedewerker['idmedewerker'] ?>"><?php echo $rowMedewerker['naam'] . " " . $rowMedewerker['tussenvoegsel'] . " " . $rowMedewerker['achternaam'] ?></option>
                                                    <?php
                                                } ?>
                                            </select>
                                        </div><br>
                                        <div class="col-12">
                                            <select name="afgehaald" class="form-select form-control" aria-label="Default select example" style="height: 40px;">
                                                <option selected>Afgehandeld?</option>
                                                <option name="ja" value="ja">JA</option>
                                                <option name="nee" value="nee">NEE</option>
                                            </select>
                                        </div>
                                    <input class="button button4"
                                           style="cursor:pointer; text-decoration: none; margin-right: 30px; background-color: #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                                           name="wijzig" value="opslaan" type="submit">
                                    <input class="button button4"
                                           style="cursor:pointer; text-decoration: none; margin-right: 30px; background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                                           data-dismiss="modal" name="sluiten" value="sluiten">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }
} ?>