<?php
session_start();
include '../default/header.php';
require '../Controllers/DefaultController.php';
require '../Controllers/WinkelmandController.php';

if (isset($_POST['nieuw'])) {
    $nieuw = new WinkelmandController();

    $naam = $_POST['naam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $adres = $_POST['adres'];
    $huisnummer = intval($_POST['huisnummer']) ;
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $telefoonnummer = $_POST['telefoon'];
    $geboortedatum = $_POST['geboortedatum'];
    $gebruikersnaam = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $nieuw->afrekenenNieuw($naam, $tussenvoegsel, $achternaam, $adres, $huisnummer, $postcode, $plaats, $telefoonnummer, $geboortedatum, $gebruikersnaam, $wachtwoord);
}

if (isset($_POST['gebruiker'])) {
    $gebruiker = new WinkelmandController();

    $adres = $_POST['adres'];
    $huisnummer = intval($_POST['huisnummer']) ;
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];

    $gebruiker->gebruiker($adres, $huisnummer, $postcode, $plaats);
}
?>
<div class="row" style="margin-top: 100px; margin-bottom: 200px; margin-left: 20px; margin-right: 20px;">
    <div class="column">
        <div class="card rounded">
            <div class="row">
                <div class="column" style="width: 100%">
                    <div class="card-body">
                        <h2 class="card-title" style="float:left; margin-left: 22px;">
                            Bezorging</h2><br>
                        <hr class="solid" style="margin-top: 60px;">
                        <div class="card-text" style="margin-top: 50px;">
                            <br>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <?php if (isset($_SESSION['gebruiker'])) { ?>
                                    <h3 style="text-align: left; margin-top: 20px">Hallo <?php echo $_SESSION['gebruiker']['naam'] . " " . $_SESSION['gebruiker']['achternaam']; ?></h3>
                                    <p style="text-align: left;">Naar welk adres moet het bezorgd worden?</p>
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="adres" placeholder="Adres"
                                                   required>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="huisnummer"
                                                   placeholder="Huisnummer" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="postcode"
                                                   placeholder="Postcode" required>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="plaats"
                                                   placeholder="Woonplaats" required>
                                        </div>
                                    </div>
                                    <hr class="solid" style="margin-top: 30px;">
                                    <div class="col-4" style="float: right">
                                        <div class="form-group">
                                            <!-- Button trigger modal -->
                                            <button style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); float:right;"
                                                    class="btn btn-info btn-lg" type="submit" name="gebruiker" value="opslaan"
                                                    id="myBtn">
                                                Betalen
                                            </button>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="naam" placeholder="Naam"
                                                   required>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="tussenvoegsel"
                                                   placeholder="Tussenvoegsel" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" class="form-control" name="achternaam"
                                                   placeholder="Achternaam" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">

                                            <input type="text" class="form-control" name="telefoon"
                                                   placeholder="Telefoonnummer">
                                        </div>
                                        <div class="col-6">
                                            <input type="email" class="form-control" name="email"
                                                   placeholder="E-mailadres" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="adres" placeholder="Adres"
                                                   required>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="huisnummer"
                                                   placeholder="Huisnummer" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="postcode"
                                                   placeholder="Postcode" required>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="plaats"
                                                   placeholder="plaats" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="date" class="form-control" name="geboortedatum"
                                                   placeholder="Datum">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="password" class="form-control" name="wachtwoord"
                                                   placeholder="Wachtwoord" required>
                                        </div>
                                    </div>
                                    <hr class="solid" style="margin-top: 30px;">
                                    <div class="col-4" style="float: right">
                                        <div class="form-group">
                                            <!-- Button trigger modal -->
                                            <button style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); float:right;"
                                                    class="btn btn-info btn-lg" type="submit" name="nieuw" value="opslaan"
                                                    id="myBtn">
                                                Betalen
                                            </button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</div>
</html>
