<?php
include 'header.html';
?>
<div class="row" style="margin-top: 100px">
    <div class="column">
        <div class="card rounded">
            <div class="row">
                <div class="column" style="width: 48%">
                    <div class="card-body">
                        <h2 class="card-title" style="float:left; margin-left: 22px;">Contact</h2>
                        <div class="card-text" style="margin-top: 50px;">
                            <h3 class="card-text" style="float: left; margin-bottom: 50px; margin-left: -80px;">Mail
                                ons</h3>
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="naam" placeholder="Naam">
                                </div>
                            </div>
                            <br>
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="password" class="form-control" name="email"
                                           placeholder="E-mailadres">
                                </div>
                            </div>
                            <br>
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="password" class="form-control" name="telefoon"
                                           placeholder="Telefoonnummer">
                                </div>
                            </div>
                            <br>
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <textarea rows="5" name="notitie" class="form-control"
                                              placeholder="Notitie"></textarea>
                                </div>
                            </div>
                            <br>
                            <hr class="solid">
                           <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <!-- Modal content-->
                                    <div class="modal-content" style="border: 2px solid #FF6F83;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="modal-title" style="margin-bottom: 30px;">Uw email is verzonden!</h4>
                                            <input style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"
                                                   type="button" name="knop" value="Oké"
                                                   class="btn rounded-pill" data-dismiss="modal">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-4" style="float: right">
                                <div class="form-group">
                                    <!-- Button trigger modal -->
                                    <button style="background-color: #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl"></div>
                <div class="column" style="width: 48%">
                    <div class="card-body">
                        <h2 class="card-title" style="float:left; margin-left: 22px;">Contact</h2>
                        <div class="card-text" style="margin-top: 50px;">

                            <div class="row" style="margin-top: 100px">
                                <div class="column" style="width: 50%;">
                                    <div class="card rounded" style="height: 300px; border: 1px solid #FF6F83; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                    </div>
                                </div>
                                <div class="column" style="width: 50%">
                                    <div class="card-body" style="text-align: left">
                                        <h4 class="card-title">FlowerPower! Hoofdkandoor</h4>
                                        <p class="card-text" style="margin-top: 50px;">Straat Huisnummer</p>
                                        <p class="card-text">Postcode Plaats</p>
                                        <p class="card-text">Email</p>
                                        <p class="card-text">Telefoonnummer</p>

                                        <h4 class="card-title" style="margin-top: 50px;">Openingstijden</h4>
                                        <p class="card-text">Dag - Tijd</p>
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</body>
</div>
</html>
<script>
    var myModal = document.getElementById('exampleModal')
    var myInput = document.getElementById('exampleModalLabel')

    myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })
</script>
