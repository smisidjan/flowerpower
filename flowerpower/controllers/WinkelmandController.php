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

}