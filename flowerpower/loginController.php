<?php


class loginController
{

    public function login() {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';

        $gegevens =

        $gebruikersnaam = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];

        $dbh = new PDO('mysql:host=localhost; dbname=flowerpower; port=3306', $user, $pass);

        $inloggen = $dbh->query("select email, wachtwoord from klant where email ='$gebruikersnaam' and wachtwoord = '$wachtwoord'")
        or die("Error while searching");

        if ($inloggen->fetch()) {
            echo "Welkom!";
        } else {
            echo "Sorry geen toegang!";
        }    }
}