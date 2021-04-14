<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>A simple, clean, and responsive HTML invoice template</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/factuur.css">
</head>

<body>
<?php
session_start();
include '../default/dbh.php';

$id = $_GET['id'];

$sql = "SELECT * FROM factuur where idfactuur = $id";
$result = $dbh->query($sql);

$row = $result->fetch_assoc();
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../default/index.php" style="color: #10AB43;">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mijn bestellingen</li>
    </ol>
</nav>
<div class="invoice-box" style="margin-top: 100px;">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <h2>FlowerPower</h2>
                        </td>

                        <td>
                            Factuur #: <?php echo $row['idfactuur']; ?><br />
                            Created: <?php echo $row['datum']; ?><br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="3">
                <table>
                    <tr>
                        <td>
                            FlowerPower<br />
                            Stationsplein 7<br />
                            1231NR, Amsterdam
                        </td>

                        <td>
                            <?php echo $_SESSION['gebruiker']['naam'] . " " . $_SESSION['gebruiker']['tussenvoegsel'] . " " . $_SESSION['gebruiker']['achternaam']; ?><br />
                            <?php echo $_SESSION['gebruiker']['adres'] . " " . $_SESSION['gebruiker']['huisnummer']; ?><br />
                            <?php echo $_SESSION['gebruiker']['postcode'] . " " . $_SESSION['gebruiker']['plaats'] ?><br />
                            <?php echo $_SESSION['gebruiker']['gebruikersnaam']; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Item</td>

            <td>Price</td>
        </tr>

        <?php
        foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"] * $item["prijs"];
        ?>
        <tr class="item">
            <td><?php echo $item['naam']; ?></td>

            <td><?php echo "&euro; " . $item['prijs']; ?></td>
        </tr>
        <?php
        }
        ?>

        <tr class="total">
            <td></td>

            <td>Total: <?php echo "&euro; " . $_SESSION['totaalPrijs']; ?></td>
        </tr>
    </table>
</div>
<?php  ?>
</body>
</html>