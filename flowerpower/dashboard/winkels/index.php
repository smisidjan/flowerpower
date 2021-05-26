<?php
include "../header.php";
include "../../Controllers/WinkelController.php";
require "../../default/dbh.php";

if (isset($_POST['opslaan'])) {
    $voegToe = new WinkelController();

    $naam = $_POST['naam'];
    $adres = $_POST['adres'];
    $huisnummer = $_POST['huisnummer'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $telefoonnummer = $_POST['telefoon'];
    $email = $_POST['email'];
    $afbeelding = $_POST['afbeelding'];

    $voegToe->voegWinkelToe($naam, $adres, $huisnummer, $postcode, $plaats, $telefoonnummer, $email, $afbeelding);
}

if (isset($_POST['wijzig'])) {
    $wijzig = new WinkelController();

    $idwinkel = $_POST['idwinkel'];
    $naam = $_POST['naam'];
    $adres = $_POST['adres'];
    $huisnummer = $_POST['huisnummer'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $telefoonnummer = $_POST['telefoon'];
    $email = $_POST['email'];
    $afbeelding = $_POST['afbeelding'];

    $wijzig->wijzigWinkel($idwinkel, $naam, $adres, $huisnummer, $postcode, $plaats, $telefoonnummer, $email, $afbeelding);
}

if (isset($_GET['delete'])) {
    $verwijder = new WinkelController();
    $id = $_GET['delete'];
    $verwijder->verwijderWinkel($id);
}

?>
<div style="margin-left: 20px; margin-right: 20px;">
    <h3 style="text-align: left; margin-bottom: 10px; margin-top: 100px;" xmlns="http://www.w3.org/1999/html">Overzicht
        winkels</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
            <li class="breadcrumb-item"><a href="../../default/index.php"
                                           style="color: #10AB43; font-size: 11px;">Home</a></li>
            <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43; font-size: 11px;">FlowerPower</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page" style="font-size: 11px;">Overzicht winkels</li>
        </ol>
    </nav>
    <table class="table rounded"
           style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 20rem; margin-bottom: 400px;">
        <thead style="background-color: #C3DF0E; border-radius: 20rem;">
        <tr>
            <th scope="col" style='font-size: 17px;'>#</th>
            <th scope="col" style='font-size: 17px; text-align: left;'>Naam</th>
            <th scope="col" style='font-size: 17px;'>Adres</th>
            <th scope="col" style='font-size: 17px;'>Huisnummer</th>
            <th scope="col" style='font-size: 17px;'>Postcode</th>
            <th scope="col" style='font-size: 17px;'>Plaats</th>
            <th scope="col" style='font-size: 17px;'>Telefoonnummer</th>
            <th scope="col" style='font-size: 17px;'>E-mailadres</th>
            <th scope="col">
                <button class="button button4" data-toggle="modal" data-target="#toevoegModal">Toevoegen</button>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM winkel";
        $result = $dbh->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr><th style='font-size: 17px;'>" . $row["idwinkel"] . "</th>";
            echo "<td style='font-size: 17px; text-align: left;'>" . $row["naam"] . "</td>";
            echo "<td style='font-size: 17px; text-align: left;'>" . $row["adres"] . "</td>";
            echo "<td style='font-size: 17px; text-align: left;'>" . $row["huisnummer"] . "</td>";
            echo "<td style='font-size: 17px; text-align: left;'>" . $row["postcode"] . "</td>";
            echo "<td style='font-size: 17px; text-align: left;'>" . $row["plaats"] . "</td>";
            echo "<td style='font-size: 17px; text-align: left; margin-left: -50px;'>" . $row["telefoon"] . "</td>";
            echo "<td style='font-size: 17px; text-align: left;'>" . $row["email"] . "</td>";
            echo "<td><span data-toggle='modal' data-target='#toevoegModal" . $row["idwinkel"] . "' style='font-size: 20px; text-align: center; margin-right: -70px; cursor:pointer;'>Bewerken</span><span data-toggle='modal' data-target='#myModal" . $row["idwinkel"] . "' style='cursor: pointer; color: black; float: right; margin-right: 20px;'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></span></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<?php $sql = "SELECT * FROM winkel";
$result = $dbh->query($sql);
while ($row = $result->fetch_assoc()) { ?>
    <!-- Modal verwijderen -->
    <div class="modal fade" id="myModal<?php echo $row["idwinkel"] ?>" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: 2px solid black;">
                <div class="modal-header">
                    <h4 style="margin-left: 200px; font-style: normal;">Let op!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title" style="margin-bottom: 30px;">Weet u zeker dat u <?php echo $row["naam"] ?>
                        wilt
                        verwijderen?</h4>
                    <a href="index.php?delete=<?php echo $row["idwinkel"] ?>">
                        <input class="button button4"
                               style="margin-right: 30px; background-color: #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                               type="button" name="ja" value="ja"></a>
                    <input class="button button4"
                           style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                           type="button" name="nee" value="nee"
                           data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $sql = "SELECT * FROM winkel";
$result = $dbh->query($sql);
while ($row = $result->fetch_assoc()) { ?>
    <!-- Modal bewerken -->
    <div class="modal fade" id="toevoegModal<?php echo $row["idwinkel"] ?>" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content" style="border: 2px solid black;">
                <div class="modal-header" style="text-align: center;">
                    <h4 style="margin-left: 100px; font-style: normal;">Medewerker <?php echo $row["naam"] ?>
                        bewerken</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php">
                        <input type="hidden" value="<?php echo $row["idwinkel"] ?>" name="idwinkel">
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-12">
                                <input type="text" class="form-control form-rounded" name="naam"
                                       value="<?php echo $row["naam"] ?>" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-8">
                                <input type="text" class="form-control form-rounded" name="adres"
                                       value="<?php echo $row["adres"] ?>">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-rounded" name="huisnummer"
                                       value="<?php echo $row["huisnummer"] ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-4">
                                <input type="text" class="form-control form-rounded" name="postcode"
                                       value="<?php echo $row["postcode"] ?>">
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-rounded" name="plaats"
                                       value="<?php echo $row["plaats"] ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-12">
                                <input type="text" class="form-control form-rounded" name="telefoon"
                                       value="<?php echo $row["telefoon"] ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-12">
                                <input type="text" class="form-control form-rounded" name="email"
                                       value="<?php echo $row["email"] ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-12">
                                <input style=" height: 35px;" type="file" class="form-control form-rounded"
                                       name="afbeelding" id="afbeelding" value="<?php echo $row["afbeelding"] ?>">
                            </div>
                        </div>
                        <input class="button button4"
                               style="width: 100px; background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                               type="submit" name="wijzig" value="opslaan">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Modal toevoegen -->
<div class="modal fade" id="toevoegModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content" style="border: 2px solid black;">
            <div class="modal-header" style="text-align: center;">
                <h4 style="text-align: center; font-style: normal;">Winkel toevoegen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input type="text" class="form-control form-rounded" name="naam"
                                   placeholder="naam" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-8">
                            <input type="text" class="form-control form-rounded" name="adres"
                                   placeholder="adres">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control form-rounded" name="huisnummer"
                                   placeholder="huisnummer">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-4">
                            <input type="text" class="form-control form-rounded" name="postcode"
                                   placeholder="postcode">
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-rounded" name="plaats"
                                   placeholder="plaats">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input type="text" class="form-control form-rounded" name="telefoon"
                                   placeholder="telefoonnummer">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input type="text" class="form-control form-rounded" name="email"
                                   placeholder="email">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input style=" height: 35px;" type="file" class="form-control form-rounded"
                                   name="afbeelding" id="afbeelding">
                        </div>
                    </div>
                    <input class="button button4"
                           style="width: 100px; background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                           type="submit" name="opslaan" value="opslaan">
                </form>
            </div>
        </div>
    </div>
</div>

