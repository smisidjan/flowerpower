<?php
require '../Controllers/BloemenController.php';
include 'header.html';
require "../default/dbh.php";
?>
<div class="row" style="margin-top: 100px; margin-bottom: 400px;">
    <div class="column">
        <form action="index.php" method="post">
            <div class="card active1">
                <button style="border: none; background-color: white;" type="submit" value="bedankt" name="bedankt" id="bedankt">
                    <img src="images/bedankt.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Bedankt</div>
                </button>
            </div>
        </form>
    </div>

    <div class="column">
        <form action="index.php" method="post">
            <div class="card">
                <button style="border: none; background-color: white;" type="submit" value="beterschap" name="beterschap" id="beterschap">
                    <img src="images/beterschap.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Beterschap</div>
                </button>
            </div>
        </form>
    </div>

    <div class="column">
        <form action="index.php" method="post">
            <div class="card">
                <button style="border: none; background-color: white;" type="submit" value="geboorte" name="geboorte" id="geboorte">
                    <img src="images/geboorte.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Geboorte</div>
                </button>
            </div>
        </form>
    </div>

    <div class="column">
        <form action="index.php" method="post">
            <div class="card">
                <button style="border: none; background-color: white;" type="submit" value="gefeliciteerd" name="gefeliciteerd" id="gefeliciteerd">
                    <img src="images/gefeliciteerd.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Gefeliciteerd</div>
                </button>
            </div>
        </form>
    </div>

    <div class="column">
        <form action="index.php" method="post">
            <div class="card">
                <button style="border: none; background-color: white;" type="submit" value="liefde" name="liefde" id="liefde">
                    <img src="images/liefde.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Liefde</div>
                </button>
            </div>
        </form>
    </div>

    <div class="column">
        <form action="index.php" method="post">
            <div class="card">
                <button style="border: none; background-color: white;" type="submit" value="uitvaart" name="uitvaart" id="uitvaart">
                    <img src="images/uitvaart.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Uitvaart</div>
                </button>
            </div>
        </form>
    </div>

    <?php
    $sql = "SELECT * FROM artikel";

    if (isset($_POST['beterschap'])) {
        $categorie = $_POST['beterschap'];
        $sql = "SELECT * FROM artikel where categorie is $categorie";
    } elseif (isset($_POST['geboorte'])) {
        $categorie = $_POST['geboorte'];
        $sql = "SELECT * FROM artikel where categorie is $categorie";
    } elseif (isset($_POST['gefeliciteerd'])) {
        $categorie = $_POST['gefeliciteerd'];
        $sql = "SELECT * FROM artikel where categorie is $categorie";
    } elseif (isset($_POST['liefde'])) {
        $categorie = $_POST['liefde'];
        $sql = "SELECT * FROM artikel where categorie is $categorie";
    } elseif (isset($_POST['uitvaart'])) {
        $categorie = $_POST['uitvaart'];
        $sql = "SELECT * FROM artikel where categorie is $categorie";
    }

    $result = $dbh -> query($sql);

    if ($result) {
        while ($row = $result -> fetch_assoc()) {
            echo "<div class='column1'>";
            echo "<div class='card1'>";
            echo "<img src='" . $row["afbeelding"] . "'>";
            echo "<h3>" . $row["naam"] . "</h3>";
            echo "</div></div>";
        }
    }
    ?>
</div>
</body>
</div>
</html>