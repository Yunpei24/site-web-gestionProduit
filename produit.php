
<?php 
       session_start();
       // faire appel a la base de donnees
       require_once 'db.php';
       if ($_SESSION['username'] == null) {
           echo "<script>alert('Please login.');</script>";
           header("Refresh:0 , url=index.php");
           exit();
       }
       
        $stmt = $pdo->query('SELECT * FROM produit');

        if(isset($_REQUEST['del']))
        {
            $sup = intval ($_GET['del']);

            $sql = "DELETE FROM produit WHERE id_produit=:id_produit";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id_produit', $sup , PDO::PARAM_STR);
            $query->execute();
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
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php require_once 'navbar.php'; ?>
            <div class="container">
                <table class="table table-striped display mt-3" id="example">
                    <thead>
                        <th>image</th>
                        
                        <th>Designation</th>
                        
                        <th>Prix (CFA)</th>
                        
                        <th style='text-align:center'>Action</th>
                    </thead>
                    <tbody>
                    <?php 
                    while ( $row =  $stmt->fetch())
                    {
                        ?>
                    
                        <tr>
                            <td><img src="./uploads/<?php echo $row-> images; ?>" alt=" "  class="image_product"></td>
                            
                            <td><?php echo $row-> nom_article; ?> </td>
                            
                            <td><?php echo $row-> prix; ?> </td>
                            
                            <td>
                                    <a href="details.php?id=<?php echo $row->id_produit;?>"><button class="btn btn-info" >Détail</i></button></a>
                                    <a href="updateProduit.php?id=<?php echo $row->id_produit;?>"><button class="btn btn-primary" ><i class="fas fa-edit"></i></button></a>
                                    <a href="produit.php?del=<?php echo $row->id_produit;?>"><button class="btn btn-danger" OnClick="return confirm ('Voulez vous vraiment suprimer')"><i class="fas fa-trash"></i></button></a>
                            
                            </td>
                        </tr>
                       <?php 
                    } ?>
                       
                    </tbody>
             </table>
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