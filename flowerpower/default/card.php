<section class="pt-5 pb-5" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Carousel cards title </h3>
            </div>
            <div class="row mx-auto my-auto">
                <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        <?php
                        require "../default/dbh.php";

                        $sql = "select * from artikel";

                        if ($result = $dbh -> query($sql)) {
                            while ($row = $result -> fetch_assoc()) {
                                if ($row == 0) {
                                    echo "<div class='carousel-item active'>";
                                    echo "<p>". $row['naam']. "</p>";
                                    echo "<img class='d-block col-3 img-fluid'
                                src='https://cdn.shopify.com/s/files/1/2304/9095/files/DBE-ACDBE-logo.png?10873'>";
                                    echo " </div>";
                                } else {
                                    echo "<div class='carousel-item'>";
                                    echo "hallo <img class='d-block col-3 img-fluid'
                                src='https://cdn.shopify.com/s/files/1/2304/9095/files/DBE-ACDBE-logo.png?10873'>";
                                    echo " </div>";
                                }
                            }
                            $result -> free_result();
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="color: #FF6F83;"></span>
                        <span class="sr-only" style="background-color: #FF6F83;">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only" style="background-color: #FF6F83;">Next</span>
                    </a>
                </div>
            </div>
        </div>
</section>