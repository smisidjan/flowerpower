<?php
include "../Controllers/LoginController.php";
include '../default/header.php';
session_start();


if (isset($_SESSION['gebruiker'])) {
if (isset($_GET['loguit'])) {
    $_SESSION = array();
    session_destroy();
}
?>
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