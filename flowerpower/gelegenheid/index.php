<?php
require '../Controllers/BloemenController.php';
include 'header.html';
?>
<div class="row" style="margin-top: 100px">
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $dbnaam = "flowerpower";

    $dbh = mysqli_connect($host, $user, $pass, $dbnaam);

    if (!$dbh) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "select * from artikel";

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
    ?>
</div>
</body>
</div>
</html>