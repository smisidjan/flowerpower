<?php


class WinkelmandController
{
    public function voegArtikelToe($id) {

        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM artikel WHERE idartikel=$id";
        $result = $dbh->query($sql);

        $winkelmand = [];
        $this->winkelmand = $result;

        return $result;
    }

    public function afrekenenNieuw($naam, $tussenvoegsel, $achternaam, $adres, $huisnummer ,$postcode, $plaats ,$telefoonnummer, $geboortedatum, $gebruikersnaam, $wachtwoord) {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        $sql = "insert into klant (idklant, naam, tussenvoegsel, achternaam, adres, huisnummer, postcode, plaats, telefoon, email, geboortedatum, wachtwoord) VALUES (idklant, '$naam', '$tussenvoegsel', '$achternaam', '$adres', '$huisnummer', '$postcode', '$plaats', '$telefoonnummer', '$gebruikersnaam', '$geboortedatum', '$wachtwoord')";
        $result = $dbh->query($sql);
        $idklant = $dbh->insert_id;
        $datum = date('Y-m-d');

        $factuur = "insert into factuur (idfactuur, idklant, datum, afgehaald, idmedewerker, idwinkel) VALUES (idfactuur, '$idklant', '$datum', 'NEE', null, null)";
        $resultFactuur = $dbh->query($factuur);

        if (mysqli_query($dbh, $sql) && mysqli_query($dbh, $factuur)) {
            $_SESSION['gebruiker'] = array("idklant" => "$idklant", "naam" => $naam, "tussenvoegsel" => $tussenvoegsel, "achternaam" => $achternaam, "gebruikersnaam" => $gebruikersnaam, "wachtwoord" => $wachtwoord);
            header('location: ../profiel/bestellingen.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }

        return $result;
    }

    public function gebruiker($adres, $huisnummer, $postcode, $plaats) {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        $datum = date('Y-m-d');
        $idklant = $_SESSION['gebruiker']['idklant'];

        $factuur = "insert into factuur (idfactuur, idklant, datum, afgehaald, idmedewerker) VALUES (idfactuur, '$idklant', '$datum', 'NEE', null)";
        $resultFactuur = $dbh->query($factuur);

        foreach ($_SESSION['cart_item'] as $item){
            $idartikel = $item['idartikel'];
            $idfactuur = $dbh->insert_id;
            $aantal = $_SESSION['totaal'];
            $totaalPrijs = $_SESSION['totaalPrijs'];

            $artikel = "insert into artikel_has_factuur(artikel_idartikel, factuur_idfactuur, aantal, totaalPrijs) VALUES ('$idartikel', '$idfactuur', '$aantal', '$totaalPrijs')";
        }

        if (mysqli_query($dbh, $factuur) && mysqli_query($dbh, $artikel)) {
            header('location: ../profiel/bestellingen.php');
        } else {
            echo "Error: " . $factuur . "<br>" . mysqli_error($dbh);
        }

        return $factuur;
    }

}