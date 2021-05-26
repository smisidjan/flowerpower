<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php if ($_SERVER['PHP_SELF'] == '/flower-power/default/index.php') { ?>
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/cards.css">
    <?php }?>
    <?php if ($_SERVER['PHP_SELF'] == '/flower-power/bloemen/index.php') { ?>
        <link rel="stylesheet" href="../default/css/menu.css">
        <link rel="stylesheet" href="../bloemen/css/card.css">
    <?php } elseif ($_SERVER['PHP_SELF'] == '/flower-power/bloemen/boem.php?id=?'.isset($_SESSION["idartikel"])){ ?>
        <link rel="stylesheet" href="../default/css/menu.css">
        <link rel="stylesheet" href="../bloemen/css/card.css">
    <?php }?>
    <?php if ($_SERVER['PHP_SELF'] == '/flower-power/gelegenheid/index.php') { ?>
        <link rel="stylesheet" href="../default/css/menu.css">
        <link rel="stylesheet" href="../gelegenheid/css/card.css">
    <?php }?>
    <?php if ($_SERVER['PHP_SELF'] == '/flower-power/contact/index.php') { ?>
        <link rel="stylesheet" href="../default/css/menu.css">
        <link rel="stylesheet" href="css/card.css">
    <?php }?>
    <?php if ($_SERVER['PHP_SELF'] == '/flower-power/login/index.php') { ?>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="../default/css/menu.css">
    <?php }?>
    <?php if ($_SERVER['PHP_SELF'] == '/flower-power/profiel/index.php') { ?>
        <link rel="stylesheet" href="css/card.css">
        <link rel="stylesheet" href="../default/css/menu.css">
    <?php }?>
    <?php if ($_SERVER['PHP_SELF'] == '/flower-power/winkelmand/index.php' || '/flower-power/winkelmand/afrekenen.php') { ?>
        <link rel="stylesheet" href="../default/css/menu.css">
        <link rel="stylesheet" href="css/card.css">
        <link rel="stylesheet" href="css/cardAfrekenen.css">
    <?php }?>
</head>
<div class="container1" style="float: right;">
    <div class="topnav" style="float: right; width: 600px; background-color: white;">
        <a <?php if ($_SERVER['PHP_SELF'] == '/flower-power/default/index.php') {echo "class='active'";} ?> href="../default/index.php">Home</a>
        <a <?php if ($_SERVER['PHP_SELF'] == '/flower-power/bloemen/index.php') {echo "class='active'";} elseif ($_SERVER['PHP_SELF'] == '/flower-power/bloemen/bloem.php') {echo "class='active'";}?> href="../bloemen/index.php">Bloemen</a>
        <a <?php if ($_SERVER['PHP_SELF'] == '/flower-power/gelegenheid/index.php') {echo "class='active'";} ?> href="../gelegenheid/index.php">Gelegenheid</a>
        <a <?php if ($_SERVER['PHP_SELF'] == '/flower-power/contact/index.php') {echo "class='active'";} ?> href="../contact/index.php" style="margin-right: 50px;">Contact</a>
        <?php if ($_SERVER['PHP_SELF'] == '/flower-power/login/index.php') {?>
            <a <?php if ($_SERVER['PHP_SELF'] == '/flower-power/login/index.php') {echo "class='active'";}
            if (!empty($_SESSION['gebruiker'])) { echo "href='../profiel/index.php'";} elseif (!empty($_SESSION['medewerker'])){ echo "href='../dashboard/index.php'";} else { echo "href='../login/index.php'";}?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </a>
        <?php } elseif ($_SERVER['PHP_SELF'] == '/flower-power/profiel/index.php') { ?>
            <a <?php if ($_SERVER['PHP_SELF'] == '/flower-power/profiel/index.php') {echo "class='active'";}
            if (!empty($_SESSION['gebruiker'])) { echo "href='../profiel/index.php'";} elseif (!empty($_SESSION['medewerker'])){ echo "href='../dashboard/index.php'";} else { echo "href='../login/index.php'";}?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </a>
        <?php } elseif ($_SERVER['PHP_SELF'] == '/flower-power/profiel/gegevens.php') {?>
            <a <?php if ($_SERVER['PHP_SELF'] == '/flower-power/profiel/gegevens.php') {echo "class='active'";}
            if (!empty($_SESSION['gebruiker'])) { echo "href='../profiel/index.php'";} elseif (!empty($_SESSION['medewerker'])){ echo "href='../dashboard/index.php'";} else { echo "href='../login/index.php'";}?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </a>
        <?php } elseif ($_SERVER['PHP_SELF'] == '/flower-power/profiel/bestellingen.php') {?>
            <a <?php if ($_SERVER['PHP_SELF'] == '/flower-power/profiel/bestellingen.php') {echo "class='active'";}
            if (!empty($_SESSION['gebruiker'])) { echo "href='../profiel/index.php'";} elseif (!empty($_SESSION['medewerker'])){ echo "href='../dashboard/index.php'";} else { echo "href='../login/index.php'";}?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </a>
        <?php } else { ?>
        <a <?php if (!empty($_SESSION['gebruiker'])) { echo "href='../profiel/index.php'";} elseif (!empty($_SESSION['medewerker'])){ echo "href='../dashboard/index.php'";} else { echo "href='../login/index.php'";}?>>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                 class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
        </a>
        <?php } ?>
        <a <?php if ($_SERVER['PHP_SELF'] == '/flower-power/winkelmand/index.php') {echo "class='active'";} elseif ($_SERVER['PHP_SELF'] == '/flower-power/winkelmand/afrekenen.php') {echo "class='active'";} ?> href="../winkelmand/index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                 class="bi bi-basket-fill" viewBox="0 0 16 16">
                <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
            </svg>
            <span style="background-color: #FF6F83;" class="badge badge-pill badge"><?php if (!empty($_SESSION["totaal"])) {echo $_SESSION["totaal"]; } ?></span>
        </a>
    </div>
</div>
<body style="border: 3px solid #FF6F83; height: 1000px;">