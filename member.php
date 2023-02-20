<?php
session_start();
require_once "./db.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page d'Inscription des Gestionnaires</title>
  <link rel="icon" href="./images/icon.png">
  <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style_member.css">
</head>
<body>
  <div class="container">
    <form action="adduser.php" method="post">
      <div class="section">
        <h1>Inscription</h1>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nom d'Utilisateur :</label>
        <br>
        <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur :" required />
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nom_Prénom :</label>
        <br>
        <input type="text" class="form-control" name="name" placeholder="Nom et prenom :" required />
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Mot de Passe :</label>
        <br>
        <input type="password" class="form-control" name="password" placeholder="Mot Passe:" required />
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Confirmer Mot de Passe :</label>
        <br>
        <input type="password" class="form-control" name="cfpassword" placeholder="Confirmer Mot Passe:" required />
      </div>
      <div class="form-button">
        <button type="submit" class="btn btn-success">Enregistrer</button>
      </div>
      
    </form>
    <br>
    <div class="form-retour">
        <a name="" id="" class="returnlogin" href="./accueil.php" role="button">Annuler</a>
    </div>
  </div>
  </form>
  </div>
  <div class="footer">
    <p>BAMBA@NIKIEMA</p>
  </div>
</body>
</html>