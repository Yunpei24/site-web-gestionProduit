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
        $code_article = $_POST['code_article'];
        $nom_article = $_POST['nom_article'];
        $quantite = $_POST['quantite'];
        $prix = $_POST['prix'];

        $sql= " UPDATE `produit` SET `code_article`=:code_art,`nom_article`=:nomart,`quantite`=:quant,`prix`=:pri WHERE id_produit=:nouvelleid ";

        $query = $pdo->prepare($sql);
        $query ->bindParam(':code_art', $code_article, PDO::PARAM_STR);
        $query ->bindParam(':nomart', $nom_article, PDO::PARAM_STR);
        $query ->bindParam(':quant', $quantite, PDO::PARAM_STR);
        $query ->bindParam(':nouvelleid', $userid, PDO::PARAM_STR);
        $query ->bindParam(':pri', $prix, PDO::PARAM_STR);

        $query->execute();

        echo "<script>alert('Vous avez modifier un produit');</script>";
        echo "<script> window.location.href='produit.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./images/icon.png">
        <title>Mettre a jour Produit</title>
</head>
<body>
<?php require_once 'navbar.php'; ?>
                
       
       <div class="container">
        <div class="row">
        <div class="col-8">

        <?php 

        $userid = intval ($_GET['id']);
        $sql ="SELECT  `code_article`, `nom_article`,`quantite`,`prix` FROM `produit` WHERE id_produit=:nouvelleid";

        $query = $pdo->prepare($sql);
        $query->bindParam(':nouvelleid', $userid , PDO::PARAM_STR);
        $query->execute();

        $resultat= $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($resultat as $row)
        {
?>
  <h1 style='text-align:center'>Mettre à jour ce Produit </h1>      

                <form action="" method="POST" class="form-group">
                        Code Produit :
                        <input type="text" name="code_article" id="" class="form-control" value="<?php echo $row->code_article; ?>">
                        Nom Produit : 
                        <input type="text" name="nom_article" id="" class="form-control" value="<?php echo $row->nom_article; ?>">
                        Quantite Produit : 
                        <input type="text" name="quantite" id="" class="form-control" value="<?php echo $row->quantite; ?>">
                        Prix Produit (CFA) : 
                        <input type="text" name="prix" id="" class="form-control" value="<?php echo $row->prix; ?>">

                        <input type="submit" name="updatebtn" id="" value="Mettre a jour" class="btn btn-primary mt-3">
                        
                            <a name="updatebtn" id="" class="btn btn-primary mt-3" href="./produit.php" role="button">Annuler</a>
                        
                        <?php } ?>
                </form>
        </div>
        </div>
       </div>
        
</body>
</html>