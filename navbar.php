<?php 
    //session_start();
    // faire appel a la base de donnees
    require_once 'db.php';
    if ($_SESSION['username'] == null) {
        echo "<script>alert('Please login.');</script>";
        header("Refresh:0 , url=index.php");
        exit();
    }
    $name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="icon" href="./images/icon.png">
    <title>Document</title>
    <style>
        body {
            font-family: "Mitr", sans-serif;
            background-color: rgb(110, 215, 247);
        }
    </style>
</head>
<body>
<header>
        <nav class="navbar">
            <a href="accueil.php"> <p class="logo">Accueil</p></a>
           <a href="addproduit.php"> <p class="logo">Ajouter Produits</p></a>
           
            <ul class="navlinks">
                
                    <li><a href="#"><table style="background-color:green; text-align:center weight:5px"><tr><th>
                        <?php echo $name ?><br>en ligne <i class="fa fa-check" aria-hidden="true" style='color: white'></i>
                        </th></tr></table></a></li>
    
                <li><a href="produit.php">Listes des Produits</a></li>
                <li><a href="gestionnaires.php">Les Gestionnaires</a></li>
                <li><a href="logout.php">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</body>
</html>