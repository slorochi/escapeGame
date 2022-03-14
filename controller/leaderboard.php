<?php

require("../models/entity/User.php");

$user = new User;
$user->setNom("Anthony");

$html = ($user->getNom()); 
$level = $html[0]["niveau"];
$currentUser = $html[0]["nom"];


require("../public/views/leaderboard.php");

?>
