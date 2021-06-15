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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/index.php') { ?>
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/card.css">
        <link rel="stylesheet" href="css/tabel.css">
    <?php } else {?>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="css/card.css">
    <?php } ?>
</head>
<div class="container1" style="float: right;">
    <div class="topnav" style="float: right; width: 500px; background-color: white;">
        <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/index.php') { ?>
            <a <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/index.php') {echo "class='active'";} ?> href="index.php">Home</a>
            <a <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/flowerpower/index.php') {echo "class='active'";} ?> href="flowerpower/index.php">FlowerPower</a>
            <a <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/dashkube/index.php') {echo "class='active'";} ?> href="dashkube/index.php">Dashkube</a>
            <a <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/taalhuizen/index.php') {echo "class='active'";} ?> href="taalhuizen/index.php" style="margin-right: 50px;">Taalhuizen-service</a>
        <?php } else {?>
            <a <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/index.php') {echo "class='active'";} ?> href="../index.php">Home</a>
            <a <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/flowerpower/index.php') {echo "class='active'";} ?> href="../flowerpower/index.php">FlowerPower</a>
            <a <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/dashkube/index.php') {echo "class='active'";} ?> href="../dashkube/index.php">Dashkube</a>
            <a <?php if ($_SERVER['PHP_SELF'] == '/portfolio/default/taalhuizen/index.php') {echo "class='active'";} ?> href="../taalhuizen/index.php" style="margin-right: 50px;">Taalhuizen-service</a>

        <?php } ?>

    </div>
</div>
<body style="border: 3px solid #FF6F83; height: 1000px;">