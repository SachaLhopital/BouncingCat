<?php
if (!defined('VIEW_PATH'))
define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelGame.php"
require_once MODEL_PATH . 'ModelGame.php';
$jeux= ModelGame::selectAll();
switch ($action) {
	case "read":	//voir les détails d'un jeu 
		//on verifie qu'on ait bien l'id du jeu
		if (!isset($_GET['id'])) {
			$view = 'error';
			$pagetitle = 'Erreur';
			$raison = "L'identifiant du jeu n'a pas été passé en paramètre !";
			break;
		}
		// Initialisation des variables pour la vue		
		$data = array("id" => $_GET['id']);
		$g = ModelGame::select($data); // on selectionne le jeu dans la table
		// Chargement de la vue
		if (is_null($g)) {
			$view = 'error';
			$pagetitle = 'Erreur';
			$raison="L'identidiant récupéré ne correspond a aucun jeu !";
		} else {
			$view  = 'Read';
			$pagetitle = "Détails de ".$_GET['id'];
		}
	break;	
		
		
	/*pour ajouter un jeu ==> disparaitra au final*/
	 /********************************************/
	  /******************************************/
	   /****************************************/
	    /**************************************/ 
	     /************************************/
	case "create": //pour ajouter un jeu, va afficher un formulaire
			$view = 'ajout';
			$pagetitle = 'Ajout jeu ';
	break;
		
	case "created":
		if (!isset($_GET['id'])){
			$view = 'error';
			$pagetitle = 'Erreur';
			break;
		}
		$data = array(
			"id" => $_GET["id"],
			"desc" => $_GET["desc"],
		);
		ModelGame::insert($data);
			$view = 'all';
			$pagetitle = 'Liste des jeux ';
	break;
	
	/***********************************************/
	
	case "classement": //afficher le top 10 général ou d'un jeu si il est passé en parametre
		if (!isset($_GET['id']) or $_GET['id']=='DefoulCat'){
			$tab_util = ModelGame::top10global();
			$view='Top10Global';
			$pagetitle='Top10';		
		}
		else{ 
			$id = $_GET['id'];
			$data = array(
				"id" => $id
			);
		
			$tab_util = ModelGame::top10($data);
			$view='Top10';
			$pagetitle='Top10 de '.$_GET['id'];
		}	
	require VIEW_PATH.'game'.DS.'view'.$view.'Game.php';  //pour éviter la zone classement recoivent toute une page qui s'appelle elle meme indéfiniment
	
	break;
	
	case "top10":
		if (!isset($_GET['id'])){
			$view = 'error';
			$pagetitle = 'Erreur';
			$raison = "l'id n'a pas été passé pour voir le top 10";
			break;
		}
		else{ 
			$id = $_GET['id'];
			$data = array(
				"id" => $id
			);
		
			$tab_util = ModelGame::top10($data);
			$view='top10';
			$pagetitle='Top10 de '.$_GET['id'];
		}
	break;
		
	case "jouer":
		if (!isset($_GET['id'])){
			$view = 'error';
			$pagetitle = 'Erreur';
			$raison = "l'id n'a pas été passé pour jouer";
			break;
		}
		$data = array(
		"id" => $_GET['id']
		);
		
		$tab_util = ModelGame::select($data);
		$pagetitle=$_GET['id'];
		require VIEW_PATH.'game'.DS.'viewJouerGame.php';
	
	break;
	
		
	default:
	
	case "all": //afficher tous les jeux
			$view = 'all';
			$pagetitle = 'Liste des jeux';
	break;
}


if($action<>'classement' and $action<>'jouer')
require VIEW_PATH.'view.php';








	
?>
