<?php

namespace App\models;

use PDO;
use PDOException;

class BddConnection{


	//construct ou fichier config
	protected $serveur = "localhost";
	protected $bdd 	= "blocb";
	protected $user = "root";
	protected $password = "";
	
	//test la connect.
	protected function getconnect(){

		try{
			//connect à la base
			$db = new PDO("mysql:host=$this->serveur;dbname=$this->bdd",$this->user,$this->password);
			return $db;
		}
		//si connect impossible
		catch(PDOException $erreur){
		//affichage du message d'erreur
		return "Erreur : ". $erreur->getMessage();
		}

	}

	public function tous($table){
		$db = $this->getconnect();
		//recupère l'objet global (car une variable dans le programme principal 
		//n'arrive pas dans une fx
		//donc récup de la variable globale pour la copier dans une variable locale.
		//création de la requête
		$sql = "SELECT * FROM $table";
		//envoi de la req. à la BDD + retour (format OBJ)
		$rst = $db->query($sql);
		//conversion format OBJ en tableau assoc.
		return $rst->fetchAll(PDO::FETCH_ASSOC);
	}

	public function specifique($table,$champ,$id){
		$db = $this->getconnect();
		$sql = "SELECT * FROM $table WHERE $champ = :id";
		//echo $sql;
		//prepare la requête avant de l'executer
		$rst = $db->prepare($sql);
		//execute la requête
		$rst->execute([":id" => $id]);
		//conversion format OBJ en tableau assoc.
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
	}
	

	// méthode pour créer un élément d'une table dans la base de données

		//////////////USER//////////////

	public function createUser(string $table, $elementToCreate){
		$db = $this->getconnect();
		$sql = "INSERT INTO $table SET idUser = :idUser, nom = :nom, email = :email, mdp = :mdp, niveau = :niveau, adresse = :adresse, cp = :cp, ville = :ville" ;
		$rst = $db->prepare($sql);
		$rst->execute(
			[":idUser" => $elementToCreate->getIdUser(), ":nom" => $elementToCreate->getNom(), ":email" => $elementToCreate->getMail(), ":mdp" => $elementToCreate->getMdp(), ":niveau" => $elementToCreate->getNiveau(), ":adresse" => $elementToCreate->getAdresse(), ":cp" => $elementToCreate->getCp(), ":ville" => $elementToCreate->getVille()]);
		return  $rst->fetchAll(PDO::FETCH_ASSOC); 
	}

		//////////////ESCAPE GAME//////////////

	public function createEscape(string $table, $escapeToCreate){
		$db = $this->getconnect();
		$sql = "INSERT INTO $table SET idEscape = :idEscape, nom = :nom, niveau = :niveau, idType = :idType, adresse = :adresse, cp = :cp, ville = :ville" ;
		$rst = $db->prepare($sql);
		$rst->execute(
			[":idEscape" => $escapeToCreate->getIdEscape(), ":nom" => $escapeToCreate->getNom(), ":niveau" => $escapeToCreate->getNiveau(), ":idType" => $escapeToCreate->getidType(), ":adresse" => $escapeToCreate->getAdresse(), ":cp" => $escapeToCreate->getCp(), ":ville" => $escapeToCreate->getVille()]);
		return  $rst->fetchAll(PDO::FETCH_ASSOC); 
	}


	// méthode pour modifier les infos dans la base de données
	// fonction à valider
	public function modifyChamp($table, $elementToPush, $nomChamp, $valeurChamp){
		$db = $this->getconnect();	
		/* $sql = " ALTER TABLE $table MODIFY $champ $element "; */
		/* UPDATE `user` SET `nom` = 'Theop' WHERE `user`.`idUser` = 2 */
		$sql = " UPDATE $table SET $nomChamp = :elementToPush WHERE $table . 'idUser' = :valeurChamp";
		$rst = $db->prepare($sql);
		$rst->execute(
			[":elementToPush" => $elementToPush, ":valeurChamp" => $valeurChamp]);
		return  $rst->fetchAll(PDO::FETCH_ASSOC); 
		//requête sql pour modifier le champ de la table sélectionnée
	}
}

?>