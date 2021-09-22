<?php

define("BDD","ajax");
define("USER_BDD","root");
define("PASSWORD_USER","");
define("SERVEUR","localhost");

function verifLoginMdp($pLogin, $pMdp)
{
    //$retour = false;
    //update revendeur
    //sct mdp=md5(mdp);
    $pMdp=md5($pMdp);
    $connexion = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
                or die('Erreur connexion à la base de données');
    $requete="select * from revendeur where mail = '$pLogin' and mdp ='$pMdp';";
    echo $requete;
    $resultat = $connexion->query($requete);
    if ($resultat){
        $utilisateur = $resultat->fetch();
    }
    return $utilisateur;
}

function getLesCategories() {
    $lesCategories = null;
    $bdd = new PDO('mysql:host=localhost;dbname=ajax;charset=UTF8', 'root', '') 
    or die('Erreur connexion à la base de données');
    $requete = "select * from categorie";
    $resultat = $bdd->query($requete);
    $lesCategories = $resultat->fetchAll();
    return $lesCategories;
}


function getPhoto($pPr_id) 
{   
  $lesPhoto = null;
  $connexion = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
          or die('Erreur connexion à la base de données'); 
  $requete="select photo from produit where pr_id = '$pPr_id';";
  $resultat = $connexion->query($requete);
  $lesPhoto = $resultat->fetchAll();
  return $lesPhoto;
}

function getLibProduit($pPr_id) {
  $lesProduit = null;
  $connexion = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
          or die('Erreur connexion à la base de données'); 
  $requete="select pr_libelle from produit where pr_id = '$pPr_id';";
  $resultat = $connexion->query($requete);
  $lesProduit = $resultat->fetch();
  return $lesProduit;
}

function getLibPrix($pPr_id) {
  $lePrix = null;
  $connexion = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
          or die('Erreur connexion à la base de données'); 
  $requete="select pr_prix from produit where pr_id = '$pPr_id';";
  $resultat = $connexion->query($requete);
  $lePrix = $resultat->fetch();
  return $lePrix;
}
?>