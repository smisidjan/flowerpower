<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login formulier</title>
</head>
<body>
<form action="loginController.php" method="post" id="login">
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="tussenvoegsel">Tussenvoegsel:</label>
                        <input type="text" class="form-control" id="tussenvoegsel" name="tussenvoegsel">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="achternaam">Achternaam:</label>
                    <input type="text" class="form-control" id="achternaam" name="achternaam">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="adres">Adres:</label>
                        <input type="text" class="form-control" id="adres" name="adres">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="huisnummer">Huisnummer:</label>
                        <input type="text" class="form-control" id="huisnummer" name="huisnummer">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="postcode">Postcode:</label>
                        <input type="text" class="form-control" id="postcode" name="postcode">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="plaats">Plaats:</label>
                    <input type="text" class="form-control" id="plaats" name="plaats">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="telefoon">Telefoonnummer:</label>
                    <input type="tel" class="form-control" id="telefoon" name="telefoon">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="wachtwoord">Wachtwoord:</label>
                    <input type="password" class="form-control" id="wachtwoord" name="wachtwoord">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="knop" value="verstuur" class="form-control">
            </div>
        </div>
    </div>
</form>
</body>
</html>