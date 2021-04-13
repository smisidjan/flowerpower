<?php
session_start();
require '../Controllers/BloemenController.php';
include 'header.php';
//include 'card.php';
?>
<div class="row" style="text-align: center; margin-top: 50px;">
    <img src="images/index.png" style="margin-left: 340px; margin-top: 50px; height: 200px;">
    <div class="body" style="margin-left: 200px; margin-top: -70px;">
        <input type="radio" name="position" checked />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <main id="carousel">
            <div class="item"><a href="" <img style="width: 200px; height: 200px;" src="images/rode-rozen-luxe.jpg"></div>
            <div class="item"><img style="width: 200px; height: 200px;" src="images/jongen_boeket_.jpg"></div>
            <div class="item"><img style="width: 200px; height: 200px;" src="images/vrolijk-plukboeket.jpg"></div>
            <div class="item"><img style="width: 200px; height: 200px;" src="images/meisje_boeket.jpg"></div>
            <div class="item"><img style="width: 200px; height: 200px;" src="images/kleur-in-zicht.jpg"></div>
        </main>
    </div>
</div>
</body>
</div>
</html>