<?php
    session_start();
    // faire appel a la base de donnees
    require_once 'db.php';
    if ($_SESSION['username'] == null) {
        echo "<script>alert('Please login.');</script>";
        header("Refresh:0 , url=index.php");
        exit();
    }
	$name = $_SESSION['name']
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./style-page-accueil.css" />
		<link rel="icon" href="./images/icon.png">
		<title>Page d'accueil</title>
	</head>
	<body>
		
		<div class="container">
			<nav>
				<p style="font-size:25px; color:white; text-align:center">
					<?php echo $name ?><br>en ligne
				</p>
				<ul>
					<li><a href="./produit.php">Liste des Produits</a></li>
					<li><a href="./gestionnaires.php">Liste des Gestionnaires</a></li>
					<li><a href="./member.php">Ajouter un Gestionnaire</a></li>
					<li><a href="./logout.php">Se déconnecter</a></li>
				</ul>
			</nav>

			<section class="site-container">
				<p>Bienvenu dans l'Application Web de Gestion de Produits</p>
                <h1>BS@2JYEN</h1>
				<h4>BS@2JYEN, FIABLE ET SECURISE</h4>
			</section>

            <section class="social-icons">
                <a href="#"><img src="./images/instagram-fill.png" alt=""></a>
                <a href="https://t.me/+__DDr9r5fCE5ODc0"><img src="./images/telegram-fill.png" alt=""></a>
                <a href="https://drive.google.com/file/d/1LCvWSQutlp0zz19nor2aPcTEpOq6EGrB/view?usp=sharing" target="_blank"><img src="images/drive-fill.png" alt=""></a>
            </section>
		</div>
	</body>
</html>