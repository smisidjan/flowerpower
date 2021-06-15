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

        if (empty($naam)) {
            $naam = " ";
        }
        if (empty($adres)) {
            $adres = " ";
        }
        if (empty($huisnummer)) {
            $huisnummer = " ";
        }
        if (empty($postcode)) {
            $postcode = " ";
        }
        if (empty($plaats)) {
            $plaats = " ";
        }
        if (empty($email)) {
            $email = " ";
        }
        if (empty($telefoonnummer)) {
            $telefoonnummer = " ";
        }
        if (empty($afbeelding)) {
            $afbeelding = "test";
        }

        $sql = "UPDATE winkel
         SET  
             naam = '$naam',
             adres = '$adres', 
             huisnummer = '$huisnummer', 
             postcode= '$postcode', 
             plaats = '$plaats', 
             telefoon = '$telefoonnummer',
             email = '$email',
             afbeelding = '$afbeelding'
             WHERE idwinkel = '$idwinkel'";


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