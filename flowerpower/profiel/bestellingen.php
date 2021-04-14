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
                                <th scope="col" style='font-size: 17px; text-align: left;'>Datum</th>
                                <th scope="col" style='font-size: 17px; text-align: left;'>Adres</th>
                                <th scope="col" style='font-size: 17px; text-align: left;'></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM factuur";
                            $result = $dbh->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><th style='font-size: 17px;'>" . $row["idfactuur"] . "</th>";
                                echo "<td style='font-size: 17px; text-align: left;'>" . $row["datum"] . "</td>";

                                $sql1 = 'SELECT * FROM klant WHERE idklant = ' . $row["idklant"] . '.';
                                $result1 = $dbh->query($sql1);

                                while ($row1 = $result1->fetch_assoc()) {
                                    echo "<td style='font-size: 17px; text-align: left;'>" . $row1["adres"] ." ". $row1["huisnummer"] ." ". $row1["postcode"] ." ". $row1["plaats"] ."</td>";
                                }
                                echo "<td style='font-size: 17px; text-align: left;'><a href='factuur.php?id=" . $row["idfactuur"] . "' style='cursor: pointer' class='button button4'>Bekijken</a></td></tr>";

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