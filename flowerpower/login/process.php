<?php

session_start();
$error = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['wachtwoord'])) {
        $error = "Gebruikersnaam en wachtwoord is incorrect";
    } else {
        $gebruikersnaam = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];

        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $inloggenMedewerker = $dbh->query("select * from medewerker where email = '$gebruikersnaam' and wachtwoord = '$wachtwoord'")
        or die("Error while searching");

        $inloggenKlant = $dbh->query("select * from klant where email = '$gebruikersnaam' and wachtwoord = '$wachtwoord'")
        or die("Error while searching");

        $stmt = $dbh->prepare($inloggenKlant);
        $stmt->bind_param("ss", $gebruikersnaam, $wachtwoord);
        $stmt->execute();
        $stmt->bind_result($gebruikersnaam, $wachtwoord);
        $stmt->store_result();

        if ($stmt->fetch()) {
            $_SESSION['login'] = $gebruikersnaam;
            header("location: ./profiel/index.php");
        } else {
            $error = "Gebruikersnaam en wachtwoord is incorrect";
        }
        mysqli_close($dbh);
    }
}