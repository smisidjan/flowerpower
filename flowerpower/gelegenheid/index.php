<?php
session_start();
require '../Controllers/BloemenController.php';
include '../default/header.php';
require "../default/dbh.php";
?>
<?php
$sql = "SELECT * FROM categorie WHERE bg='GELEGENHEID'";
$result = $dbh -> query($sql);
$row_count = $result->num_rows;
if ($row_count > 3) { ?>
<p style="margin-left: 20px; margin-top: 20px; cursor: pointer; margin-top: 100px; text-align: left; font-size: 20px; text-decoration: underline;" data-toggle="collapse" data-target="#bekijk">Bekijk meer</p>
<div class="row">
<?php } else {?>
<div class="row" style="margin-top: 100px; margin-bottom: 400px;"><?php } ?>
    <a href="#cards" style="width: 100%;">
        <div class="column">
            <form action="index.php" method="post">
                <div class="card <?php if (isset($_POST['alle'])) {
                    echo "active1";
                } ?>">
                    <button style="border: none; background-color: white;" type="submit" value="alle" name="alle"
                            id="alle">
                        <img src="images/beterschap.jpg" style="height: 200px; width: 100%;">
                        <div class="centered">Alle gelegenheid boeketten</div>
                    </button>
                </div>
            </form>
        </div>
        <?php
        $sql = "SELECT * FROM categorie WHERE bg='GELEGENHEID'";
        $result = $dbh->query($sql);
        while ($row = $result->fetch_assoc()) { ?>
            <div class="column">
                <form action="index.php" method="post">
                    <div class="card <?php if (isset($_POST['categorie'])) {
                        echo "active1";
                    } ?>">
                        <button style="border: none; background-color: white;" type="submit" value="<?php echo $row["idcategorie"] ?>" name="categorie"
                                id="categorie">
                            <img src="images/<?php echo $row["idcategorie"] ?>" style="height: 200px; width: 100%;">
                            <div class="centered"><?php echo $row["naam"] ?></div>
                        </button>
                    </div>
                </form>
            </div>
        <?php } ?>
    </a>
    </div>
    <?php
    if (isset($_POST['categorie'])) {
        $categorie = $_POST['categorie'];
        $sql = "SELECT * FROM artikel where categorie = '$categorie'";
    } else {
        $sql = "SELECT * FROM artikel where bg='GELEGENHEID'";
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