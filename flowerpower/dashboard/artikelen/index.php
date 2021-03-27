<?php
include "header.html";

?>
<h3 style="text-align: left; margin-bottom: 10px;">Overzicht medewerkers</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="float: right; background-color: white; margin-top: 50px;">
        <li class="breadcrumb-item"><a href="../../default/index.php" style="color: #10AB43;">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php" style="color: #10AB43;">FlowerPower</a></li>
        <li class="breadcrumb-item active" aria-current="page">Overzicht medewerkers</li>
    </ol>
</nav>
<table class="table rounded" style="margin-top: 10px; border: 3px solid #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <thead style="background-color: #C3DF0E;">
    <tr style="text-align: center;">
        <th scope="col">Artikel nr</th>
        <th scope="col">Naam</th>
        <th scope="col">Beschrijving</th>
        <th scope="col">Prijs</th>
        <th scope="col">Categorie</th>
        <th scope="col"><button class="button button4">Toevoegen</button></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td></td>
        <td><span style="font-size: 20px; text-align: center; margin-right: -300px;">Bewerken</span><span data-toggle="modal" data-target="#myModal" style="cursor: pointer; float: right; margin-right: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></span></td>
    </tr>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content" style="border: 2px solid black;">
            <div class="modal-header">
                <h4 style="margin-left: 200px; font-style: normal;">Let op!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" style="margin-bottom: 30px;">Weet u zeker dat u dit artikel wilt verwijderen?</h4>
                <input class="button button4" style="margin-right: 30px; background-color: #C3DF0E; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                       type="button" name="ja" value="ja"
                       data-dismiss="modal">
                <input class="button button4" style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                       type="button" name="nee" value="nee"
                       data-dismiss="modal">
            </div>
        </div>

    </div>
</div>