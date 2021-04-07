<?php
session_start();
include 'header.html';
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM artikel WHERE idartikel='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["idartikel"]=>array('naam'=>$productByCode[0]["naam"], 'idartikel'=>$productByCode[0]["idartikel"], 'omschrijving'=>$productByCode[0]["omschrijving"], 'quantity'=>$_POST["quantity"], 'prijs'=>$productByCode[0]["prijs"], 'afbeelding'=>$productByCode[0]["afbeelding"]));

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["idartikel"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["idartikel"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<h3 style="text-align: left; margin-bottom: 10px;">Winkelmandje</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: left; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43;">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Winkelmandje</li>
    </ol>
</nav>
<table id="table" class="table rounded"
       style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); margin-bottom: 200px;">
    <thead style="background-color: #C3DF0E;">
    <?php
    if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
    ?>
    <tr style="text-align: center;">
        <th scope="col" style='font-size: 17px;'>Afbeelding</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Naam</th>
        <th scope="col" style='font-size: 17px; text-align: left; margin-left: 50px;'>Beschrijving</th>
        <th scope="col" style='font-size: 17px; text-align: left; margin-left: 50px;'>Aantal</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Prijs</th>
        <th scope="col" style='font-size: 17px; text-align: left; padding-left: 25px;'>Totaal</th>
        <th><a class="button4 button" id="btnEmpty" href="index.php?action=empty">Leeg winkelmandje</a></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["prijs"];
        ?>
        <td><img src=../default/images/"<?php echo $item["afbeelding"]; ?>" class="cart-item-image" /></td>
        <td style="text-align:left; font-size: 15px;"><?php echo $item["naam"]; ?></td>
        <td style="text-align:left; font-size: 15px;"><?php echo $item["omschrijving"]; ?></td>
        <td style="text-align:left; font-size: 15px;"><?php echo $item["quantity"]; ?></td>
        <td  style="text-align:left; font-size: 15px;"><?php echo "&euro; ".$item["prijs"]; ?></td>
        <td  style="text-align:left; font-size: 15px;"><?php echo "&euro; ". number_format($item_price,2); ?></td>
        <td style="text-align:center; font-size: 15px;"><a class="btnRemoveAction" href="index.php?action=remove&code=<?php echo $item["idartikel"] ?>"><img src="" /></a></td>
    </tr>
    <?php
    $total_quantity += $item["quantity"];
    $total_price += ($item["prijs"]*$item["quantity"]);
    }
    ?>
    <tr>
        <td style="font-size: 20px" colspan="2" align="right">Totaal:</td>
        <td style="font-size: 15px;" align="right"><?php echo $total_quantity; ?></td>
        <td style="font-size: 15px;" align="right" colspan="2"><strong><?php echo "&euro; ".number_format($total_price, 2); ?></strong></td>
        <td></td>
        <td><button style="height: 30px; text-align: center; float: right;" class="button button4">Afrekenen</button></td>
    </tr>
    <?php
    } else {
        ?>
        <div class="no-records">Uw winkelmandje is leeg.</div>
        <?php
    }
    ?>
    </tbody>
</table>