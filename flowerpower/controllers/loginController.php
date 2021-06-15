<?php


class LoginController
{
    public function getLogin($gebruikersnaam, $wachtwoord)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $inloggenMedewerker = $dbh->query("select * from medewerker where email = '$gebruikersnaam' and wachtwoord = '$wachtwoord'")
        or die("Error while searching");

        $inloggenKlant = $dbh->query("select * from klant where email = '$gebruikersnaam' and wachtwoord = '$wachtwoord'")
        or die("Error while searching");
        if ($inloggenMedewerker->fetch_assoc()) {
            $_SESSION['medewerker'] = $gebruikersnaam;

            header('location: ../dashboard/index.php');
        } else {
            while ($row = $inloggenKlant->fetch_assoc()) {
                $_SESSION['gebruiker'] = array("idklant" => $row['idklant'], "naam" => $row['naam'], "tussenvoegsel" => $row['tussenvoegsel'], "achternaam" => $row['achternaam'], "adres" => $row['adres'], "huisnummer" => $row['huisnummer'], "postcode" => $row['postcode'], "plaats" => $row['plaats'], "geboortedatum" => $row['geboortedatum'], "gebruikersnaam" => $gebruikersnaam, "wachtwoord" => $wachtwoord);
            }
            header('location: ../profiel/index.php');
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
        $result = $dbh->query($sql);
        $idklant = $dbh->insert_id;


        if (mysqli_query($dbh, $sql)) {
            $_SESSION['gebruiker'] = array("idklant" => $idklant, "naam" => $naam, "tussenvoegsel" => $tussenvoegsel, "achternaam" => $achternaam, "gebruikersnaam" => $gebruikersnaam, "wachtwoord" => $wachtwoord);
            header('location: ../profiel/index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }
}