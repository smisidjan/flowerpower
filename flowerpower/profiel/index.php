<?php
session_start();
include "../Controllers/LoginController.php";
include '../default/header.php';

if (isset($_SESSION['gebruiker'])) {
if (isset($_GET['loguit'])) {
    $_SESSION = array();
    session_destroy();
    header('location: ../login/index.php');
}
?>
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-sm-4">
                <?php
                require "header.php";
                ?>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="text-align: center; border-bottom: 1px solid #707070; margin-top: 10px;">Mijn
                            account</h3>
                        <h5 style="margin-top: 15px;">Hallo meneer/mevrouw! </h5>
                        <p class="card-text" style="border-bottom: 1px solid #707070;">Uw accountpagina biedt u een
                            overzicht van al uw recente activiteiten.
                            U kunt uw bestellingen inzien, u gemakkelijk aan- en afmelden voor onze nieuwsbrief.
                            Selecteer een link hieronder om gegevens te bekijken en te bewerken.</p>
                        <h5 style="margin-top: 15px;">Mijn gegevens wijzigen</h5>
                        <h6>Contact gegevens</h6>
                        <?php
                        echo "<p>". $_SESSION['gebruiker']['gebruikersnaam']. "</p>";
                        ?>
                        <br>
                        <p class="card-text" style="margin-bottom: -3px;"><a href="gegevens.php">Gegevens wijzigen</a></p>
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