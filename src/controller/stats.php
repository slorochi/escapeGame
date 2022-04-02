<?php

use App\models\repository\UserRepo;
use App\models\repository\JouerRepo;
if (isset($_SESSION['compte'])){
    // récupère le currentUser Id pour afficher ses informations via IdUser.
    $userRepo = new UserRepo(); 
    $userRepo->setUserByChamp('email',$session->getCompte()['email']); 
    $currentUser = ($userRepo->getDataUserSelected());
    $id = $currentUser->getIdUser();
    $jouer = new JouerRepo($id);
    var_dump($jouer->setPlayedCurrentUser());
    var_dump($jouer->getStatsPlayer());
    require("../public/views/stats.php");
}

else{
    header("Location:?p=login"); 
}

?>