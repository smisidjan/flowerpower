<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FlowerPower</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../default/menu.css">
</head>
<div class="card" style="border: 1px solid #FF6F83; width: 100%; height: 150%; margin-bottom: 100px;">
    <div class="container1">
        <li class="li"><a href="#" class="cool-link"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                    <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
                </svg></a></li>
        <li class="li"><a href="#" class="cool-link"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg></a></li>
        <li class="li"><a href="#" class="cool-link">Contact</a></li>
        <li class="li"><a href="#" class="cool-link">Gelegenheid</a></li>
        <li class="li"><a href="#" class="cool-link">Bloemen</a></li>
        <li class="li"><a href="#" class="cool-link">Home</a></li>
    </div>
    <body>
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-sm-6">
                <form action="../dashboard/index.php" method="post" id="login">
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
                </form>
            </div>
            <div class="col-sm-6">
                <form action="../profiel/index.php" method="post" id="registreren">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center">Account aanmaken</h4><br>
                            <p class="card-text">
                            <div class="row">
                                <div class="col-12 col-m-7">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="naam" placeholder="Naam">
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
                </form>
            </div>
        </div>
    </div>
    </body>
</div>