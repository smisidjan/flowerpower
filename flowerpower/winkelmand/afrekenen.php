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
                        <h2 class="card-title" style="float:left; margin-left: 22px; margin-bottom: 50px;">
                            Bezorging</h2>
                        <div class="card-text" style="margin-top: 50px;">
                            <br>
                            <form action="index.php" method="post">
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="naam" placeholder="Naam"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="achternaam"
                                                   placeholder="Achternaam" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="telefoon"
                                               placeholder="Telefoonnummer">
                                    </div>
                                </div>
                                </div>
                                <br>
                                <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="email" class="form-control" name="email"
                                               placeholder="E-mailadres" required>
                                    </div>
                                </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="adres" placeholder="Adres"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="huisnummer"
                                                   placeholder="Huisnummer" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="postcode"
                                                   placeholder="Postcode" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="woonplaats"
                                                   placeholder="Woonplaats" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="date" class="form-control" name="datum"
                                               placeholder="Datum" required>
                                    </div>
                                </div>
                                </div>
                                <hr class="solid" style="margin-top: 30px;">
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
                <div class="column" style="width: 48%">
                    <div class="card-body">
                        <h2 class="card-title" style="float:left; margin-left: 22px;">Betaling</h2>
                        <div class="card-text" style="margin-top: 50px;">

                            <div class="row" style="margin-top: 100px">
                                <div class="column" style="width: 50%;">
                                </div>
                                <div class="column" style="width: 50%">
                                    <div class="card-body" style="text-align: left">

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
