<?php

require_once 'Model.php';

class ModelUtilisateur extends Model {

	public static function insert($data) { //creer un utilisateur 
		// $data est un tableau indexé par les champs de la table
		try {
			// Preparation de la requete
			$req = self::$pdo->prepare('INSERT INTO utilisateur (login, nom, prenom, email,mdp) VALUES (:login, :nom, :prenom, :email, :mdp)');
			// execution de la requete
			return $req->execute($data);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de l\'insertion d\'un utilisateur dans la BDD');
		}
	}

	public static function select($data) { //renvoie l'utilisateur correspondant au login donné en param
		try {
			// Preparation de la requete
			$req = self::$pdo->prepare('SELECT * FROM utilisateur WHERE utilisateur.login = :login');
			// execution de la requete
			$req->execute($data);

			if ($req->rowCount() != 0)
				return $req->fetch(PDO::FETCH_OBJ);
			return null;  // Optionel : si return est omis, Php envoie null dans tous les cas
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la recherche d\'un utilisateur donné dans la BDD');
		}   
	}

	public static function selectAll() { // liste de tous les utilisateurs
		try {
			$sql = 'SELECT * FROM utilisateur WHERE login!="admin"';
			$req = self::$pdo->query($sql);

			// fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements 
			return $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la recherche de tous les utilisateurs de la BDD');
		}
	}

	public static function delete($data) { //suppression de l'utilisateur dont le login est passé en parametre
		try {
			// Preparation de la requete
			$req = self::$pdo->prepare('DELETE FROM utilisateur WHERE utilisateur.login = :login');
			// execution de la requete
			$req->execute($data);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la suppression d\'un utilisateur dans la BDD');
		}
	}

	public static function update($data) { //mettre a jour de l'utilisateur dont le login est passé en parametre 
		try {
			// Preparation de la requete
			$req = self::$pdo->prepare('UPDATE utilisateur SET nom=:nom,prenom=:prenom,email=:email, mdp=:mdp WHERE login=:login');
			// execution de la requete
			return $req->execute($data);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la mise à jour d\'un utilisateur dans la BDD');
		}
	}
	
   	public static function ajoué($data) { //liste des scores fait par l'utilisateur dont le login est passé en parametre
		try {
			$sql = 'SELECT DISTINCT * FROM scores WHERE scores.login=:login';
			$req = self::$pdo->prepare($sql);
			$req->execute($data);
			// fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements 
			return $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la recherche des jeux du joueur');
		}
	}
	
	 public static function selectWhere($data) {
		try {
			$sql = "SELECT * FROM utilisateur WHERE utilisateur.login = :login AND utilisateur.mdp =:mdp";
			// Preparation de la requete
			$req = self::$pdo->prepare($sql);
			// execution de la requete
			$req->execute($data);
			return $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die("Erreur lors de la recherche dans la BDD " . static::$table);
		}
	}
}

?>
