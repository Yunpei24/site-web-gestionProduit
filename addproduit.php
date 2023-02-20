<?php
session_start();
// faire appel a la base de donnees
require_once 'db.php';
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.php");
    exit();
}
   
// ajouter un produit depuis le formulaire 
if(isset($_POST['ajouter']) && !empty($_POST['code_article'])
                            && !empty($_POST['nom_article'])
                            && !empty($_POST['quantite'])
                            && !empty($_POST['prix'])

)
{   
    $code_article = $_POST['code_article'];
    $nom_article = $_POST['nom_article'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
 

        $images=$_FILES['profile']['name'];
		$tmp_dir=$_FILES['profile']['tmp_name'];
		$imageSize=$_FILES['profile']['size'];
		$upload_dir='uploads/';
		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		$valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		$picProfile=rand(1000, 1000000).".".$imgExt;
		move_uploaded_file($tmp_dir, $upload_dir.$picProfile);

        $sql ="INSERT INTO produit(code_article, nom_article, images, quantite, prix)
         VALUES (:code_article, :nom_article, :pic, :quantite, :prix)";
         $stmt = $pdo->prepare($sql);

         $stmt->bindParam(':code_article', $code_article);
         $stmt->bindParam(':nom_article', $nom_article);
         $stmt->bindParam(':pic', $picProfile);
         $stmt->bindParam(':quantite', $quantite);
         $stmt->bindParam(':prix', $prix);


         $stmt->execute();
         header('Location:addproduit.php');
}
            $stmt = $pdo->query('SELECT * FROM produit');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/icon.png">
    <title>Ajouter des Produits</title>
</head>
<body>
<?php require_once 'navbar.php'; ?>
   
    <div class="container">
        <div class="row">
            <div class="col-2 mt-3">
               <form action="addproduit.php" class="form-group mt-3" method="POST" enctype="multipart/form-data" >
                <label for="">Image du Produit :</label>
                     <input type="file" class="form-control mt-3" name="profile" accept="*/image">
                   <label for="">Code Article :</label>
                   <input type="text" class="form-control mt-3" name="code_article" required>
                   <label for="">Designation du Produit:</label>
                   <input type="text" class="form-control mt-3" name="nom_article" required>
                   <label for="">Quantite :</label>
                   <input type="text" class="form-control mt-3" name="quantite" required>
                   <label for="">Prix (CFA):</label>
                   <input type="text" class="form-control mt-3" name="prix" required>
                   <button type="submit" class="btn btn-primary mt-3" name="ajouter">Enregistrer</button>
               </form>
            </div>
            <div class="col-10 mt-3">
                <table class="table table-striped display" id="example">
                    <thead>
                        <th>Image</th>
                        <th>Code Article</th>
                        <th>Designation</th>
                        <th>Quantite</th>
                        <th>Prix (CFA)</th>
                    </thead>
                    <tbody>
                    <?php 
                    while ( $row =  $stmt->fetch())
                    {
                        ?>
                    
                        <tr>
                            <td><img src="./uploads/<?php echo $row-> images; ?>" alt=" "  class="image_product "></td>
                            <td><?php echo $row-> code_article; ?> </td>
                            <td><?php echo $row-> nom_article; ?> </td>
                            <td><?php echo $row-> quantite; ?> </td>
                            <td><?php echo $row-> prix; ?> </td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
                $(document).ready(function() {
                    $('#example').DataTable( {
                        "scrollY":        "500px",
                        "scrollCollapse": true,
                        "paging":         false
                        } );
                    } );
            </script>
</body>
</html>