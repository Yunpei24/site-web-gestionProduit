<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Connecter</title>
    <link rel="icon" href="./images/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_index.css">
</head>
<body>
    <div class = "content">
        <h1>Connexion</h1>
        <form action="login.php" method="POST">
            <label for="username">Nom d'Utilisateur: </label>
            <br>
            <input type="text" name="username" placeholder="Your username :" required>
            <br>
            <label for="pass">Mot de Passe: </label>
            <br>
            <input type="password" name="password" placeholder="Your password :" required>
            <br>
            <input type="submit" value="Se Connecter">
        </form>
        <!--<a href="./member.php" class="regis">S'Inscrire</a>-->
    </div>
    <div class="footer">
    <p>BAMBA@NIKIEMA</p>
    </div>
</body>
</html>