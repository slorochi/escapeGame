<?php

use App\models\entity\Escapegame;
use App\models\entity\User;
use App\models\entity\Jouer;
use App\models\repository\JouerRepo;




$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);
    
$var = ($leaderboard->getLeaderboard());
$accounts = $var->getAccounts(); 
$accountsCreated = $var->getAccountsCreated(); 
$connexions = $var->getConnexions(); 


$Leaderboard = [];

$appelbdd = new JouerRepo();
$leaderboard = $appelbdd->StatsAll();
foreach ($leaderboard as $key => $value){
    
    $jouer = new Jouer();
    $jouer->setDate($value["date"]);
    $jouer->setTemps($value["temps"]);

    $user = new User();
    $user->setNom($value["nomuser"]);

    $escape = new Escapegame();
    $escape->setNom($value["nomescape"]);

    array_push($Leaderboard, [$jouer, $user, $escape]);

}

$htmlLeaderboard = "";
foreach($Leaderboard as $key => $value){
    
    $htmlLeaderboard .= "<tr>"."<td>".$value[1]->getNom()."</td>"."<td>".$value[2]->getNom()."</td>"."<td>".$value[0]->getTemps()."</td>"."<td>".$value[0]->getDate()."</td>"."</tr>";
    
}
require("../public/views/leaderboard.php");

?>
