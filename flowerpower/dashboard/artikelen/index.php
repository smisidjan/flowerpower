<?php
include "header.html";
include "../../Controllers/ArtikelController.php";
require "verwijderArtikel.php";

if (isset($_POST['submit'])) {
    $voegToe = new ArtikelController();

    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $categorie = 'pluk';
    if (isset($_POST['afbeelding'])) {
        $afbeelding = $_POST['afbeelding'];
    } else {
        $afbeelding = null;
    }

    $voegToe->voegArtikelToe($naam, $omschrijving, $prijs, $categorie, $afbeelding);
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
<table class="table rounded" style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <thead style="background-color: #C3DF0E;">
    <tr style="text-align: center;">
        <th scope="col" style='font-size: 17px;'>Artikel nr</th>
        <th scope="col" style='font-size: 17px; text-align: left; padding-left: 80px;'>Naam</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Beschrijving</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Prijs</th>
        <th scope="col" style='font-size: 17px; text-align: left; padding-left: 25px;'>Categorie</th>
        <th scope="col"><button class="button button4" data-toggle="modal" data-target="#toevoegModal">Toevoegen</button></th>
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

        $sql = "SELECT * FROM artikel";
        $result = $dbh -> query($sql);
        $row_count = $result->num_rows;
        while ($row = $result -> fetch_assoc()) {
            echo "<tr><th style='font-size: 17px;'>" . $row["idartikel"] . "</th><td style='font-size: 17px; text-align: left; padding-left: 80px;'>" . $row["naam"] . "</td><td style='font-size: 17px; text-align: left;'>" . $row["omschrijving"] . "</td><td style='font-size: 17px; text-align: left;'>" . $row["prijs"] . "</td><td style='font-size: 17px; text-align: left; padding-left: 25px;'>" . $row["categorie"] . "</td></td>";
            echo "<td><span data-toggle='modal' data-target='#toevoegModal' style='font-size: 20px; text-align: center; margin-right: -250px; cursor: pointer;'>Bewerken</span><a data-toggle='modal' data-target='#myModal' data-id='".$row["idartikel"]."' href='javascript:void(0)' id='mybutton' style='cursor: pointer; float: right; margin-right: 20px; color: black;'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></a></td></tr>";
        }

        ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content" style="border: 2px solid black;">
            <div class="modal-header">
                <h4 style="margin-left: 200px; font-style: normal;">Let op!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" style="margin-bottom: 30px;">Weet u zeker dat u dit artikel wilt verwijderen?</h4>
                <a id="confirm-button">
                    <input class="button button4" style="margin-right: 30px; background-color: #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" id="confirm-button"
                           type="submit" name="verwijder" value="ja">
                </a>
                <input class="button button4" style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                       type="button" name="nee" value="nee"
                       data-dismiss="modal">
            </div>
        </div>
    </div>
</div>

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
                            <input type="text" class="form-control form-rounded" name="naam" placeholder="Naam">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <textarea class="form-control form-rounded" name="omschrijving" rows="3" placeholder="Omschrijving"></textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-6">
                            <input type="text" class="form-control form-rounded" name="prijs" placeholder="Prijs">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control form-rounded" name="categorie" placeholder="categorie">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input style=" height: 35px;" type="file" class="form-control form-rounded" name="afbeelding">
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
    $('#mybutton').click(function(){
        var ID = $(this).data('id');
        $('#confirm-button').data('id', ID); //set the data attribute on the modal button
    });

    $('#confirm-button').click(function(){
        var ID = $(this).data('id');
        $.ajax({
            url: "<?php echo base_url(); ?>verwijderArtikel.php"+ID,
            type: "post",
            data: ID,
            success: function (data) {
                $("#confirm_delete_modal").modal('hide');
                $("#deleted").modal('show');

            }
        });
    });
</script>
