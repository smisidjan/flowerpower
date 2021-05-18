<?php

class ArtikelController
{

    public function voegArtikelToe($naam, $omschrijving, $prijs, $afbeelding, $idcategorie)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT FROM categorie WHERE idcategorie=$idcategorie";

        $sql = "insert into artikel (idartikel, naam, omschrijving, prijs, afbeelding, idcategorie) VALUES (idartikel, '$naam', '$omschrijving', '$prijs', '$afbeelding', '$idcategorie')";

        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 5px;' class='alert alert-success'><strong>Gelukt!</strong> Artikel <strong>$naam</strong> is toegevoegd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

    public function wijzigArtikel($idartikel, $naam, $omschrijving, $prijs,$afbeelding, $categorie) {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE artikel
         SET  
             naam = '$naam',
             omschrijving = '$omschrijving', 
             prijs = '$prijs', 
             afbeelding = '$afbeelding', 
             categorie = '$categorie'
             WHERE idartikel = $idartikel";


        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 5px;' class='alert alert-success'><strong>Gelukt!</strong> Het artikel is gewijzigd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

    public function verwijderArtikel($id)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM artikel WHERE idartikel=$id";

        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 5px;' class='alert alert-danger'><strong>Letop!</strong> Artikel $id is verwijderd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

}