<?php


class LoginController
{
    public function getLogin($gebruikersnaam, $wachtwoord)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';

        $dbh = new PDO('mysql:host=localhost; dbname=flowerpower; port=3306', $user, $pass);

        $inloggenMedewerker = $dbh->query("select * from medewerker where email = '$gebruikersnaam' and wachtwoord = '$wachtwoord'")
        or die("Error while searching");

        $inloggenKlant = $dbh->query("select * from klant where email = '$gebruikersnaam' and wachtwoord = '$wachtwoord'")
        or die("Error while searching");

        if ($inloggenMedewerker->fetch()) {
            $_SESSION['medewerker'] = $gebruikersnaam;
            header('location: ../dashboard/index.php');
        } elseif ($inloggenKlant->fetch()) {
            $_SESSION['gebruiker'] = $gebruikersnaam;
            header('location: ../profiel/index.php');
        } else {
            echo "Sorry geen toegang!";
        }

    }

    public function getAanmelding($naam, $tussenvoegsel, $achternaam, $telefoonnummer, $gebruikersnaam, $wachtwoord)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "insert into klant (idklant, naam, tussenvoegsel, achternaam, adres, huisnummer, postcode, plaats, telefoon, email, geboortedatum, wachtwoord) VALUES (idklant, '$naam', '$tussenvoegsel', '$achternaam', '', 0, '', '', $telefoonnummer, '$gebruikersnaam', '', '$wachtwoord')";

        if (mysqli_query($dbh, $sql)) {
            $_SESSION['gebruiker'] = $gebruikersnaam;
            header('location: ../profiel/index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }
}