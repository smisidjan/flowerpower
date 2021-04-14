<div class="container text-center my-3" style="margin-top: 100px;">
    <div class="row mx-auto my-auto" style="margin-top: 100px;">
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel" style="margin-top: 100px;">
            <div class="carousel-inner w-100" role="listbox">
                <div class="carousel-item active">
                    <div class="col-md-4">
                        <div class="card card-body" style="border: 2px solid #FF059B;">
                            <img class="img-fluid" src="images/losse-roze-rozen.jpg">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-4">
                        <div class="card card-body" style="border: 2px solid #FF059B;">
                            <img class="img-fluid" src="images/vrolijk-plukboeket.jpg">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-4">
                        <div class="card card-body" style="border: 2px solid #FF059B;">
                            <img class="img-fluid" src="images/bont-geplukt.jpg">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-4">
                        <div class="card card-body" style="border: 2px solid #FF059B;">
                            <img class="img-fluid" src="images/meisje_boeket.jpg">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-4">
                        <div class="card card-body" style="border: 2px solid #FF059B;">
                            <img class="img-fluid" src="images/zachte_tulp.jpg">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-4">
                        <div class="card card-body" style="border: 2px solid #FF059B;">
                            <img class="img-fluid" src="images/zachte_lente.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<script>
    $('#recipeCarousel').carousel({
        interval: 10000
    })

    $('.carousel .carousel-item').each(function(){
        var minPerSlide = 3;
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i=0;i<minPerSlide;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });

</script>