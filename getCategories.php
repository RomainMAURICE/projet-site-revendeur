<?php
	$debutLib = $_GET['debutLib'];// début du libellé du produit
	$bdd = new PDO("mysql:host=localhost;dbname=ajax;charset=UTF8", "root", '') 
	or die('Erreur connexion à la base de données');
	$requete = "select * from categories "; 
	$resultat = $bdd->query($requete);
	$lesCategories = $resultat->fetchAll(PDO::FETCH_ASSOC);
	return $lesCategories;
?>