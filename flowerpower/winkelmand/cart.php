<?php
session_start();
include "../default/header.html";
require "../default/dbh.php";
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $key => $value) {
            if($_POST["code"] == $key){
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
            }
            if(empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["shopping_cart"] as &$value){
        if($value['code'] === $_POST["code"]){
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }

}
?>

<h3 style="text-align: left; margin-bottom: 10px;">Winkelmandje</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43;">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43;">FlowerPower</a></li>
        <li class="breadcrumb-item active" aria-current="page">Overzicht artikelen</li>
    </ol>
</nav>
<table id="table" class="table rounded"
       style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <thead style="background-color: #C3DF0E;">
    <tr style="text-align: center;">
        <th scope="col" style='font-size: 17px;'>Artikel nr</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Naam</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Naam</th>
        <th scope="col" style='font-size: 17px; text-align: left; margin-left: 50px;'>Beschrijving</th>
        <th scope="col" style='font-size: 17px; text-align: left;'>Prijs</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($_SESSION["shopping_cart"] as $product){

    ?>
   <tr>
       <th><?php $product['afbeelding'];?></th>
       <td><?php echo $product["naam"]; ?><br />
           <form method='post' action=''>
               <input type='hidden' name='code' value="<?php echo $product["idartikel"]; ?>" />
               <input type='hidden' name='action' value="remove" />
               <button type='submit' class='remove'>Remove Item</button>
           </form>
       </td>
       <td>
           <form method='post' action=''>
               <input type='hidden' name='code' value="<?php echo $product["idartikel"]; ?>" />
               <input type='hidden' name='action' value="change" />
               <select name='quantity' class='quantity' onChange="this.form.submit()">
                   <option <?php if($product["quantity"]==1) echo "selected";?>
                           value="1">1</option>
                   <option <?php if($product["quantity"]==2) echo "selected";?>
                           value="2">2</option>
                   <option <?php if($product["quantity"]==3) echo "selected";?>
                           value="3">3</option>
                   <option <?php if($product["quantity"]==4) echo "selected";?>
                           value="4">4</option>
                   <option <?php if($product["quantity"]==5) echo "selected";?>
                           value="5">5</option>
               </select>
           </form>
       </td>
       <td><?php echo "$".$product["prijs"]; ?></td>
       <td><?php echo "$".$product["prijs"]*$product["quantity"]; ?></td>
   </tr>
        <?php
    }
    ?>
    </tbody>
</table>


<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
    <?php echo $status; ?>
</div>