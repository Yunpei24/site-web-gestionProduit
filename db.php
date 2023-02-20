
<?php
// adresse du serveur : adresse IP ou le nom de la machine
$SERVER = "localhost";
// nom de l'utilsateur
$USER = "root";
// mot de passe de cet utilisateur
$PASSWD = "";
// nom de la base de données
$DATABASE = "gestion";

// tentative de connexion
$conn = mysqli_connect($SERVER, $USER, $PASSWD, $DATABASE)
or die("<br> Les erreurs : ".mysqli_connect_error($conn));


$dsn = "mysql:host=".$SERVER . ";dbname=" . $DATABASE;
$pdo = new PDO($dsn , $USER, $PASSWD);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// en cas de réussite de la connexion
//echo "Connexion et sélection réussies.";
?>