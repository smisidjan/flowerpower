<?php
if (isset($_REQUEST['idartikel'])) {

// if the variable has been successfully received
    $idartikel = $_REQUEST['idartikel'];

    $query = $dbh->prepare("DELETE FROM artikel WHERE idartikel = :idartikel");

    $query->execute(array('name' => $idartikel));

    unset($db, $query);
}

?>