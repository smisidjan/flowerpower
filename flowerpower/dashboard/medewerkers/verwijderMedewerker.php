<?php
if (isset($_REQUEST['idmedewerker'])) {

// if the variable has been successfully received
    $idmedewerker = $_REQUEST['idmedewerker'];

    $query = $dbh->prepare("DELETE FROM medewerker WHERE idmedewerker = :idmedewerker");

    $query->execute(array('name' => $idmedewerker));

    unset($db, $query);
}
?>