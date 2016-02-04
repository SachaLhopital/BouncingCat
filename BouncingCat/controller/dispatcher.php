
	
<?php

session_name("session_Utilisateur"); //on lance une session
session_start();
require_once ROOT . DS . 'config' . DS . "Session.php";
define('MODEL_PATH', ROOT . DS . 'model' . DS);
if (Session::is_user('admin')){ 									//si on est admin on tombe sur la liste des utilisateurs
	if (isset($_GET['controller']))
		$controller = $_GET['controller']; //recupere le controlleur passe dans l'url
	else
		$controller = "utilisateur";

	if (isset($_GET['action']))
		$action = $_GET['action'];	//recupere l'action  passee dans l'url
	else
	$action = "readAll";
}
	else{													//sinon on tombe sur la liste des zzjeux
	if (isset($_GET['controller']))
		$controller = $_GET['controller']; //recupere le controlleur passe dans l'url
	else
		$controller = "game";

	if (isset($_GET['action']))
		$action = $_GET['action'];	//recupere l'action  passee dans l'url
	else
		$action = "all";
}
switch ($controller) {
	case "utilisateur":
		require_once "ControllerUtilisateur.php";
		break;

	case "game":
		require_once "ControllerGame.php";
		break;

	case "score":
		echo('Le controleur score est utilisté');
		require_once "ControllerScore.php";
		break;

	default:
}
?>
