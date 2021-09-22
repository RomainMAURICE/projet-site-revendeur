<?php
    $idProduit = $_GET['idProduit']; 
    //$idProduit = 1; 
	$bdd = new PDO('mysql:host=localhost;dbname=ajax;charset=UTF8', 'root', '') 
		or die('Erreur connexion à la base de données');
        $requete = "select pr_prix from produit where pr_id = '$idProduit'";
        $resultat = $bdd->query($requete);
        //$prix = $resultat->fetchAll(PDO::FETCH_ASSOC);
        $prix = $resultat->fetch(PDO::FETCH_ASSOC);
        echo json_encode($prix);
?>
