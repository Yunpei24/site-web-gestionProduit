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

        //$sql= " UPDATE `produit` SET `code_article`=:code_art,`nom_article`=:nomart,`quantite`=:quant,`prix`=:pri WHERE id_produit=:nouvelleid ";

        $query = $pdo->prepare($sql);
        $query ->bindParam(':code_art', $code_article, PDO::PARAM_STR);
        $query ->bindParam(':nomart', $nom_article, PDO::PARAM_STR);
        $query ->bindParam(':quant', $quantite, PDO::PARAM_STR);
        $query ->bindParam(':nouvelleid', $userid, PDO::PARAM_STR);
        $query ->bindParam(':pri', $prix, PDO::PARAM_STR);

        $query->execute();


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./images/icon.png">
        <title>Détails du produit</title>
        
</head>
<body>
<?php require_once 'navbar.php'; ?>
                
       
       <div class="container">
        <div class="row">
        <div class="col-8">

        <?php 

        $userid = intval ($_GET['id']);
        $sql ="SELECT  `id_produit`, `code_article`, `nom_article`,`quantite`,`prix`,`time` FROM `produit` WHERE id_produit=:nouvelleid";

        $query = $pdo->prepare($sql);
        $query->bindParam(':nouvelleid', $userid , PDO::PARAM_STR);
        $query->execute();

        $resultat= $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($resultat as $row)
        {
?>

<h1 style='text-align:center'>Détails du produit </h1>
                <table>
                    
                    <tr>
                        <th>Date d'ajout</th>
                        <th>Code produit</th>
                        <th>Nom produit</th>
                        <th>Quantité produit</th>
                        <th>Prix produit (CFA)</th>
                        <th>Etat stock</th>
                        
                    </tr>
                    <tr>
                        <td><?php echo $row->time; ?></td>
                        <td><?php echo $row->code_article; ?></td>
                        <td><?php echo $row->nom_article; ?></td>
                        <td><?php echo $row->quantite; ?></td>
                        <td><?php echo $row->prix; ?></td>
                        <?php
                            if($row-> quantite > 0)
                            {
                                ?>
                                <td > <span class="badge bg-success">en stock</span> </td>
                            <?php
                            }
                            else
                            {
                                ?>
                                <td > <span class="badge bg-danger">épuisé</span> </td>
                            <?php
                            }?>
                    </tr>
                    
                </table>

                

                        <?php } ?>
                        <a name="" id="" class="btn btn-primary mt-3" href="./produit.php" role="button">Retour</a>
                
        </div>
        </div>
       </div>
        
</body>
</html>