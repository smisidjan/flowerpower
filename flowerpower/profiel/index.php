<?php
include "../Controllers/LoginController.php";
session_start();


if (isset($_SESSION['gebruiker'])) {
if (isset($_GET['loguit'])) {
    $_SESSION = array();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../default/css/menu.css">
</head>
<div class="card" style="border: 1px solid #FF6F83; width: 100%; height: 150%; margin-bottom: 100px;">
    <div class="container1" style="float: right;">
        <div class="topnav" style="float: right; width: 600px; background-color: white;">
            <a href="../default/index.php">Home</a>
            <a href="../bloemen/index.php">Bloemen</a>
            <a href="../gelegenheid/index.php">Gelegenheid</a>
            <a href="../contact/index.php" style="margin-right: 50px;">Contact</a>
            <a class="active" href="../login/index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </a>
            <a href="../winkelmand/index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                     class="bi bi-basket-fill" viewBox="0 0 16 16">
                    <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
                </svg>
            </a>
        </div>
    </div>
    <body>
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-sm-2" style="margin-left: 120px">
                <div class="card" style="border: 2px solid #FF6F83">
                    <div class="card-body">
                        <p class="card-text"><a href="index.php">Mijn account</a></p>
                        <p class="card-text"><a href="index.php">Mijn gegevens wijzigen</a></p>
                        <p class="card-text"><a href="index.php">Mijn bestellingen</a></p>
                        <p class="card-text"><a href="index.php?loguit">Loguit</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8" style="margin-left: 50px">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="text-align: center; border-bottom: 1px solid #707070;">Mijn
                            account</h3>
                        <h5>Hallo meneer/mevrouw! </h5>
                        <p class="card-text" style="border-bottom: 1px solid #707070;">Uw accountpagina biedt u een
                            overzicht van al uw recente activiteiten.
                            U kunt uw bestellingen inzien, u gemakkelijk aan- en afmelden voor onze nieuwsbrief.
                            Selecteer een link hieronder om gegevens te bekijken en te bewerken.</p>
                        <h5>Mijn gegevens wijzigen</h5>
                        <h6>Contact gegevens</h6>
                        <?php
                        echo $_SESSION['gebruiker'];
                        ?>
                        <br>
                        <p class="card-text" style="margin-bottom: -3px"><a href="profiel.php">Gegevens wijzigen</a></p>
                        <p class="card-text"><a href="profiel.php">Wachtwoord wijzigen</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</div>
</html>
    <?php
} else {
    header('location: ../default/index.php');
}
?>