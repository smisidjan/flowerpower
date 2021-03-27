<?php
include "../Controllers/LoginController.php";
include "header.html";

$inloggen = new LoginController();

$gebruikersnaam = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$inloggen->getLogin($gebruikersnaam, $wachtwoord);
?>
<div class="row">
    <div class="column">
        <div class="card">
            <h4 style="text-align: left;">Bestellinglijst</h4>
            <hr class="solid" style="margin-top: -8px;">
            <?php
            $host = 'localhost';
            $user = 'root';
            $pass = 'root';
            $dbnaam = "flowerpower";

            $dbh = mysqli_connect($host, $user, $pass, $dbnaam);
            if (!$dbh) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM factuur";
            $result = $dbh -> query($sql);
            $row_count = $result->num_rows;

            echo "<div class='total-rows' style='font-size: 55px; text-align: left; margin-left: 150px; margin-bottom: -20px;'>" . $row_count . "</div><p style=''>bestellingen </p>";
            ?>
            <a href="bestelling/index.php" style="text-align: left; text-decoration-line: underline; font-size: 11px;">Bekijk alle bestellingen</a>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h4 style="text-align: left;">Overzicht artikelen</h4>
            <hr class="solid" style="margin-top: -8px;">
            <?php
            $sql = "SELECT * FROM artikel";
            $result = $dbh -> query($sql);
            $row_count = $result->num_rows;

            echo "<div class='total-rows' style='font-size: 55px; text-align: left; margin-left: 150px; margin-bottom: -20px;'>" . $row_count . "</div><p style=''>artikelen </p>";
            ?>
            <a href="artikelen/index.php" style="text-align: left; text-decoration-line: underline; font-size: 11px;">Bekijk alle artikelen</a>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h4 style="text-align: left;">Overzicht werknemers</h4>
            <hr class="solid" style="margin-top: -8px;">
            <?php
            $sql = "SELECT * FROM medewerker";
            $result = $dbh -> query($sql);
            $row_count = $result->num_rows;

            echo "<div class='total-rows' style='font-size: 55px; text-align: left; margin-left: 150px; margin-bottom: -20px;'>" . $row_count . "</div><p style=''>medewerkers </p>";
            ?>
            <a href="medewerkers/index.php" style="text-align: left; text-decoration-line: underline; font-size: 11px;">Bekijk alle werknemers</a>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h4 style="text-align: left;">Berichten</h4>
            <hr class="solid" style="margin-top: -8px;">
            <?php
            $sql = "SELECT * FROM contact";
            $result = $dbh -> query($sql);
            $row_count = $result->num_rows;

            echo "<div class='total-rows' style='font-size: 55px; text-align: left; margin-left: 150px; margin-bottom: -20px;'>" . $row_count . "</div><p>berichten </p>";
            ?>
            <a style="text-align: left; text-decoration-line: underline; font-size: 11px;">Bekijk alle berichten</a>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h4 style="text-align: left;">Mijn profiel</h4>
            <hr class="solid" style="margin-top: -8px;">
            <p>Some text</p>
            <p>Some text</p>
        </div>
    </div>
</div>

