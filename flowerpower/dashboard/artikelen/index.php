<?php
session_start();
include "../header.php";
include "../../Controllers/ArtikelController.php";
require "../../default/dbh.php";

if (isset($_POST['opslaan'])) {
    $voegToe = new ArtikelController();

    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $categorie = $_POST['categorie'];
    $afbeelding = $_POST['afbeelding'];

    $voegToe->voegArtikelToe($naam, $omschrijving, $prijs, $afbeelding, $categorie);
}

if (isset($_POST['wijzig'])) {
    $wijzig = new ArtikelController();

    $idartikel = $_POST['idartikel'];
    if (isset($_POST['naam'])) {
        $naam = $_POST['naam'];
    }
    if (isset($_POST['omschrijving'])) {
        $omschrijving = $_POST['omschrijving'];
    } else { $omschrijving = null;}
    if (isset($_POST['prijs'])) {
        $prijs = $_POST['prijs'];
    }
    if (isset($_POST['afbeelding'])) {
        $afbeelding = $_POST['afbeelding'];
    } else { $afbeelding = null;}
    if (isset($_POST['categorie'])) {
        $categorie = $_POST['categorie'];
    }

    $wijzig->wijzigArtikel($idartikel, $naam, $omschrijving, $prijs, $afbeelding, $categorie);
}

if (isset($_GET['delete'])) {
    $verwijder = new ArtikelController();
    $id = $_GET['delete'];
    $verwijder->verwijderArtikel($id);
}


?>
<h3 style="text-align: left; margin-bottom: 10px;">Overzicht artikelen</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43;">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43;">FlowerPower</a></li>
        <li class="breadcrumb-item active" aria-current="page">Overzicht artikelen</li>
    </ol>
</nav>
<table id="table" class="table rounded"
       style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); margin-bottom: 400px;">
    <thead style="background-color: #C3DF0E;">
    <tr style="text-align: center;">
        <th scope="col" style='font-size: 17px;'>Artikel nr</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Naam</th>
        <th scope="col" style='font-size: 17px; text-align: left; margin-left: 50px;'>Beschrijving</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Prijs</th>
        <th scope="col" style='font-size: 17px; text-align: left; padding-left: 25px;'>Categorie</th>
        <th scope="col">
            <button class="button button4" data-toggle="modal" data-target="#toevoegModal">Toevoegen</button>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM artikel";
    $result = $dbh->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr><th style='font-size: 17px;'>" . $row["idartikel"] . "</th>";
        echo "<td style='font-size: 17px; text-align: left;'>" . $row["naam"] . "</td>";
        echo "<td style='font-size: 17px; text-align: left; margin-left: 50px;'>" . $row["omschrijving"] . "</td>";
        echo "<td style='font-size: 17px; text-align: left;'>" . $row["prijs"] . "</td>";
        echo "<td style='font-size: 17px; text-align: left; padding-left: 25px;'>" . $row["categorie"] . "</td></td>";
        echo "<td><span data-toggle='modal' data-target='#toevoegModal" . $row["idartikel"] . "' style='font-size: 20px; margin-right: -140px; text-align: center; cursor: pointer;'>Bewerken</span><span data-toggle='modal' data-target='#myModal" . $row["idartikel"] . "' style='cursor: pointer; float: right; margin-right: 20px; color: black;'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></span></td></tr>";
    }

    ?>
    </tbody>
</table>
<?php $sql = "SELECT * FROM artikel";
$result = $dbh->query($sql);
while ($row = $result->fetch_assoc()) { ?>
    <!-- Modal verwijderen -->
    <div class="modal fade" id="myModal<?php echo $row["idartikel"] ?>" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: 2px solid black;">
                <div class="modal-header">
                    <h4 style="margin-left: 200px; font-style: normal;">Let op!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title" style="margin-bottom: 30px;">Weet u zeker dat u <?php echo $row["naam"] ?> wilt
                        verwijderen?</h4>
                    <a href="index.php?delete=<?php echo $row["idartikel"] ?>">
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
<?php $sql = "SELECT * FROM artikel";
$result = $dbh->query($sql);
while ($row = $result->fetch_assoc()) { ?>
<!-- Modal bewerken -->
<div class="modal fade" id="toevoegModal<?php echo $row["idartikel"] ?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content" style="border: 2px solid black;">
            <div class="modal-header" style="text-align: center;">
                <h4 style="margin-left: 100px; font-style: normal;">Artikel <?php echo $row["naam"] ?> bewerken</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post">
                    <input type="hidden" value="<?php echo $row["idartikel"] ?>" name="idartikel">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input type="text" class="form-control form-rounded" name="naam" id="naam"
                                   value="<?php echo $row["naam"] ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <textarea class="form-control form-rounded" name="omschrijving" id="omschrijving" rows="3"
                                      value="<?php echo $row["omschrijving"] ?>"></textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-6">
                            <input type="text" class="form-control form-rounded" name="prijs" id="prijs"
                                   value="<?php echo $row["prijs"] ?>">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control form-rounded" name="categorie" id="categorie"
                                   value="<?php echo $row["categorie"] ?>">
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
                <h4 style="margin-left: 100px; font-style: normal;">Artikel toevoegen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input type="text" class="form-control form-rounded" name="naam" id="naam"
                                   placeholder="Naam">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <textarea class="form-control form-rounded" name="omschrijving" id="omschrijving" rows="3"
                                      placeholder="Omschrijving"></textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-6">
                            <input type="text" class="form-control form-rounded" name="prijs" id="prijs"
                                   placeholder="Prijs">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control form-rounded" name="categorie" id="categorie"
                                   placeholder="Categorie">
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