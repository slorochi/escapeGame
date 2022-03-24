<?php

use App\models\repository\UserRepo;

use App\core\Session;
use App\core\Leaderboard;
require("../core/Session.php");
require("../core/Leaderboard.php");



/* function afficher($view){
	if($view == "header"){
		require("controllers/header.php");
	}
	if($view == "footer"){
		require("controllers/footer.php");
	}
	if($view == "contact"){
		require("controllers/contact.php");
	}
	if($view == "produits"){
		require("controllers/produits.php");
	}
} */

/*
Gestion des pages
*/

$leaderboard = new Leaderboard("../core/dataleaderboard.dt","r+");
$session = new Session();
$session->start();
$leaderboard->SetNumberConnexions("");
var_dump($leaderboard->getNumberConnexions());


$p = "";
if(isset($_GET["p"])){
	$p = $_GET["p"];
}
ob_start();
switch($p){
	case "accueil":
		require("../src/controller/accueil.php");
	break;
	case "catalogue":
		require("../src/controller/catalogue.php");
	break;
	case "login":
		require("../src/controller/login.php");
	break;
	case "leaderboard":
		require("../src/controller/leaderboard.php");
	break;
	case "stats":
		require("../src/controller/stats.php");
	break;
	case "infos":
		require("../src/controller/infos.php");
	break;
	case "contact":
		require("../src/controller/contact.php");
	break;
	case "test":
		require("../src/controller/test.php");
	break;
	default:
        require("../src/controller/accueil.php");
}
$page_content = ob_get_contents();
ob_end_clean();
?>