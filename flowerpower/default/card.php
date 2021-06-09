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
                            <img src="images/<?php echo $row["afbeelding"] ?>" style="display: inline-block; width: 100%; height: 100%;">
                            <p style="text-align: right; float: inside; "><?php echo $row["naam"] ?></p>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splide', {
            type   : 'loop',
            perPage: 3,
            perMove: 1,
            heightRatio: 0.5,
            cover  : true,
            fixedHeight: 200,
            rewind    : true,
            gap       : 10,
            pagination: false,
        }).mount();
    });
</script>
<script src="../splide-2.4.21/splide-2.4.21/dist/js/splide.min.js"></script>
