<?php


class DefaultController
{
    public function voegBerichtToe($naam, $telefoonnummer, $email, $notitie) {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "insert into contact (idcontact, naam, telefoon, email, notitie) VALUES (idcontact, '$naam', '$telefoonnummer', '$email', '$notitie')";

        if (mysqli_query($dbh, $sql)) {
           echo "<div class='alert alert-success' style='text-align: center; margin-top: 70px'><strong>Bedankt!</strong> Uw email is verzonden!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbh);
        }
    }

}