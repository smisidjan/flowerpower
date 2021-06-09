<?php

class CategorieController
{

    public function voegCategorieToe($naam, $bg, $afbeelding)
    {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "insert into categorie (idcategorie, naam, bg, afbeelding) VALUES (idcategorie, '$naam', '$bg', '$afbeelding')";

        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 100px;' class='alert alert-success'><strong>Gelukt!</strong> Categorie <strong>$naam</strong> is toegevoegd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

    public function wijzigCategorie($idcategorie, $naam, $bg, $afbeelding) {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE categorie
         SET  
             naam = '$naam',
             bg = '$bg', 
             afbeelding = '$afbeelding', 
             WHERE idcategorie = $idcategorie";


        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 100px;' class='alert alert-success'><strong>Gelukt!</strong> De categorie is gewijzigd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

    public function verwijderCategorie($id)
    {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM categorie WHERE idcategorie=$id";

        if (mysqli_query($dbh, $sql)) {
            echo "<div style='margin-top: 100px;' class='alert alert-danger'><strong>Letop!</strong> Categorie $id is verwijderd!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

}