<?php

require_once 'Model.php';

class ModelGame extends Model {

	public static function select($data) {  //selectionne dans la table le jeu dont l'id est passé en paramètre
		try {
			// Preparation de la requete
			$req = self::$pdo->prepare('SELECT * FROM game WHERE game.id=:id');
			// execution de la requete
			$req->execute($data);

			if ($req->rowCount() != 0)
				return $req->fetch(PDO::FETCH_OBJ);
			return null;  // Optionel : si return est omis, Php envoie null dans tous les cas
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la recherche d\'un jeu donné dans la BDD');
		}
	}

	public static function selectAll() { // sélectionne tous les jeux de la table
		try {
			$sql = 'SELECT * FROM game';
			$req = self::$pdo->query($sql);

			// fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements 
			return $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la recherche de tous les jeux');
		}
	}

	public static function top10($data){ //renvoie les 10 meilleurs scores du jeu passé en paramètre
		  try {
			$req = self::$pdo->prepare("SELECT * FROM scores WHERE scores.id = :id ORDER BY score DESC LIMIT 0,10");
			
			$req->execute($data);
			
			// fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements 
			return $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la recherche des scores correspondant a un jeu donné.');
		}
	}
	
	
	public static function top10global(){ // renvoie les 10 meilleurs scores enregistré, quelque soit le jeu
		  try {
			$req = self::$pdo->prepare("SELECT * FROM scores ORDER BY score DESC LIMIT 0,10");
			
			$req->execute();
			
			// fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements 
			return $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la recherche des scores de tous les jeux.');
		}
	}
	
	
	/*pour ajouter un jeu ==> disparaitra au final*/
	 /********************************************/
	  /******************************************/
	   /****************************************/
	    /**************************************/ 
	     /************************************/
	   
	public static function insert($data) { 
		// $data est un tableau indexé par les champs de la table score
		try {
			// Preparation de la requete
			$req = self::$pdo->prepare('INSERT INTO game (id, descript) VALUES (:id, :desc)');
			// execution de la requete
			return $req->execute($data);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de l\'insertion d\'un jeu dans la BDD');
		}
	}
	/**************************************************/	
}




























?>
