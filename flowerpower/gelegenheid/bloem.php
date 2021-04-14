<?php
session_start();
include '../default/header.php';
require_once("../winkelmand/dbcontroller.php");
$db_handle = new DBController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $db_handle->runQuery("SELECT * FROM artikel WHERE idartikel=$id");

    ?>
    <div style="margin-right: 40px; margin-left: 40px;">
        <div class="column2">
            <div class="card" style="border-radius: 50px; margin-bottom: 50px; margin-top: 200px; margin-right-200px; text-align: center;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: white;">
                        <li class="breadcrumb-item"><a href="index.php" style="color: #10AB43; font-size: 12px;">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"
                            style="font-size: 12px;"><?php echo $result[0]['naam'];
                            ?></li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="column" style="width: 35%; margin-top: 30px;">
                        <div class="card2" style="height: 400px; border-radius: 50px;">
                            <img src="../default/images/<?php echo $result[0]['afbeelding'] ?>"
                                 style="width: 100%; height: 100%;">
                        </div>
                    </div>

                    <div class="column" style="width: 55%; margin-top: 30px; margin-left: 50px;">
                        <div class="card2" style="height: 350px; border-radius: 50px;">
                            <h3 style="font-size: 30px;"><?php echo $result[0]['naam'] ?></h3>
                            <p class="p" style="font-size: 18px;">
                                <?php echo $result[0]['omschrijving'] ?>
                            </p>
                            <hr class="solid">
                            <p style="text-align: left; font-size: 15px; margin-left: 20px;"><?php echo "&euro;" . $result[0]['prijs'] . ".-" ?></p>
                            <div class="col-4 col-sm-4 col-md-4 p">
                                <form action="../winkelmand/index.php?action=add&code=<?php echo $result[0]['idartikel']?>" method="POST">
                                    <div class="quantity">
                                        <input type='hidden' name='code' value="<?= $result[0]['idartikel'] ?>"/>
                                        <div class="cart-action">Aantal: <input style="margin-left: 20px;" type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="In winkelmandje" class="btnAddAction button button4" /></div>                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} ?>