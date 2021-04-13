<?php
session_start();
require '../Controllers/BloemenController.php';
include '../default/header.php';
require "../default/dbh.php";
?>
<p style="margin-left: 20px; margin-top: 20px; cursor: pointer; margin-top: 100px; text-align: left; font-size: 20px; text-decoration: underline;" data-toggle="collapse" data-target="#bekijk">Bekijk meer</p>
<div class="row">
    <div class="column">
        <form action="index.php" method="post">
            <div class="card <?php if (isset($_POST['bedankt'])) { echo "active1";} ?>">
                <button style="border: none; background-color: white;" type="submit" value="bedankt" name="bedankt"
                        id="bedankt">
                    <img src="images/bedankt.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Bedankt</div>
                </button>
            </div>
        </form>
    </div>
    <div class="column">
        <form action="index.php" method="post">
            <div class="card <?php if (isset($_POST['beterschap'])) { echo "active1";} ?>">
                <button style="border: none; background-color: white;" type="submit" value="beterschap"
                        name="beterschap" id="beterschap">
                    <img src="images/beterschap.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Beterschap</div>
                </button>
            </div>
        </form>
    </div>
    <div class="column">
        <form action="index.php" method="post">
            <div class="card <?php if (isset($_POST['geboorte'])) { echo "active1";} ?>">
                <button style="border: none; background-color: white;" type="submit" value="geboorte" name="geboorte"
                        id="geboorte">
                    <img src="images/geboorte.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Geboorte</div>
                </button>
            </div>
        </form>
    </div>
</div>
<div class="row" style="margin-bottom: 400px;">
    <div class="collapse" id="bekijk" style="width: 100%;">
        <div class="column">
            <form action="index.php" method="post">
                <div class="card <?php if (isset($_POST['gefeliciteerd'])) { echo "active1";} ?>">
                    <button style="border: none; background-color: white;" type="submit" value="gefeliciteerd"
                            name="gefeliciteerd" id="gefeliciteerd">
                        <img src="images/gefeliciteerd.jpg" style="height: 200px; width: 100%;">
                        <div class="centered">Gefeliciteerd</div>
                    </button>
                </div>
            </form>
        </div>
        <div class="column">
            <form action="index.php" method="post">
                <div class="card <?php if (isset($_POST['liefde'])) { echo "active1";} ?>">
                    <button style="border: none; background-color: white;" type="submit" value="liefde" name="liefde"
                            id="liefde">
                        <img src="images/liefde.jpg" style="height: 200px; width: 100%;">
                        <div class="centered">Liefde</div>
                    </button>
                </div>
            </form>
        </div>
        <div class="column">
            <form action="index.php" method="post">
                <div class="card <?php if (isset($_POST['uitvaart'])) { echo "active1";} ?>">
                    <button style="border: none; background-color: white;" type="submit" value="uitvaart"
                            name="uitvaart" id="uitvaart">
                        <img src="images/uitvaart.jpg" style="height: 200px; width: 100%;">
                        <div class="centered">Uitvaart</div>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['beterschap'])) {
        $categorie = $_POST['beterschap'];
        $sql = "SELECT * FROM artikel where categorie = '$categorie'";
    } elseif (isset($_POST['geboorte'])) {
        $categorie = $_POST['geboorte'];
        $sql = "SELECT * FROM artikel where categorie = '$categorie'";
    } elseif (isset($_POST['gefeliciteerd'])) {
        $categorie = $_POST['gefeliciteerd'];
        $sql = "SELECT * FROM artikel where categorie = '$categorie'";
    } elseif (isset($_POST['liefde'])) {
        $categorie = $_POST['liefde'];
        $sql = "SELECT * FROM artikel where categorie = '$categorie'";
    } elseif (isset($_POST['uitvaart'])) {
        $categorie = $_POST['uitvaart'];
        $sql = "SELECT * FROM artikel where categorie = '$categorie'";
    } elseif (isset($_POST['bedankt'])) {
        $sql = "SELECT * FROM artikel where categorie = 'bedankt'";
    }

    if (!empty($sql)) {
        $result = $dbh->query($sql);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='column1' id='cards'>";
                echo "<a href='bloem.php?id=" . $row["idartikel"] . "'>";
                echo "<div class='card1'>";
                echo "<img style='width: 200px; height: 200px; margin-left: -30px; margin-top: -20px; position: relative; float: left;' src='../default/images/" . $row["afbeelding"] . "'>";
                echo "<h3 class='h3'>" . $row["naam"] . "</h3>";
                echo "</div></a></div>";
            }
        }
    }
    ?>
</div>
</body>
</div>