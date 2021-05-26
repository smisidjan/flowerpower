<div style="margin: 20px;">
    <div class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <?php include 'dbh.php';
                $sql = "SELECT * FROM artikel";
                $result = $dbh->query($sql);
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="splide__slide" style="border: 1px solid #FF059B;">
                        <div class="splide__slide__container">
                            <img src="<?php echo $row["afbeelding"] ?>">
                        </div><?php echo $row["naam"] ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splide', {
            perPage: 3,
            perMove: 1,
        }).mount();
    });
</script>
<script src="../splide-2.4.21/splide-2.4.21/dist/js/splide.min.js"></script>
