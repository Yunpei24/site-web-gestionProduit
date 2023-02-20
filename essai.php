<?php 
       session_start();
       // faire appel a la base de donnees
       require_once 'db.php';
       
        $stmt = $pdo->query('SELECT * FROM produit');
    ///////////////////////////////////////////////
    //  IL FAUDRA UTILISER TA BASE DE DONNEES   //
    ///////////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles/style-data.css" rel="stylesheet" type="text/css" />
  <title>Listes des Patients</title>
</head>
 
<body class="bg-light">
 
  <div class="container bg-argent p-5 mt-5">
    <!-- Logo -->
    <div>
      <img src="images/logo.png" class="img-fluid">
    </div>
    <!-- Button to call the praducts -->
    <button class="btn btn-primary mt-2 mb-2" onclick='populateTableList()'>Afficher toute la liste</button>
    <!-- Table  -->
    <table class="table table-image">
      <thead class="thead-blue">
        <tr class="text-center">
          <th>Nom</th>
          <th>Prénom(s)</th>
          <th>Date de consultation</th>
          <th>Actions</th>
        </tr>
      </thead>
      <!-- Table body with the list of products -->
      <tbody id="patientList">
      <?php 
                    while ( $row =  $stmt->fetch())
                    {
                        ?>
                        <tr class="text-center">  
                        <td class="w-25 align-middle"><?php echo $row-> nom_article; ?> </td>
                        <td class="w-25 align-middle"><?php echo $row-> prix; ?> </td>
                        <td class="w-25 align-middle"><?php echo $row->code_article; ?></td>
                            <td>
                                <a href="details.php?id=<?php echo $row->id_produit;?>"><button class="btn btn-info" >Détail</i></button></a>
                            </td>
                        </tr>
                       <?php 
                    } ?>
      </tbody>
    </table>
 
  </div>
  <!-- Footer -->
  <footer class="container fixed-bottom  bg-blue text-light">
    <div class=" text-center py-3">Copyright &copy; 2022 HAPS-TEAM</div>  
  </footer>
<!-- Code javaScript -->
  <script src="code.js"></script>
</body>
 
</html>