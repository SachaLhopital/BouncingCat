<?php

define('VIEW_PATH', ROOT . DS . 'view' . DS);

// On va chercher le modele dans "./model/ModelUtilisateur.php"
require_once MODEL_PATH . 'ModelUtilisateur.php';

require_once MODEL_PATH . 'ModelGame.php';

$jeux= ModelGame::selectAll();
$users= ModelUtilisateur::selectAll();
switch ($action) {
	case "read":
		if (!isset($_GET['login'])) {
			$view = 'error';
			$pagetitle = 'Erreur avec l\'utilisateur';
			$raison ="le login n'a pas été passé en param pour lire les détails";
			break;
		}
		// Initialisation des variables pour la vue		
		$data = array(
		"login" => $_GET['login']
		);
		$u = ModelUtilisateur::select($data);
		$aj=ModelUtilisateur::ajoué($data);
		// Chargement de la vue
		if (is_null($u) ) {
			$view = 'error';
			$pagetitle = 'Erreur avec l\'utilisateur';
			$raison="le login passé ne correspond a aucun utilisateur";
		} else {
			$view  = 'find';
			$pagetitle = "Détails de ".$_GET['login'];
		}
		break;

	case "create":
		$view = 'createUpdate';
		$pagetitle = 'Inscription';
		break;

	case "created":
		if (!(isset($_GET['login']) && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['email']) && isset($_GET['mdp'])&& isset($_GET['mdpConf']))) {
			$view = 'error';
			$pagetitle = 'Erreur avec l\'utilisateur';
			$raison ="il manque des infos pour la création";
			break;
		}
		if(($_GET['mdp'])<>($_GET['mdpConf'])){
			$view = 'error';
			$pagetitle = 'Erreur avec l\'utilisateur';
			$raison ="les mots de passes ne correspondent pas";
			break;
		}
		
		$data = array(
			"login" => $_GET["login"],
			"nom" => $_GET["nom"],
			"prenom" => $_GET["prenom"],
			"email" => $_GET["email"],
			"mdp" => hash('sha256', Conf::getSeed().$_GET['mdp'])
		);
		ModelUtilisateur::insert($data);
		// Initialisation des variables pour la vue
		$login = $_GET['login'];
		$view = 'done';
		$doned = 'créé';
		$pagetitle = 'Création d\'un utilisateur effectuée';
		break;
		
	case "update":
		if (!isset($_GET['login'])) {
			$view = 'error';
			$pagetitle = 'Erreur avec l\'utilisateur';
			$raison = "le login n'a pas été passé en param pour mettre a jour";
			break;
		}
		$data = array("login" => $_GET['login']);
		$u = ModelUtilisateur::select($data);
		$l = $u->login;
		$n = $u->nom;
		$p = $u->prenom;
		$e = $u->email;
		$view = 'createUpdate';
		$pagetitle = "Mise à jour";
		break;
		
	case "updated":
		if (!(isset($_GET['login']) & isset($_GET['nom']) & isset($_GET['prenom']) & isset($_GET['email']) && isset($_GET['mdp'])&& isset($_GET['mdpConf']))) {
			$view = 'error';
			$pagetitle = 'Erreur avec l\'utilisateur';
			$raison="il manque des infos pour la mise a jour";
			break;
		}
		if(($_GET['mdp'])<>($_GET['mdpConf'])){
			$view = 'error';
			$pagetitle = 'Erreur avec l\'utilisateur';
			$raison ="les mots de passes ne correspondent pas";
			break;
		}
		$data = array(
			"login" => $_GET["login"],
			"nom" => $_GET["nom"],
			"prenom" => $_GET["prenom"],
			"email" => $_GET["email"],
			"mdp" => hash('sha256', Conf::getSeed().$_GET['mdp'])
		);
		ModelUtilisateur::update($data);
		// Initialisation des variables pour la vue
		$login = $_GET['login'];
		// Chargement de la vue
		$view = 'done';
		$doned = 'mis à jour';
		$pagetitle = "Mise à jour de ".$_GET['login']." effectuée";
		break;

	case "delete":
		if (!isset($_GET['login'])) {
			$view = 'error';
			$pagetitle = 'Erreur avec l\'utilisateur';
			$raison="le login n'a pas été passé en param pour la suppression";
			break;
		}
		$data = array("login" => $_GET['login']);
		$u = ModelUtilisateur::delete($data);
		// Initialisation des variables pour la vue
		$login = $_GET['login'];
		// Chargement de la vue
		$view = 'done';
		$doned = 'supprimé';
		$pagetitle = "Suppression de ".$_GET['login']." effectuée";
		break;

	case "connect":
		
		$l = "";
		$mdp = "";
		$view='connect';
		break;
	
	case "connected": 
		$data = array(
			'login'=> $_GET['log'],
			'mdp'=> hash('sha256', Conf::getSeed().$_GET['mdp'])
		); 
		if( count(ModelUtilisateur::selectWhere($data))==1){
			$_SESSION['log'] = $_GET['log'];
			$_SESSION['mdp'] = hash('sha256', Conf::getSeed().$_GET['mdp']);
		}
		else{
			$view = 'error';
			$pagetitle = 'Erreur avec l\'utilisateur';
			$raison ="login ou mot de passe invalide";
			break;
		}	
		// Initialisation des variables pour la vue
	if (Session::is_user('admin')){ 
		$controller='utilisateur'; 
		$pagetitle='Liste des utilisateurs';
		$view='list';
	}
	else{
		$controller='game';
		$pagetitle = 'Liste des jeux';
		$view = 'all';
	}
		break;
		
		
	case "deconnect":
		
		session_destroy();
		unset($_SESSION);
		$view = 'all';
		$controller='game';
		$pagetitle = 'Liste des jeux';
		break;
		break;

	default:
	// Si l'action est inconnue, nous effectuerons 'readAll'

	case "all":
		// Initialisation des variables pour la vue
		// Chargement de la vue
		$view = 'list';
		$pagetitle = 'Liste des utilisateurs';
		break;
		
	}

require VIEW_PATH.'view.php';
	
?>
