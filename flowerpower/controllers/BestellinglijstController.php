<?php

class BestellinglijstController
{

    public function wijzigFactuur($idfactuur, $idmedewerker, $afgehaald) {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE factuur
         SET  
             idmedewerker = '$idmedewerker',
             afgehaald = '$afgehaald' 
             WHERE idfactuur = $idfactuur";


        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 100px;' class='alert alert-success'><strong>Gelukt!</strong> De bestelling is gewijzigd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }
}