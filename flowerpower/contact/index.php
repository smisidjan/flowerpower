<?php
include 'header.html';
require '../Controllers/DefaultController.php';

if (isset($_POST['submit'])) {
    $voegToe = new DefaultController();

    $naam = $_POST['naam'];
    $telefoonnummer = $_POST['telefoon'];
    $email = $_POST['email'];
    $notitie = $_POST['notitie'];

    $voegToe->voegBerichtToe($naam, $telefoonnummer, $email, $notitie);
}
?>
<div class="row" style="margin-top: 100px; margin-bottom: 200px;">
    <div class="column">
        <div class="card rounded">
            <div class="row">
                <div class="column" style="width: 48%">
                    <div class="card-body">
                        <h2 class="card-title" style="float:left; margin-left: 22px; margin-bottom: 50px;">Mail ons</h2>
                        <div class="card-text" style="margin-top: 50px;">
                            <form action="index.php" method="post">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="naam" placeholder="Naam" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="email" class="form-control" name="email"
                                               placeholder="E-mailadres" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="telefoon"
                                               placeholder="Telefoonnummer">
                                    </div>
                                </div>
                                <br>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <textarea rows="5" name="notitie" class="form-control"
                                                  placeholder="Notitie" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <hr class="solid">
                                <div class="col-4" style="float: right">
                                    <div class="form-group">
                                        <!-- Button trigger modal -->
                                        <button style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); float:right;"
                                                class="btn btn-info btn-lg" type="submit" name="submit" value="opslaan"
                                                id="myBtn">
                                            Opslaan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="vl"></div>
                <?php
                $host = 'localhost';
                $user = 'root';
                $pass = 'root';
                $dbnaam = "flowerpower";

                $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

                if (!$dbh) {
                    die("Connection failed: " . mysqli_connect_error());
                }


                ?>
                <div class="column" style="width: 48%">
                    <div class="card-body">
                        <h2 class="card-title" style="float:left; margin-left: 22px;">Contact</h2>
                        <div class="card-text" style="margin-top: 50px;">

                            <div class="row" style="margin-top: 100px">
                                <div class="column" style="width: 50%;">
                                    <div class="card rounded"
                                         style="height: 300px; border: 1px solid #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                    </div>
                                </div>
                                <div class="column" style="width: 50%">
                                    <div class="card-body" style="text-align: left">
                                        <?php
                                        $sqlHoofd = "select * from winkel where naam = 'Hoofdkantoor'";
                                        $sqlAms = "select * from winkel where naam = 'Stadionplein'";
                                        $sqlDen = "select * from winkel where naam = 'Den Haag CS'";

                                        if ($result = $dbh -> query($sqlHoofd) or $result = $dbh -> query($sqlAms) or $result = $dbh -> query($sqlDen)) {
                                            while ($row = $result -> fetch_assoc()) {
                                                echo "<h4 class='card-title' style='font-size: 19px; font-weight: bold;'>FlowerPower! ".$row['naam']."</h4>";
                                                echo "<p class='card-text' style='margin-top: 40px; font-size: 15px;'>".$row['adres']." ".$row['huisnummer']."</p>";
                                                echo "<p class='card-text' style='font-size: 17px; margin-top: -8px;'>".$row['postcode']." ".$row['plaats']."</p>";
                                                echo "<p class='card-text' style='font-size: 17px; margin-top: -8px;'>".$row['email']."</p>";
                                                echo "<p class='card-text' style='font-size: 17px; margin-top: -8px;'>".$row['telefoon']."</p>";
                                            }
                                            $result -> free_result();
                                        }
                                        ?>
                                        <span><h4 class="card-title" style="margin-top: 40px; font-size: 18px; font-weight: bold;">Openingstijden</h4></span>
                                        <p class="card-text" style="margin-bottom: -6px; font-size: 17px;">Ma/za -<span> 8:30 t/m 18:00</span></p>
                                        <p class="card-text" style="font-size: 17px;">Zo - <span>gesloten</span></p>
                                        </p>
                                    </div>
                                </div>
                            </div>
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
