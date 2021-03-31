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
<div class="row" style="margin-top: 100px">
    <div class="column">
        <div class="card rounded">
            <div class="row">
                <div class="column" style="width: 48%">
                    <div class="card-body">
                        <h2 class="card-title" style="float:left; margin-left: 22px;">Contact</h2>
                        <div class="card-text" style="margin-top: 50px;">
                            <h3 class="card-text" style="float: left; margin-bottom: 50px; margin-left: -90px;">Mail ons</h3>
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
                                        <input type="tel" class="form-control" name="telefoon"
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
                                        <button style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" class="btn btn-info btn-lg" type="submit" name="submit" value="opslaan" id="myBtn">
                                            Opslaan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="vl"></div>
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
                                        <h4 class="card-title">FlowerPower! Hoofdkandoor</h4>
                                        <p class="card-text" style="margin-top: 50px;">Straat Huisnummer</p>
                                        <p class="card-text">Postcode Plaats</p>
                                        <p class="card-text">Email</p>
                                        <p class="card-text">Telefoonnummer</p>

                                        <h4 class="card-title" style="margin-top: 50px;">Openingstijden</h4>
                                        <p class="card-text">Dag - Tijd</p>
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
