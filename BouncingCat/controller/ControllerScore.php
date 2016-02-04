<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelScore.php"
require_once MODEL_PATH . 'ModelScore.php';
require_once MODEL_PATH . 'ModelGame.php';

$jeux= ModelGame::selectAll();

	switch ($action) {
	
		case "created":
			if (!(isset($_SESSION['log']))){
				$log= "non connecté";			
			}
			else $log=$_SESSION['log'];
					
			if (!isset($_GET['id']) ){
				$view = 'error';
				$pagetitle = 'Erreur';
				$raison ="cet id n'existe pas";
				break;
			}
			
			$data = array(
				"login" => $log,
				"id" => $_GET["id"],
				"score" => $_GET["score"],
			);
			ModelScore::insert($data);
			
			$controller='game';
			$view='all';
			
		break;
/******************************************************************/
		default:
		
		case "all": // afficher tous les scores
			// Initialisation des variables pour la vue
			$tab_util = ModelScore::selectAll();
			// Chargement de la vue
			$view = 'all';
			$pagetitle = 'Liste des Scores';
		break;
		

	}
require VIEW_PATH.'view.php';
?>
