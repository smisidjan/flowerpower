<?php

class ProfielController
{

    public function bewerkGegevens($idklant, $naam, $tussenvoegsel, $achternaam, $gebruikersnaam)
    {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE klant 
            set 
                naam = '$naam',
                tussenvoegsel = '$tussenvoegsel',
                achternaam = '$achternaam',
                email = '$gebruikersnaam'
            where idklant = $idklant ";

        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 70px; text-align: center;' class='alert alert-success'><strong>Gelukt!</strong> Gegevens zijn gewijzigd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

}