<?php

class BddConnection{

	private $serveur = "localhost";
	private $bdd 	= "blocb";
	private $user = "root";
	private $password = "root";

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
	
}



?>