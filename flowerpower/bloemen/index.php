<?php
require '../Controllers/BloemenController.php';
include 'header.html';
require "../default/dbh.php";
?>
<div class="row" style="margin-top: 100px; margin-bottom: 400px;">
    <div class="column">
        <form action="index.php" method="post">
            <div class="card active1">
                <button style="border: none; background-color: white;" type="submit" value="alle" name="alle" id="alle">
                    <img src="images/alle-boeketten.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Alle boeketten</div>
                </button>
            </div>
        </form>
    </div>

    <div class="column">
        <form action="index.php" method="post">
            <div class="card">
                <button style="border: none; background-color: white;" type="submit" value="pluk" name="pluk" id="pluk">
                    <img src="images/plukboeket.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Plukboeketten</div>
                </button>
            </div>
        </form>
    </div>

    <div class="column">
        <form action="index.php" method="post">
            <div class="card">
                <button style="border: none; background-color: white;" type="submit" value="voorjaars" name="voorjaars" id="voorjaars">
                    <img src="images/voorjaars.jpg" style="height: 200px; width: 100%;">
                    <div class="centered">Voorjaars boeketten</div>
                </button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['pluk'])) {
        $categorie = $_POST['pluk'];
        $sql = "SELECT * FROM artikel where categorie is $categorie";
    } elseif (isset($_POST['voorjaars'])) {
        $categorie = $_POST['voorjaars'];
        $sql = "SELECT * FROM artikel where categorie is $categorie";
    } else {
        $sql = "SELECT * FROM artikel";
    }

    $result = $dbh -> query($sql);

    if ($result) {
        while ($row = $result -> fetch_assoc()) {
            echo "<div class='column1'>";
            echo "<a href='bloem.php'>";
            echo "<div class='card1'>";
            echo "<img src='" . $row["afbeelding"] . "'>";
            echo "<h3 class='h3'>" . $row["naam"] . "</h3>";
            echo "</div></a></div>";
        }
    }
    ?>
</div>
</body>
</div>
</html>