<?php
include('default/header.html');
?>
    <header>
        <nav class="navbar fixed-top navbar-light bg-light navbar-expand-md">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="main-nav-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="margin-right: 10px"><a class="nav-link" href="/flowerpower/default/index.php">Home</a></li>
                        <li class="nav-item" style="margin-right: 10px"><a class="nav-link" href="flowerpower/bloemen/index.php">Bloemen</a></li>
                        <li class="nav-item" style="margin-right: 10px"><a class="nav-link" href="/flowerpower/gelegenheid/index.php">Gelegenheid</a></li>
                        <li class="nav-item" style="margin-right: 50px"><a class="nav-link" href="/flowerpower/contact.index.php">Contact</a></li>
                        <li class="nav-"><a class="nav-link active" href="/flowerpower/login.php"><span
                                        class="glyphicon glyphicon-user"></span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#offers"><span
                                        class="glyphicon glyphicon-shopping-cart"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <body>
    <form action="default/index.php" method="post" id="login">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center">Inloggen met je FlowerPower account</h4>
                            <br>
                            <div class="card-text">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <br>
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="wachtwoord"
                                               placeholder="Wachtwoord">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input style="background-color: #FF6F83" type="submit" name="knop" value="verstuur"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center">Account aanmaken</h4><br>
                            <p class="card-text">
                            <div class="row">
                                <div class="col-12 col-m-7">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="name" placeholder="Naam">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 col-m-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="tussenvoegsel"
                                               placeholder="Tussenvoegsel">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="achternaam"
                                               placeholder="Achternaam">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-earphone"></i></span>
                                        <input id="telefoon" type="text" class="form-control" name="telefoon"
                                               placeholder="Telefoonnummer">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="email" type="text" class="form-control" name="email"
                                               placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="wachtwoord" type="password" class="form-control" name="wachtwoord"
                                               placeholder="Wachtwoord">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <input style="background-color: #FF6F83" type="submit" name="knop" value="verstuur"
                                       class="form-control">
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </body>
<?php
include('default/footer.html');
?>