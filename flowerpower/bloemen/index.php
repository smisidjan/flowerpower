<?php
session_start();
require '../Controllers/BloemenController.php';
include 'header.html';
require "../default/dbh.php";
?>
<div class="row" style="margin-top: 100px; margin-bottom: 400px;">
    <a href="#cards" style="width: 100%;">
        <div class="column">
            <form action="index.php" method="post">
                <div class="card <?php if (isset($_POST['alle'])) {
                    echo "active1";
                } ?>">
                    <button style="border: none; background-color: white;" type="submit" value="alle" name="alle"
                            id="alle">
                        <img src="images/alle-boeketten.jpg" style="height: 200px; width: 100%;">
                        <div class="centered">Alle boeketten</div>
                    </button>
                </div>
            </form>
        </div>

        <div class="column">
            <form action="index.php" method="post">
                <div class="card <?php if (isset($_POST['pluk'])) {
                    echo "active1";
                } ?>">
                    <button style="border: none; background-color: white;" type="submit" value="pluk" name="pluk"
                            id="pluk">
                        <img src="images/plukboeket.jpg" style="height: 200px; width: 100%;">
                        <div class="centered">Plukboeketten</div>
                    </button>
                </div>
            </form>
        </div>

        <div class="column">
            <form action="index.php" method="post">
                <div class="card <?php if (isset($_POST['voorjaars'])) {
                    echo "active1";
                } ?>">
                    <button style="border: none; background-color: white;" type="submit" value="voorjaars"
                            name="voorjaars"
                            id="voorjaars">
                        <img src="images/voorjaars.jpg" style="height: 200px; width: 100%;">
                        <div class="centered">Voorjaars boeketten</div>
                    </button>
                </div>
            </form>
        </div>
    </a>
    <?php
    if (isset($_POST['pluk'])) {
        $categorie = $_POST['pluk'];
        $sql = "SELECT * FROM artikel where categorie = '$categorie'";
    } elseif (isset($_POST['voorjaars'])) {
        $categorie = $_POST['voorjaars'];
        $sql = "SELECT * FROM artikel where categorie = '$categorie'";
    } elseif (isset($_POST['alle'])) {
        $sql = "SELECT * FROM artikel";
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
</html>