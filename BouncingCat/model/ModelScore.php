<?php

require_once 'Model.php';

class ModelScore extends Model {

	public static function selectAll() { //renvoie tous les scores de la base de donnée
		try {
			$sql = 'SELECT * FROM scores';
			$req = self::$pdo->query($sql);

			// fetchAll retoure un tableau d'objets représentant toutes les lignes du jeu d'enregistrements 
			return $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de la recherche de tous les scores');
		}
	}
	
	
	public static function insert($data) { //rajouter un score dans la base de donnée
		// $data est un tableau indexé par les champs de la table score
		try {
			// Preparation de la requete
			$req = self::$pdo->prepare('INSERT INTO scores (login, id, score) VALUES (:login, :id, :score)');
			// execution de la requete
			return $req->execute($data);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die('Erreur lors de l\'insertion d\'un score dans la BDD utilisateur');
		}
	}
}
