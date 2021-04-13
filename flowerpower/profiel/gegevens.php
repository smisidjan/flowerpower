<?php
session_start();
include "../Controllers/ProfielController.php";
include '../default/header.php';

if (isset($_SESSION['gebruiker'])) {
    if (isset($_POST['submit'])) {
        $update = new ProfielController();

        $idklant = $_POST['idklant'];
        $naam = $_POST['naam'];
        $tussenvoegsel = $_POST['tussenvoegsel'];
        $achternaam = $_POST['achternaam'];
        $gebruikersnaam = $_POST['gebruikersnaam'];

        $update->bewerkGegevens($idklant, $naam, $tussenvoegsel, $achternaam, $gebruikersnaam);
    }
    if (isset($_GET['loguit'])) {
        $_SESSION = array();
        session_destroy();
        header('location: ../login/index.php');
    }
    ?>
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-sm-4">
                <?php
                require "header.php";
                ?>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="text-align: center; border-bottom: 1px solid #707070; margin-top: 10px;">Account gegevens bewerken</h3>
                            <div class="card-text" style="margin-top: 50px;">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="idklant" value="<?php echo $_SESSION['gebruiker']['idklant'] ?>">
                            <input type="hidden" name="gebruikersnaam" value="<?php echo $_SESSION['gebruiker']['gebruikersnaam'] ?>">
                            <div class="row">
                                <div class="col-8">
                                    <div class="input-group" style="text-align: left;">
                                        <label for="naam">Naam</label>
                                        <input type="text" class="form-control" name="naam" value="<?php echo $_SESSION['gebruiker']['naam'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group" style="text-align: left;">
                                        <label for="achternaam">Tussenvoegsel</label>
                                        <input type="text" class="form-control" name="achternaam" value="<?php echo $_SESSION['gebruiker']['tussenvoegsel'] ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group" style="text-align: left;">
                                        <label for="achternaam">Achternaam</label>
                                        <input type="text" class="form-control" name="achternaam" value="<?php echo $_SESSION['gebruiker']['achternaam'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                            <div class="col-12">
                                <div class="input-group" style="text-align: left;">
                                    <label for="email">E-mailadres</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['gebruiker']['gebruikersnaam'] ?>" required>
                                </div>
                            </div>
                            </div>
                            <br>

                            <div class="hidden">
                                <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <label for="huidigeWachtwoord">Huidige wachtwoord</label>
                                        <input type="password" class="form-control" name="huidigeWachtwoord" placeholder="Huidige wachtwoord" required>
                                    </div>
                                </div>
                                </div>
                                <br>
                                <div class="row">
                                <div class="col-6">
                                    <div class="input-group">
                                        <label for="wachtwoord" style="text-align: left;">Nieuw wachtwoord</label>
                                        <input type="password" class="form-control" name="wachtwoord" placeholder="Nieuw wachtwoord" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <label for="bevestigWachtwoord">Bevestig nieuw wachtwoord</label>
                                        <input type="password" class="form-control" name="bevestigWachtwoord" placeholder="Bevestig nieuw wachtwoord" required>
                                    </div>
                                </div>
                                </div>
                                <br>
                            </div>
                            <br>
                            <hr class="solid">
                            <div class="col-4" style="float: right">
                                <div class="form-group">
                                    <!-- Button trigger modal -->
                                    <button style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); float:right;"
                                            class="btn btn-info btn-lg" type="submit" name="submit" value="opslaan">
                                        Opslaan
                                    </button>
                                </div>
                            </div>
<!--                            --><?php //var_dump($_SESSION['gebruiker']['idklant']);?>
                        </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .hidden {
            display: none;
        }
    </style>
    </body>
    </div>
    </html>
    <?php
} else {
    header('location: ../default/index.php');
}
?>