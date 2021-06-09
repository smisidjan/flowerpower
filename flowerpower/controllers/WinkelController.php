<?php


class WinkelController
{
    public function voegWinkelToe($naam, $adres, $huisnummer, $postcode, $plaats, $telefoonnummer, $email, $afbeelding) {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "insert into winkel (idwinkel, naam, adres, huisnummer, postcode, plaats, telefoon, email, afbeelding) VALUES (idwinkel, '$naam', '$adres', '$huisnummer', '$postcode', '$plaats', '$telefoonnummer', '$email', '$afbeelding')";

        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 100px;' class='alert alert-success'><strong>Gelukt!</strong> De winkel is toegevoegd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

    public function wijzigWinkel($idwinkel, $naam, $adres, $huisnummer, $postcode, $plaats, $telefoonnummer, $email, $afbeelding) {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (!empty($naam)) {
            $naam = $_POST['naam'];
        } else {
            $naam = " ";
        }
        if (!empty($tussenvoegsel)) {
            $tussenvoegsel = $_POST['tussenvoegsel'];
        } else {
            $tussenvoegsel = " ";
        }
        if (!empty($achternaam)) {
            $achternaam = $_POST['achternaam'];
        } else {
            $achternaam = " ";
        }
        if (!empty($rol)) {
            $rol = $_POST['rol'];
        } else {
            $rol = " ";
        }
        if (!empty($email)) {
            $email = $_POST['email'];
        } else {
            $email = " ";
        }
        if (!empty($telefoonnummer)) {
            $telefoonnummer = $_POST['telefoonnummer'];
        } else {
            $telefoonnummer = " ";
        }
        if (!empty($geboortedatum)) {
            $geboortedatum = $_POST['geboortedatum'];
        } else {
            $geboortedatum = " ";
        }

        $sql = "UPDATE winkel
         SET  
             naam = $naam,
             tussenvoegsel = $tussenvoegsel, 
             achternaam = $achternaam, 
             rol= $rol, 
             email = $email,
             telefoonnummer = $telefoonnummer, 
             geboortedatum = $geboortedatum
             WHERE idmedewerker = $idwinkel";


        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 100px;' class='alert alert-success'><strong>Gelukt!</strong> De winkel is gewijzigd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

    public function verwijderWinkel($id)
    {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM winkel WHERE idwinkel=$id";

        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 100px;' class='alert alert-danger'><strong>Letop!</strong> Winkel $id is verwijderd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }
}