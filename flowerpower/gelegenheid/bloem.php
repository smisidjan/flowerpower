<?php
include 'header.html';
?>


<div class="row">
    <div class="column2">
        <div class="card" style="height: 600px; border-radius: 50px; margin-bottom: 50px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: white;">
                    <li class="breadcrumb-item"><a href="index.php" style="color: #10AB43;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Naam bloem</li>
                </ol>
            </nav>
            <div class="row">
                <div class="column" style="width: 35%; margin-top: 30px;">
                    <div class="card2" style="height: 400px; border-radius: 50px;">
                        <img src="images/geboorte.jpg" style="width: 100%; height: 100%;">
                    </div>
                </div>

                <div class="column" style="width: 55%; margin-top: 30px; margin-left: 50px;">
                    <div class="card2" style="height: 350px; border-radius: 50px;">
                        <h3>Zachte lente</h3>
                        <p class="p">
                            Een mooi boeket hoeft niet altijd kleurijk te zijn.
                        </p>
                        <hr class="solid">
                        <div class="col-4 col-sm-4 col-md-4 p">
                            <div class="quantity">
                                <p>Aantal:
                                    <input style="margin-left: 20px;" type="button" value="+" class="plus">
                                    <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" value="-" class="minus">
                                </p>
                                <button class="button p">In winkelwagen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // select the row that's concerned
    var row = btn.parentNode.parentNode;

    // select the id of this row
       var idartikel = row.children[0].textContent;
</script>