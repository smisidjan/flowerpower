<?php
session_start();
include "../Controllers/ProfielController.php";
include '../default/dbh.php';
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
                include "header.php";
                ?>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="text-align: center; border-bottom: 1px solid #707070; margin-top: 10px;">Bestellingen</h3>
                        <table class="table rounded"
                               style="margin-top: 20px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 20rem;">
                            <thead style="background-color: #C3DF0E; border-radius: 20rem;">
                            <tr>
                                <th scope="col" style='font-size: 17px;'>#</th>
                                <th scope="col" style='font-size: 17px; text-align: left;'>Naam</th>
                                <th scope="col" style='font-size: 17px; text-align: left;'>Aantal</th>
                                <th scope="col" style='font-size: 17px; text-align: left;'>Prijs</th>
                                <th scope="col" style='font-size: 17px; padding-left: 90px;'>Datum</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM factuur";
                            $result = $dbh->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><th style='font-size: 17px;'>" . $row["idfactuur"] . "</th>";
                                echo "<td style='font-size: 17px; text-align: left;'>" . $row["naam"] . "</td>";
                                echo "<td style='font-size: 17px; text-align: left;'>" . $row["aantal"] . "</td>";
                                echo "<td style='font-size: 17px; text-align: left; margin-left: -50px;'>" . $row["prijs"] . "</td>";
                                echo "<td style='font-size: 17px; text-align: left; margin-left: -50px;'>" . $row["datum"] . "</td>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .hidden {
            display: none;
        }
    </style>
    </body>
    </div>
    </html>
    <?php
} else {
    header('location: ../default/index.php');
}
?>