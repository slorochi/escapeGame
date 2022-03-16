<?php

namespace App\models;

use PDO;
use PDOException;

class BddConnection{


	//construct ou fichier config
	protected $serveur = "localhost";
	protected $bdd 	= "blocb";
	protected $user = "root";
	protected $password = "";  // null si wamp
	
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
	
	// méthode pour modifier les infos dans la base de données
	public function modifyChamp($table, $champ, $element){
		$db = $this->getconnect();
		$sql = " ALTER TABLE $table MODIFY $champ $element ";
		//requête sql pour modifier le champ de la table sélectionnée
	}

	// méthode afin de créer un champ d'une table dans la base de données
	public function createElement(string $table, object $elementToCreate){
		
		$elements = "";
		$db = $this->getconnect();
		foreach($elementToCreate as $info){

			$elements .= $info.",";

        }
		$elements = rtrim($elements,",");
		$sql = " INSERT INTO $table VALUES ($elements) ";
		$rst = $db->query($sql);
		return $rst->fetchAll(PDO::FETCH_ASSOC);

	}


	/* // méthode pour push les infos user dans la base de données lors d'une création de compte
	public function createAccount($parametreAutiliserDansLeRepositoryQuiVaEtreReUtiliseeDansLeController){
		$db = $this->getconnect();
		$sql = "ALTER TABLE $table * FROM $table WHERE $champ = :id";
		//requête sql pour créer un nouveau user dans la BDD
	} */
}

/*  $post->createAccount->
 */
?>