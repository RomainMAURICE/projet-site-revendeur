<?php
  include ('accesBDD.php');
  include('panier.php');
  session_start();
  if (!isset($_SESSION["login"])) {
    echo "Vous devez vous inscrire pour utiliser ce site";
    exit;
    }
  if(isset($_POST["validerAchat"])){
    if($_POST["qte"] > 0){
        $qte=$_POST["qte"];
        $id=$_POST["listePdt"];
        $panier = new Panier();
        $panier->ajouter($id, $qte); 
        var_dump($panier->getPanier());
    }
    else{
      echo "quantite insufissante";
    }
  }
?>
<html>
<head><title>Exercice</title>
<link rel="stylesheet" href="css/accueil.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">

  <div class="col-sm header">
    <img src="MeubleDesign.PNG" alt="logo">
    <h1 class="txt">Choisir votre produit</h1>
  </div>

    <br>

  <div class="col-sm colCategorie">
    <p>Selectionner la categorie :</p>
    <select id="listeCategorie" size="1"  >
    <?php
      $lesCategories = getLesCategories();
      foreach ($lesCategories as $categorie) {
        echo "<option value = '".$categorie['ca_id']."'>".$categorie['ca_libelle']."</option>";
      }
    ?>
    </select>
  </div>
  <form action="ex.php" method="post">  

  <div class="col-sm choix">
    <p>Choisir le produit :</p>
    <select name="listePdt" id="listePdt" size="4" ></select>
  </div>

  <div class="col-sm photo">
    <p>Photo :</p><br>
    <img id ="idImage" src="">
  </div>

  <div class="col-sm prix">
    <p>Prix :</p>
    <div id = "idPrix"></div>
  </div>

  <div class="col-md quantité">
      <p>Saisir la quantité commandée :</p>
      <input type="text" name="qte" style="width:50px">
  </div>

  <div class="col-md boutons">      
    <input type="submit" value="Valider l'achat" name="validerAchat"><br><br>
    </form>

    <form action="pagePanier.php" method="post">
      <input type="submit" value="Voir le pannier">
    </form>
  </div>

</div>
</body>
</html>

<script>
  let listeCategorie = document.getElementById("listeCategorie");
  listeCategorie.addEventListener("change", recupProduit);
  let listePdt = document.getElementById("listePdt");
  listePdt.addEventListener("change", recupPrix);
  listePdt.addEventListener("click", recupPhoto);
  function recupProduit(){
    let listeCategorie = document.getElementById("listeCategorie");
    let idCategorie = listeCategorie.value;
    fetch("getProduitsCateg.php?idCategorie="+ idCategorie)
    .then(response => response.json())
    .then(data => {
        let listePdt = document.getElementById("listePdt");
        listePdt.length = data.length;
        for (let i = 0 ; i < data.length ; i++){
          listePdt.options[i].text = data[i]["pr_libelle"];
          listePdt.options[i].value = data[i]["pr_id"];
        }
    })
    .catch(function (error) {
      console.log('Request failed', error);
  });
  } 
  function recupPrix(){
    let listePdt = document.getElementById("listePdt");
    let idProduit = listePdt.value;
    fetch("getPrixProduit.php?idProduit="+ idProduit)
    .then(response => response.json())
    .then(data => {
        let idPrix = document.getElementById("idPrix");
        idPrix.innerHTML = data["pr_prix"];
    })
    .catch(function (error) {
      console.log('Request failed', error);
  });
  } 
  function recupPhoto(){
    let idProduit = listePdt.value;
    fetch("getPhotoProduit.php?idProduit="+ idProduit)
    .then(response => response.json())
    .then(data => {
            if (data['pr_image'] != "") {
              
              let idImage = document.getElementById("idImage");
              idImage.src= data["pr_image"];

            }
    })
    .catch(function (error) {
      console.log('Request failed', error);
  });
  }     
</script>


