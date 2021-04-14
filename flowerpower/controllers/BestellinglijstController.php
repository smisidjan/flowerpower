<?php

class BestellinglijstController
{

    public function wijzigFactuur($idfactuur, $idmedewerker, $afgehaald) {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

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
            echo "<div style='margin-top: 5px;' class='alert alert-success'><strong>Gelukt!</strong> De bestelling is gewijzigd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }
}