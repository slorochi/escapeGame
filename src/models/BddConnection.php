<?php

namespace App\models;

use PDO;
use PDOException;

class BddConnection
{


	//construct ou fichier config
	protected $serveur = "localhost";
	protected $bdd 	= "blocb";
	protected $user = "root";
	protected $password = "";

	//test la connect.
	protected function getconnect()
	{

		try {
			//connect à la base
			$db = new PDO("mysql:host=$this->serveur;dbname=$this->bdd;charset=utf8", $this->user, $this->password);

			return $db;
		}
		//si connect impossible
		catch (PDOException $erreur) {
			//affichage du message d'erreur
			return "Erreur : " . $erreur->getMessage();
		}
	}

	public function tous($table)
	{
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

	public function specifique($table, $champ, $id)
	{
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

	//////////////USER//////////////
	//méthode pour créer un utilisateur
	public function createUser(string $table, $elementToCreate)
	{
		$db = $this->getconnect();
		$sql = "INSERT INTO $table SET idUser = :idUser, nom = :nom, email = :email, mdp = :mdp, niveau = :niveau, adresse = :adresse, cp = :cp, ville = :ville";
		$rst = $db->prepare($sql);
		$rst->execute(
			[":idUser" => $elementToCreate->getIdUser(), ":nom" => $elementToCreate->getNom(), ":email" => $elementToCreate->getMail(), ":mdp" => $elementToCreate->getMdp(), ":niveau" => $elementToCreate->getNiveau(), ":adresse" => $elementToCreate->getAdresse(), ":cp" => $elementToCreate->getCp(), ":ville" => $elementToCreate->getVille()]
		);
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
	}

	public function deleteUser($idUser){
		$db = $this->getconnect();
		$sql ="DELETE FROM `user` WHERE `user`.`idUser` = :idUser";
		$rst = $db->prepare($sql);
		$rst->execute(
			[":idUser" => $idUser]);
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
	}
		//////////////ESCAPE GAME//////////////

	public function createEscape(string $table, $elementToCreate){
		$db = $this->getconnect();
		$sql = "INSERT INTO $table SET idEscape = :idEscape, nom = :nom, niveau = :niveau, idType = :idType, adresse = :adresse, cp = :cp, ville = :ville, description = :description";
		$rst = $db->prepare($sql);
		$rst->execute(
			[":idEscape" => $elementToCreate->getIdEscape(), ":nom" => $elementToCreate->getNom(), ":niveau" => $elementToCreate->getNiveau(), ":idType" => $elementToCreate->getIdType(), ":adresse" => $elementToCreate->getAdresse(), ":cp" => $elementToCreate->getCp(), ":ville" => $elementToCreate->getVille(), ":description" => $elementToCreate->getDescription()]
		);
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
	}


	// méthode pour modifier les infos dans la base de données
	// fonction à valider
	public function modifyChamp($table, $elementToPush, $nomChamp, $valeurChamp)
	{
		$db = $this->getconnect();
		/* $sql = " ALTER TABLE $table MODIFY $champ $element "; */
		/* UPDATE `user` SET `nom` = 'Theop' WHERE `user`.`idUser` = 2 */
		$sql = " UPDATE $table SET $nomChamp = :elementToPush WHERE idUser = :valeurChamp";
		$rst = $db->prepare($sql);
		$rst->execute(
			[":elementToPush" => $elementToPush, ":valeurChamp" => $valeurChamp]
		);
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
		//requête sql pour modifier le champ de la table sélectionnée
	}

	//////////////LEADER BOARD//////////////
	//méthode pour créer un leader board selon un filtre
	public function createLeaderboard($filtre)
	{
		$db = $this->getconnect();
		if ($filtre == "") {
			$sql = "SELECT user.nom as nomuser,escapegame.nom as nomescape,jouer.temps,jouer.date 
			FROM `jouer` 
			INNER JOIN `escapegame` ON jouer.idEscape =escapegame.idEscape 
			INNER JOIN `user` ON jouer.idUser = user.idUser
			ORDER BY jouer.temps;";
			$rst = $db->prepare($sql);
			$rst->execute();
		} else {
			$sql = "SELECT user.nom as nomuser,escapegame.nom as nomescape,jouer.temps,jouer.date 
			FROM `jouer` 
			INNER JOIN `escapegame` ON jouer.idEscape =escapegame.idEscape 
			INNER JOIN `user` ON jouer.idUser = user.idUser 
			WHERE escapegame.nom = :filtre
			ORDER BY jouer.temps;";
			$rst = $db->prepare($sql);
			$rst->execute([":filtre" => $filtre]);
		}
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
	}

	//////////////STATISTIQUE JOUEUR//////////////
	//méthode pour créer un leader board selon le nom d'un joueur 
	public function createStatsJoueur($NomUser)
	{
		$db = $this->getconnect();

		$sql = "SELECT user.idUser,escapegame.idEscape,user.nom as nomuser,escapegame.nom as nomescape,jouer.temps,jouer.date,jouer.note,jouer.message 
		FROM `jouer` 
		INNER JOIN `escapegame` ON jouer.idEscape =escapegame.idEscape 
		INNER JOIN `user` ON jouer.idUser = user.idUser 
		WHERE user.nom = '$NomUser'
		ORDER BY jouer.temps;";

		$rst = $db->prepare($sql);
		$rst->execute();
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
	}

	//methodes pour récupérer le nombre d'escape game
	public function getNumberEscapeGameJoueur($NomUser)
	{

		$db = $this->getconnect();
		$sql = "SELECT escapegame.idEscape, escapegame.niveau, user.nom
		FROM `jouer` 
		INNER JOIN `escapegame` ON jouer.idEscape =escapegame.idEscape 
		INNER JOIN `user` ON jouer.idUser = user.idUser 
		WHERE user.nom = '$NomUser'
		ORDER BY escapegame.niveau DESC;";

		$rst = $db->prepare($sql);
		$rst->execute();
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
	}

	//////////////MODIFY STATS JOUEUR//////////////
	// méthode pour modifier les infos dans la base de données
	public function modifyStatsJoueur($table, $elementToPush, $nomChamp, $idEscape, $idUser)
	{
		$db = $this->getconnect();
		$sql = " UPDATE $table SET $nomChamp = :elementToPush WHERE idEscape = :idEscape AND idUser = :idUser";
		$rst = $db->prepare($sql);
		$rst->execute(
			[":elementToPush" => $elementToPush, ":idEscape" => $idEscape, ":idUser" => $idUser]
		);
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
		//requête sql pour modifier le champ de la table sélectionnée
	}

	//////////////VILLES//////////////
	public function recupeVille()
	{
		$db = $this->getconnect();
		$sql = "SELECT DISTINCT escapegame.ville 
		FROM `escapegame`;";
		$rst = $db->prepare($sql);
		$rst->execute();
		return  $rst->fetchAll(PDO::FETCH_ASSOC);
	}
}
