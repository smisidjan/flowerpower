<?php
session_start();
include "../Controllers/LoginController.php";
include "header.php";

if (isset($_SESSION['medewerker'])) {

?>
<div class="row" style="margin-top: 100px; margin-bottom: 400px;">
    <div class="column">
        <div class="card">
            <h4 style="text-align: left;">Bestellinglijst</h4>
            <hr class="solid" style="margin-top: -8px;">
            <?php
            require "../default/dbh.php";

            $sql = "SELECT * FROM factuur";
            $result = $dbh -> query($sql);
            $row_count = $result->num_rows;

            echo "<div class='total-rows' style='font-size: 55px; text-align: left; margin-left: 150px; margin-bottom: -20px;'>" . $row_count . "</div><p style=''>bestellingen </p>";
            ?>
            <a href="bestellinglijst/index.php" style="text-align: left; text-decoration-line: underline; font-size: 11px;">Bekijk alle bestellingen</a>
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
            <a href="berichten/index.php" style="text-align: left; text-decoration-line: underline; font-size: 11px;">Bekijk alle berichten</a>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <h4 style="text-align: left;">De vestigingen</h4>
            <hr class="solid" style="margin-top: -8px;">
            <?php
            $sql = "SELECT * FROM winkel";
            $result = $dbh -> query($sql);
            $row_count = $result->num_rows;

            echo "<div class='total-rows' style='font-size: 55px; text-align: left; margin-left: 150px; margin-bottom: -20px;'>" . $row_count . "</div><p>winkels </p>";
            ?>
            <a href="winkels/index.php" style="text-align: left; text-decoration-line: underline; font-size: 11px;">Bekijk alle winkels</a>
        </div>
    </div>
    <!---->
    <!--    <div class="column">-->
    <!--        <div class="card">-->
    <!--            <h4 style="text-align: left;">Mijn profiel</h4>-->
    <!--            <hr class="solid" style="margin-top: -8px;">-->
    <!--            <p>Some text</p>-->
    <!--            <p>Some text</p>-->
    <!--        </div>-->
    <!--    </div>-->
</div>
<?php
} else {
    header('location: ../login/index.php');
}
?>