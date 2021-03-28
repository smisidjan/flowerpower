<?php
include "header.html";

?>
<h3 style="text-align: left; margin-bottom: 10px;">Overzicht medewerkers</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43;">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43;">FlowerPower</a></li>
        <li class="breadcrumb-item active" aria-current="page">Overzicht medewerkers</li>
    </ol>
</nav>
<table class="table rounded" style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <thead style="background-color: #C3DF0E;">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">E-mailadres</th>
        <th scope="col">Telefoonnummer</th>
        <th scope="col">Rol</th>
        <th scope="col"><button class="button button4" data-toggle="modal" data-target="#toevoegModal">Toevoegen</button></th>
    </tr>
    </thead>
    <tbody>
        <?php
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $dbnaam = "flowerpower";

        $dbh = mysqli_connect($host, $user, $pass, $dbnaam);
        if (!$dbh) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM medewerker";
        $result = $dbh -> query($sql);
        $row_count = $result->num_rows;
        while ($row = $result -> fetch_assoc()) {
            echo "<tr><th>" . $row["idmedewerker"] . "</th><td>" . $row["naam"], $row["tussenvoegsel"], $row["achternaam"] . "</td><td>" . $row["email"] . "</td><td>" . $row["telefoonnummer"] . "</td><td><button class='button button4' style='background-color: white; border: 1px solid #FF6F83; width: 150px; color: #707070;'>" . $row["rol"] . "</button></td></td>";
            echo "<td><span data-toggle='modal' data-target='#toevoegModal' style='font-size: 20px; text-align: center; margin-right: -100px;'>Bewerken</span><span data-toggle='modal' data-target='#myModal' style='cursor: pointer; float: right; margin-right: 20px;'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></span></td></tr>";
        }
        ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content" style="border: 2px solid black;">
            <div class="modal-header">
                <h4 style="margin-left: 200px; font-style: normal;">Let op!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" style="margin-bottom: 30px;">Weet u zeker dat u deze medewerker wilt verwijderen?</h4>
                <input class="button button4" style="margin-right: 30px; background-color: #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                       type="button" name="ja" value="ja"
                       data-dismiss="modal">
                <input class="button button4" style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                       type="button" name="nee" value="nee"
                       data-dismiss="modal">
            </div>
        </div>
    </div>
</div>

<!-- Modal toevoegen -->
<div class="modal fade" id="toevoegModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content" style="border: 2px solid black;">
            <div class="modal-header" style="text-align: center;">
                <h4 style="margin-left: 100px; font-style: normal;">Medewerker toevoegen/bewerken</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input class="button button4" style="width: 100px; background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                       type="button" name="opslaan" value="opslaan"
                       data-dismiss="modal">
            </div>
        </div>
    </div>
</div>