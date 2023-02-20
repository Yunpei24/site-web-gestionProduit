
<?php 
       session_start();
       // faire appel a la base de donnees
       require_once 'db.php';
       if ($_SESSION['username'] == null) {
           echo "<script>alert('Please login.');</script>";
           header("Refresh:0 , url=index.php");
           exit();
       }
       
        $stmt = $pdo->query('SELECT * FROM user');

        if(isset($_REQUEST['del']))
        {
            $sup = intval ($_GET['del']);

            $sql = "DELETE FROM user WHERE id=:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $sup , PDO::PARAM_STR);
            $query->execute();
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
    <title>Liste des Gestionnaires</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php require_once 'navbar.php'; ?>
            <div class="container">
                <table class="table table-striped display mt-3" id="example">
                    <thead>
                        <th>Identifiant</th>
                        
                        <th>Nom</th>
                        
                        <th>Nom d'Utilisateur</th>
                        
                        <th style='text-align:center'>Action</th>
                    </thead>
                    <tbody>
                    <?php 
                    while ( $row =  $stmt->fetch())
                    {
                        ?>
                    
                        <tr>
                            <td><?php echo $row-> id; ?> </td>
                            
                            <td><?php echo $row-> name; ?> </td>
                            <td><?php echo $row-> username; ?> </td>
                            
                            <td>
                                    <a href="updateGestionnaire.php?id=<?php echo $row->id;?>"><button class="btn btn-primary" ><i class="fas fa-edit"></i></button></a>
                                    <a href="gestionnaires.php?del=<?php echo $row->id;?>"><button class="btn btn-danger" OnClick="return confirm ('Voulez vous vraiment suprimer')"><i class="fas fa-trash"></i></button></a>
                            
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