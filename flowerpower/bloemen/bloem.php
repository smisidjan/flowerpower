<?php
include 'header.html';
require "../default/dbh.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM artikel WHERE idartikel=$id";
    $result = $dbh->query($sql);

    while ($row = $result->fetch_assoc()) {

?>
<div class="row">
    <div class="column2">
        <div class="card" style="height: 600px; border-radius: 50px; margin-bottom: 50px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: white;">
                    <li class="breadcrumb-item"><a href="index.php" style="color: #10AB43; font-size: 12px;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 12px;"><?php echo $row['naam'] ?></li>
                </ol>
            </nav>
            <div class="row">
                <div class="column" style="width: 35%; margin-top: 30px;">
                    <div class="card2" style="height: 400px; border-radius: 50px;">
                        <img src="../default/images/<?php echo $row['afbeelding'] ?>" style="width: 100%; height: 100%;">
                    </div>
                </div>

                <div class="column" style="width: 55%; margin-top: 30px; margin-left: 50px;">
                    <div class="card2" style="height: 350px; border-radius: 50px;">
                        <h3 style="font-size: 30px;"><?php echo $row['naam'] ?></h3>
                        <p class="p" style="font-size: 18px;">
                            <?php echo $row['omschrijving'] ?>
                        </p>
                        <hr class="solid">
                        <p style="text-align: left; font-size: 15px; margin-left: 20px;"><?php echo "&euro;".  $row['prijs'].".-" ?></p>
                        <div class="col-4 col-sm-4 col-md-4 p">
                            <div class="quantity">
                                <p>Aantal:
                                    <input style="margin-left: 20px;" type="button" value="-" class="minus">
                                    <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" value="+" class="plus">
                                </p>

                                <button class="button p">In winkelwagen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }}
        ?>