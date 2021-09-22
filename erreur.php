<?php 
	include 'accesBDD.php';
?>
<html>
<head><title> Erreur </title></head>
<body>
<h1> Erreur <br/>pour l'accès au site </h1>
<form action="inscription.php" method="post">
    <br />
    <input type="submit" value="Retour" />
</form>
</body>
</html>
<?php
   	if(isset($_POST["login"]) and isset($_POST["mdp"])){
   		$login = $_POST["login"];
		$mdp = $_POST["mdp"];
		$ret = verifLogin($login);
		if($ret) {
			echo "Le login que vous voulez utiliser existe deja !";
			
		}
		else {
			$new = insertUtilisateur($login, $mdp);
			header('location:identification.html');
		}
   	}
?>