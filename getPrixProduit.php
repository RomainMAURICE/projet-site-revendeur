<?php	
        $idProduit = $_GET['idProduit'];
	$bdd = new PDO('mysql:host=localhost;dbname=ajax;charset=UTF8', 'root', '') 
		or die('Erreur connexion à la base de données');
        $requete = "select pr_prix, pr_image from produit where pr_id = '".$idProduit."'";
        $resultat = $bdd->query($requete);
	if ($resultat){
                $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
        }
       echo json_encode($ligne);		
?>
