<?php
  include ('accesBDD.php');
  include('panier.php');
  session_start();
  if (!isset($_SESSION["login"])) {
    echo "Vous devez vous inscrire pour utiliser ce site";
    exit;
    }
  $p=new Panier();
  $panier=$p->getPanier();
  var_dump($panier);
?>
<html>
<head><title>Exercice</title>
<link rel="stylesheet" href="css/accueil.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
<form action="ex.php" method="post">

  <div class="col-md header">
    <img src="MeubleDesign.PNG" alt="logo">
    <h1>Votre panier</h1>
  </div>

<br>

  <div class="col-md tableau">
    <input type="submit" value="Revenir au catalogue">
    <?php
    foreach ($panier as $id => $qte) {
      $leProduit = getLibProduit($id);
      $lePrix = getLibPrix($id);
      //echo "<h1>Vos ".$leProduit." </h1>";
      //echo "<h1>Vos ".$lePrix." </h1>";
      echo $leProduit["pr_libelle"].", prix : ".$lePrix["pr_prix"]."€, quantitée : ".$qte." </br>";
      //echo "<th>Vos ".$nombre."  messages privée: </th>";
    }
    ?>

  </div>


</form>
</div>
</div>
</body>

</html> 
