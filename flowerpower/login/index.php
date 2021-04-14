<?php
session_start();
require "../Controllers/LoginController.php";
include "../default/header.php";

if (isset($_POST['login'])) {
    $inloggen = new LoginController();

    $gebruikersnaam = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $inloggen->getLogin($gebruikersnaam, $wachtwoord);
}

if (isset($_POST['registreer'])) {
    $registreer = new LoginController();

    $naam = $_POST['naam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $telefoonnummer = $_POST['telefoon'];
    $gebruikersnaam = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $registreer->getAanmelding($naam, $tussenvoegsel, $achternaam, $telefoonnummer, $gebruikersnaam, $wachtwoord);
}
?>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-sm-6">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center">Inloggen met je FlowerPower account</h4>
                            <br>
                            <div class="card-text">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" name="email" placeholder="Email" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" name="wachtwoord" placeholder="Wachtwoord"  class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" type="submit" name="login" value="verstuur"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="registreren">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center">Account aanmaken</h4><br>
                            <p class="card-text">
                            <div class="row">
                                <div class="col-12 col-m-7">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="naam" placeholder="Naam" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-m-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="tussenvoegsel"
                                               placeholder="Tussenvoegsel">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
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
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-earphone"></i></span>
                                        <input id="telefoon" type="text" class="form-control" name="telefoon"
                                               placeholder="Telefoonnummer">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="email" type="text" class="form-control" name="email"
                                               placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="wachtwoord" type="password" class="form-control" name="wachtwoord"
                                               placeholder="Wachtwoord" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                    </div>
                                </div>
                            </div>
                            <div id="message">
                                <h3>Wachtwoord moet het volgende bevatten:</h3>
                                <p id="letter" class="invalid">Een <b>kleine</b> letter</p>
                                <p id="capital" class="invalid">Een <b>hoofd</b> letter</p>
                                <p id="number" class="invalid">Een <b>nummer</b></p>
                                <p id="length" class="invalid">Minimaal <b>8 karakters</b></p>
                            </div>
                            <br>
                            <div class="form-group">
                                <input style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" type="submit" name="registreer" value="verstuur"
                                       class="form-control">
                            </div>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</div>
<script>
    var myInput = document.getElementById("wachtwoord");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>