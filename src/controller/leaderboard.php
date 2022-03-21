<?php

use App\models\entity\User;
$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);

$user = new User();
/* $user->setNom("Anthony"); */
/* 
$html = ($user->getNom()); 
$level = $html[0]["niveau"];
$currentUser = $html[0]["nom"]; */


require("../public/views/leaderboard.php");

?>
