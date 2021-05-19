<?php


class MedewerkerController
{
    public function voegMedewerkerToe($naam, $tussenvoegsel, $achternaam, $rol, $email, $telefoonnummer, $geboortedatum) {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "insert into medewerker (idmedewerker, naam, tussenvoegsel, achternaam, rol, wachtwoord, email, telefoonnummer, geboortedatum) VALUES (idmedewerker, '$naam', '$tussenvoegsel', '$achternaam', '$rol', '0000', '$email', '$telefoonnummer', '$geboortedatum')";

        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 5px;' class='alert alert-success'><strong>Gelukt!</strong> De medewerker is toegevoegd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

    public function wijzigMedewerker($idmedewerker, $naam, $tussenvoegsel, $achternaam, $rol, $email, $telefoonnummer, $geboortedatum) {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE medewerker
         SET  
             naam = '$naam',
             tussenvoegsel = '$tussenvoegsel', 
             achternaam = '$achternaam', 
             rol = '$rol', 
             email = '$email',
             telefoonnummer = '$telefoonnummer', 
             geboortedatum = '$geboortedatum'
             WHERE idmedewerker = $idmedewerker";


        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 5px;' class='alert alert-success'><strong>Gelukt!</strong> De medewerker is gewijzigd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

    public function verwijderMedewerker($id)
    {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM medewerker WHERE idmedewerker=$id";

        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 5px;' class='alert alert-danger'><strong>Letop!</strong> Medewerker $id is verwijderd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }
}