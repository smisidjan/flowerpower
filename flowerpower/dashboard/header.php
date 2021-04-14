<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php if ($_SERVER['PHP_SELF'] == '/flowerpower/dashboard/index.php') { ?>
        <link rel="stylesheet" href="../default/css/menu.css">
        <link rel="stylesheet" href="css/card.css">
    <?php } else {?>
    <link rel="stylesheet" href="../../default/css/menu.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="css/tabel.css">
    <?php } ?>
</head>
<?php if (isset($_GET['loguit'])) {
    $_SESSION = array();
    session_destroy();
    header('location: ../login/index.php');
}?>
<div class="card" style="border: 1px solid #FF6F83; width: 100%; height: 150%;">
    <div class="container1" style="float: right;">
        <div class="topnav" style="float: right; width: 200px; background-color: white;">
            <div class="dropdown " style="height: 170px;">
                <a class="active" href="../dashboard/index.php" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    FlowerPower
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../default/index.php">Home</a>
                    <a class="dropdown-item" href="index.php?loguit">Loguit</a>
                </div>
            </div>
        </div>
    </div>
    <body>