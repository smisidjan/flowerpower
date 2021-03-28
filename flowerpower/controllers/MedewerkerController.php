<?php


class MedewerkerController
{
    public function voegMedewerkerToe($naam, $tussenvoegsel, $achternaam, $rol, $email, $telefoonnummer, $geboortedatum) {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "insert into medewerker (idmedewerker, naam, tussenvoegsel, achternaam, rol, wachtwoord, email, telefoonnummer, geboortedatum) VALUES (idmedewerker, '$naam', '$tussenvoegsel', '$achternaam', '$rol', wachtwoord, '$email', '$telefoonnummer', '$geboortedatum')";

        if (mysqli_query($dbh, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

}