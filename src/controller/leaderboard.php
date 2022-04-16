<?php

use App\models\entity\User;
use App\models\entity\Jouer;
use App\models\entity\Escapegame;
use App\models\repository\JouerRepo;
use App\models\repository\EscapeRepo;

$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);
    
$var = ($leaderboard->getLeaderboard());
$accounts = $var->getAccounts(); 
$accountsCreated = $var->getAccountsCreated(); 
$connexions = $var->getConnexions(); 



// Permet de créer les options de la liste déroulante avec tout les noms des escapegames de la bdd
$Leaderboard = [];
$escape = new EscapeRepo;
$escape->SetAllEscape();
$esc = $escape->getTabEscape();
$htmlOption = "";

foreach($esc as $key=>$value){

    $nomEscape = ($value->getNom());
    if(isset($_POST['SelectOption']) && $_POST['SelectOption'] == $nomEscape){
        $htmlOption .= "<option value='$nomEscape' selected>$nomEscape</option>";
    }else{
       $htmlOption .= "<option value='$nomEscape'>$nomEscape</option>"; 
    }
    
}
// si rien n'est choisi a la premiere ouverture de la page on affiche le leaderboard par defaut
if(empty($_POST['SelectOption'])){
    $option = "";
}else{
    $option = $_POST['SelectOption'];
}

//Recupere tout les joueurs qui ont joué dans la escapegame selectionnée et les affiche dans le tableau
$appelbdd = new JouerRepo();
$leaderboard = $appelbdd->StatsAll($option);
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
