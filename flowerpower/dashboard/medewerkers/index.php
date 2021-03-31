<?php
include "header.html";
include "../../Controllers/MedewerkerController.php";

if (isset($_POST['submit'])) {
    $voegToe = new MedewerkerController();

    $naam = $_POST['naam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $rol = $_POST['rol'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $geboortedatum = $_POST['geboortedatum'];

    $voegToe->voegMedewerkerToe($naam, $tussenvoegsel, $achternaam, $rol, $email, $telefoonnummer, $geboortedatum);
}

?>
<h3 style="text-align: left; margin-bottom: 10px;" xmlns="http://www.w3.org/1999/html">Overzicht medewerkers</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43;">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43;">FlowerPower</a></li>
        <li class="breadcrumb-item active" aria-current="page">Overzicht medewerkers</li>
    </ol>
</nav>
<table class="table rounded"
       style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 20rem;">
    <thead style="background-color: #C3DF0E; border-radius: 20rem;">
    <tr>
        <th scope="col" style='font-size: 17px;'>#</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Naam</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>E-mailadres</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Telefoonnummer</th>
        <th scope="col" style='font-size: 17px; padding-left: 90px;'>Rol</th>
        <th scope="col">
            <button class="button button4" data-toggle="modal" data-target="#toevoegModal">Toevoegen</button>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    require "../../default/dbh.php";

    $sql = "SELECT * FROM medewerker";
    $result = $dbh->query($sql);
    $row_count = $result->num_rows;
    while ($row = $result->fetch_assoc()) {
        echo "<tr><th style='font-size: 17px;'>" . $row["idmedewerker"] . "</th><td style='font-size: 17px; text-align: left;'>" . $row["naam"] ." ". $row["tussenvoegsel"] ." ". $row["achternaam"] . "</td><td style='font-size: 17px; text-align: left;'>" . $row["email"] . "</td><td style='font-size: 17px; text-align: left; margin-left: -50px;'>" . $row["telefoonnummer"] . "</td><td style='font-size: 17px; text-align: left;'><button class='button button4' style='background-color: white; border: 1px solid #FF6F83; width: 150px; color: #707070; cursor: pointer;'>" . $row["rol"] . "</button></td></td>";
        echo "<td><span data-toggle='modal' data-target='#toevoegModal' style='font-size: 20px; text-align: center; margin-right: -100px; cursor:pointer;'>Bewerken</span><span data-toggle='modal' data-target='#myModal' style='cursor: pointer; float: right; margin-right: 20px;'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></span></td></tr>";
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
                <h4 class="modal-title" style="margin-bottom: 30px;">Weet u zeker dat u deze medewerker wilt
                    verwijderen?</h4>
                <input class="button button4"
                       style="margin-right: 30px; background-color: #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                       type="button" name="ja" value="ja"
                       data-dismiss="modal">
                <input class="button button4"
                       style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
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
                <h4 style="margin-left: 100px; font-style: normal;">Medewerker toevoegen/bewerken</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post" name="voegToe">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-8">
                            <input type="text" class="form-control form-rounded" name="naam" placeholder="Naam" required>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control form-rounded" name="tussenvoegsel"
                                   placeholder="Tussenvoegsel">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input type="text" class="form-control form-rounded" name="achternaam"
                                   placeholder="Achternaam" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input type="text" class="form-control form-rounded" name="email"
                                   placeholder="E-mailadres">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-12">
                            <input type="text" class="form-control form-rounded" name="telefoonnummer"
                                   placeholder="Telefoonnummer">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-6">
                            <input type="text" class="form-control form-rounded" name="rol" placeholder="Rol" required>
                        </div>
                        <div class="col-6">
                            <input type="date" class="form-control form-rounded" name="geboortedatum">
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