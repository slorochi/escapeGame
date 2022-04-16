<?php
namespace App\core;

use App\core\File;
use App\core\Session;
use App\core\LeaderManager;


$leaderboard = new LeaderManager(new File("../src/core/dataleaderboard.dt","r+"));
$session = new Session();
$session->start();


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
	case 'escapegame':
		require("../src/controller/escapegame.php");
	break;
	case "infos":
		// appel objet info
		// $info = newInfo();
		// $info->methdodes();
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