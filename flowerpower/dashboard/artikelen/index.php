<?php
$naam = '';
$omschrijving = '';
$prijs = '';
$categorie = '';
$afbeelding = '';

session_start();
include "header.html";
include "../../Controllers/ArtikelController.php";
require "verwijderArtikel.php";
require "../../default/dbh.php";

if (isset($_POST['submit'])) {
    $voegToe = new ArtikelController();

    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $categorie = 'pluk';
    $afbeelding = $_POST['afbeelding'];

    $voegToe->voegArtikelToe($naam, $omschrijving, $prijs, $afbeelding, $categorie);
}

if (isset($_GET['delete'])) {
    $verwijder = new ArtikelController();
    $id = $_GET['delete'];
    $verwijder->verwijderArtikel($id);


}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM artikel WHERE idartikel=$id";
    $result = $dbh->query($sql);

    while ($row = $result->fetch_assoc()) {
        $naam = $row['naam'];
        $omschrijving = $row['omschrijving'];
        $prijs = $row['prijs'];
        $afbeelding = $row['afbeelding'];
        $categorie = $row['categorie'];
    }
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
       style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
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
        echo "<tr><th style='font-size: 17px;'>" . $row["idartikel"] . "</th><td style='font-size: 17px; text-align: left;'>" . $row["naam"] . "</td><td style='font-size: 17px; text-align: left; margin-left: 50px;'>" . $row["omschrijving"] . "</td><td style='font-size: 17px; text-align: left;'>" . $row["prijs"] . "</td><td style='font-size: 17px; text-align: left; padding-left: 25px;'>" . $row["categorie"] . "</td></td>";
        echo "<td><span data-toggle='modal' data-target='#toevoegModal" . $row["idartikel"] . "' style='font-size: 20px; margin-right: -140px; text-align: center; cursor: pointer;'>Bewerken</span><a href='index.php?delete=" . $row["idartikel"] . "' id='mybutton' style='cursor: pointer; float: right; margin-right: 20px; color: black;'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></a></td></tr>";
    }

    ?>
    </tbody>
</table>
<!--<div class="modal fade" id="myModal" role="dialog">-->
<!--    <div class="modal-dialog modal-dialog-centered">-->
<!--         Modal content-->
<!--        <div class="modal-content" style="border: 2px solid black;">-->
<!--            <div class="modal-header">-->
<!--                <h4 style="margin-left: 200px; font-style: normal;">Let op!</h4>-->
<!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <h4 class="modal-title" style="margin-bottom: 30px;">--><?php //echo $id?><!--Weet u zeker dat u dit artikel wilt verwijderen?</h4>-->
<!--                <a id="confirm-button">-->
<!--                    <input class="button button4" style="margin-right: 30px; background-color: #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" id="confirm-button"-->
<!--                           type="submit" name="verwijder" value="ja">-->
<!--                </a>-->
<!--                <input class="button button4" style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"-->
<!--                       type="button" name="nee" value="nee"-->
<!--                       data-dismiss="modal">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<?php


?>

<!-- Modal toevoegen -->
<div class="modal fade" id="toevoegModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content" style="border: 2px solid black;">
            <div class="modal-header" style="text-align: center;">
                <h4 style="margin-left: 100px; font-style: normal;">Artikel toevoegen/bewerken</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input type="text" class="form-control form-rounded" name="naam" id="naam"
                                   placeholder="Naam" value="<?php echo $naam ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <textarea class="form-control form-rounded" name="omschrijving" id="omschrijving" rows="3"
                                      placeholder="Omschrijving" value="<?php echo $omschrijving ?>"></textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-6">
                            <input type="text" class="form-control form-rounded" name="prijs" id="prijs"
                                   placeholder="Prijs" value="<?php echo $prijs ?>">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control form-rounded" name="categorie" id="categorie"
                                   placeholder="Categorie" value="<?php echo $categorie ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input style=" height: 35px;" type="file" class="form-control form-rounded"
                                   name="afbeelding" id="afbeelding" value="<?php echo $afbeelding ?>">
                        </div>
                    </div>
                    <input class="button button4"
                           style="width: 100px; background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                           type="submit" name="submit" value="opslaan">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function edit() {
        // select the row that's concerned
        var row = btn.parentNode.parentNode;

        // select the name of this row
        var idartikel = row.children[0].textContent;
    }
</script>
