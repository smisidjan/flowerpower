<?php
include "../Controllers/LoginController.php";

$inloggen = new Inloggen();

$gebruikersnaam = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$inloggen->getLogin($gebruikersnaam, $wachtwoord);
