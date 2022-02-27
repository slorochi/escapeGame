<?php

// use Database\BddConnection;

$serveur 	= "localhost";
$bdd 		= "testblocb";
$user 		= "root";
$password 	= "root";

//test la connect.
try{
	//connect à la base
	$db = new PDO("mysql:host=$serveur;dbname=$bdd",$user,$password);	
}catch(PDOException $erreur){//si connect impossible
	//affichage du message d'erreur
	echo "Erreur : ". $erreur->getMessage();
}


function tous($table){
	//recupère l'objet global (car une variable dans le programme principal 
	//n'arrive pas dans une fx
	//donc récup de la variable globale pour la copier dans une variable locale.
	$db = $GLOBALS["db"];
	//création de la requête
	$sql = "SELECT * FROM $table";
	//envoi de la req. à la BDD + retour (format OBJ)
	$rst = $db->query($sql);
	//conversion format OBJ en tableau assoc.
	return $rst->fetchAll(PDO::FETCH_ASSOC);
}

function specifique($table,$champ,$id){
	$db = $GLOBALS["db"];
	$sql = "SELECT * FROM $table WHERE $champ = :id";
	//echo $sql;
	//prepare la requête avant de l'executer
	$rst = $db->prepare($sql);

	//execute la requête
	$rst->execute([":id" => $id]);
	
	//conversion format OBJ en tableau assoc.
	return  $rst->fetchAll(PDO::FETCH_ASSOC);
}

$jetest = tous("test");
var_dump($jetest);

?>