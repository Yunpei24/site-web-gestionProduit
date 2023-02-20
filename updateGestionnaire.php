<?php 

session_start();
// faire appel a la base de donnees
require_once 'db.php';
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.php");
    exit();
}

if(isset($_POST['updatebtn']))
{
        $userid = intval ($_GET['id']);
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql= " UPDATE `user` SET `name`=:nam,`username`=:usernam, `password`=:passwrd WHERE id=:nouvelleid ";

        $query = $pdo->prepare($sql);
        $query ->bindParam(':nam', $name, PDO::PARAM_STR);
        $query ->bindParam(':usernam', $username, PDO::PARAM_STR);
        $query ->bindParam(':passwrd', $password, PDO::PARAM_STR);
        $query ->bindParam(':nouvelleid', $userid, PDO::PARAM_STR);
        
        $query->execute();

        echo "<script>alert('Vous avez modifier un gestionnaire');</script>";
        echo "<script> window.location.href='gestionnaires.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./images/icon.png">
        <link rel="stylesheet" href="style.css">
        <title>Mettre a jour un Gestionnaire</title>
</head>
<body>
<?php require_once 'navbar.php'; ?>
                
       
       <div class="container">
        <div class="row">
        <div class="col-8">

        <?php 

        $userid = intval ($_GET['id']);
        $sql ="SELECT  `name`, `username`,`password` FROM `user` WHERE id=:nouvelleid";

        $query = $pdo->prepare($sql);
        $query->bindParam(':nouvelleid', $userid , PDO::PARAM_STR);
        $query->execute();

        $resultat= $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($resultat as $row)
        {
?>
  <h1 style='text-align:center'>Mettre à jour le Gestionnaire </h1>      

                <form action="" method="POST" class="form-group">
                        Nom :
                        <input type="text" name="name" id="" class="form-control" value="<?php echo $row->name; ?>">
                        Nom d'Utilisateur : 
                        <input type="text" name="username" id="" class="form-control" value="<?php echo $row->username; ?>">
                        Mot de Passe : 
                        <input type="text" name="password" id="" class="form-control" value="<?php echo $row->password; ?>">

                        <input type="submit" name="updatebtn" id="" value="Mettre a jour" class="btn btn-primary mt-3">
                        
                            <a name="updatebtn" id="" class="btn btn-primary mt-3" href="./gestionnaires.php" role="button">Annuler</a>
                        
                        <?php } ?>
                </form>
        </div>
        </div>
       </div>
        
</body>
</html>