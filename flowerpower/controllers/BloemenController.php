<?php


class BloemenController
{

    public function getBloemenLijst($sql)
    {
        $host = 'localhost';
        $user = 'flowerpower_roc_dev_nl_flowerpower';
        $pass = '9GrVD4w2948H';
        $dbnaam = "flowerpower_roc_dev_nl_flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['pluk']) == 'pluk') {
            $sql = "select * from artikel where categorie is 'pluk'";
        } elseif (isset($_POST['voorjaar']) == 'voorjaar') {
            $sql = "select * from artikel where categorie is 'voorjaar'";
        } elseif (isset($_POST['alle']) == 'alle'){
            $sql = "select * from artikel";
        }

        if ($result = $dbh -> query($sql)) {
            while ($row = $result -> fetch_row()) {
                ?>
                <div class="column">
                    <div class="card">
                        <h3><?php printf ( $row[1] ); ?></h3>
                        <p><?php printf ( $row[2] ); ?></p>
                    </div>
                </div>
                <?php
            }
            $result -> free_result();
        }

    }
}