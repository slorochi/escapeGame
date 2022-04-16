<?php

use App\models\entity\User;
use App\models\entity\Jouer;
use App\models\entity\Escapegame;
use App\models\repository\UserRepo;
use App\models\repository\JouerRepo;
use App\models\repository\EscapeRepo;

//LvlUser
if (isset($_SESSION['compte'])){
    $user = new UserRepo;
    $user->setUserByChamp("email",$_SESSION['compte']['email']);
    $nomUser = $user->getDataUserSelected();

    if(empty($nomUser->getNom())){
        $option = "";
    }else{
        $option = $nomUser->getNom();
    }

    // récupère les escpGames effectués par le user
    $appelbdd = new JouerRepo();
    $leaderboard = $appelbdd->NumberEscapeGameJoueur($option);

    if(empty($leaderboard)){
        $newNiveau = 0;
    }else{
        //return array of the highest escape game lvl done
        $newNiveau = max($leaderboard);
        //transform to int
        $newNiveau = intval($newNiveau['niveau']); 
    }

    // add a level
    if($newNiveau < 5){
        $newNiveau += 1;
    }

    $user->modifyInfoUser($newNiveau, "niveau", $nomUser->getIdUser());}
?>