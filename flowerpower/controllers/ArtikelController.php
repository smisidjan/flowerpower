<?php


class ArtikelController
{
    public function voegArtikelToe($naam, $omschrijving, $prijs, $afbeelding, $categorie) {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "insert into artikel (idartikel, naam, omschrijving, prijs, afbeelding, categorie) VALUES (idartikel, '$naam', '$omschrijving', '$prijs', '$afbeelding', '$categorie')";

        if (mysqli_query($dbh, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

}