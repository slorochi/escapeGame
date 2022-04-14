<?php

use App\models\entity\User;
use App\models\entity\Jouer;
use App\models\entity\Escapegame;
use App\models\repository\UserRepo;
use App\models\repository\JouerRepo;
use App\models\repository\EscapeRepo;

//LvlUser
if (isset($_SESSION['compte'])){
    $user5 = new UserRepo;
    $user5->setUserByChamp("email",$_SESSION['compte']['email']);
    $nomUser5 = $user5->getDataUserSelected();

    if(empty($nomUser5->getNom())){
        $option = "";
    }else{
        $option = $nomUser5->getNom();
    }

    $appelbdd = new JouerRepo();
    $leaderboard = $appelbdd->NumberEscapeGameJoueur($option);

    if(empty($leaderboard)){
        $newNiveau = 0;
    }else{
        $newNiveau = max($leaderboard);
        $newNiveau = intval($newNiveau['niveau']); 
    }

    if($newNiveau < 5){
        $newNiveau += 1;
    }

    $appelbdd->setChampStatsPlayer("user", $newNiveau, "niveau", $nomUser5->getIdUser());
}
?>