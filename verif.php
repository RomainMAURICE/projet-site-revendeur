<?php 
session_start();
include 'accesBDD.php';
if (isset($_POST["login"])&& isset($_POST["mdp"])){
	$login = $_POST["login"];
	$mdp = $_POST["mdp"];
	$ret = verifLoginMdp($login, $mdp);
	if($ret) {
			$_SESSION["login"] = $login; // création de la variable de session
			header('location:ex.php');
	}
	else {
			$_SESSION["MesErreur"] = "Login ou mot de passe inexistant.";
			header('location:index.php');

	}
}
?>
