<?php
include "../header.php";
include "../../Controllers/MedewerkerController.php";
require "../../default/dbh.php";

if (isset($_POST['opslaan'])) {
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

if (isset($_POST['wijzig'])) {
    $wijzig = new MedewerkerController();

    $idmedewerker = $_POST['idmedewerker'];
    if (isset($_POST['naam'])) {
        $naam = $_POST['naam'];
    }
    if (isset($_POST['tussenvoegsel'])) {
        $tussenvoegsel = $_POST['tussenvoegsel'];
    } else { $tussenvoegsel = null;}
    if (isset($_POST['achternaam'])) {
        $achternaam = $_POST['achternaam'];
    }
    if (isset($_POST['rol'])) {
        $rol = $_POST['rol'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['telefoonnummer'])) {
        $telefoonnummer = $_POST['telefoonnummer'];
    } else { $telefoonnummer = null;}
    if (isset($_POST['geboortedatum'])) {
        $geboortedatum = $_POST['geboortedatum'];
    } else { $geboortedatum = null;}

    $wijzig->wijzigMedewerker($idmedewerker, $naam, $tussenvoegsel, $achternaam, $rol, $email, $telefoonnummer, $geboortedatum);
}

if (isset($_GET['delete'])) {
    $verwijder = new MedewerkerController();
    $id = $_GET['delete'];
    $verwijder->verwijderMedewerker($id);
}

?>
<div style="margin-left: 20px; margin-right: 20px;">
<h3 style="text-align: left; margin-bottom: 10px; margin-top: 100px;" xmlns="http://www.w3.org/1999/html">Overzicht medewerkers</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43; font-size: 11px;">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43; font-size: 11px;">FlowerPower</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="font-size: 11px;">Overzicht medewerkers</li>
    </ol>
</nav>
<table class="table rounded"
       style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 20rem;  margin-bottom: 400px;">
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
    $sql = "SELECT * FROM medewerker";
    $result = $dbh->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr><th style='font-size: 17px;'>" . $row["idmedewerker"] . "</th>";
        echo "<td style='font-size: 17px; text-align: left;'>" . $row["naam"] . " " . $row["tussenvoegsel"] . " " . $row["achternaam"] . "</td>";
        echo "<td style='font-size: 17px; text-align: left;'>" . $row["email"] . "</td>";
        echo "<td style='font-size: 17px; text-align: left; margin-left: -50px;'>" . $row["telefoonnummer"] . "</td>";
        echo "<td style='font-size: 17px; padding-left:-50px;'><span class='button button4' style='background-color: white; border: 1px solid #FF6F83; width: 150px; color: #707070;'>" . $row["rol"] . "</span></td></td>";
        echo "<td><span data-toggle='modal' data-target='#toevoegModal" . $row["idmedewerker"] . "' style='font-size: 20px; text-align: center; margin-right: -100px; cursor:pointer;'>Bewerken</span><span data-toggle='modal' data-target='#myModal" . $row["idmedewerker"] . "' style='cursor: pointer; color: black; float: right; margin-right: 20px;'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></span></td></tr>";
    }
    ?>
    </tbody>
</table>
</div>
<?php $sql = "SELECT * FROM medewerker";
$result = $dbh->query($sql);
while ($row = $result->fetch_assoc()) { ?>
    <!-- Modal verwijderen -->
    <div class="modal fade" id="myModal<?php echo $row["idmedewerker"] ?>" role="dialog">
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
                    <a href="index.php?delete=<?php echo $row["idmedewerker"] ?>">
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
<?php $sql = "SELECT * FROM medewerker";
$result = $dbh->query($sql);
while ($row = $result->fetch_assoc()) { ?>
    <!-- Modal bewerken -->
    <div class="modal fade" id="toevoegModal<?php echo $row["idmedewerker"] ?>" role="dialog">
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
                        <input type="hidden" value="<?php echo $row["idmedewerker"] ?>" name="idmedewerker">
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-8">
                                <input type="text" class="form-control form-rounded" name="naam"
                                       value="<?php echo $row["naam"] ?>" required>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-rounded" name="tussenvoegsel"
                                       value="<?php echo $row["tussenvoegsel"] ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-12">
                                <input type="text" class="form-control form-rounded" name="achternaam"
                                       value="<?php echo $row["achternaam"] ?>" required>
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
                                <input type="text" class="form-control form-rounded" name="telefoonnummer"
                                       value="<?php echo $row["telefoonnummer"] ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-6">
                                <select class="form-control form-rounded" name="rol" required>
                                    <option><?php echo $row["rol"] ?></option>
                                    <option value="MEDEWERKER" id="rol">Medewerker</option>
                                    <option value="ADMIN" id="rol">Admin</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control form-rounded" name="geboortedatum"
                                       value="<?php echo $row["geboortedatum"] ?>">
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
                <h4 style="margin-left: 100px; font-style: normal;">Medewerker toevoegen/bewerken</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-8">
                            <input type="text" class="form-control form-rounded" name="naam" placeholder="Naam"
                                   required>
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
                            <select class="form-control form-rounded" name="rol" required>
                                <option>Selecteer een rol</option>
                                <option value="MEDEWERKER" id="rol">Medewerker</option>
                                <option value="ADMIN" id="rol">Admin</option>
                            </select>                        </div>
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

