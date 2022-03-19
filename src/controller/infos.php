<?php

use App\models\repository\UserRepo;
if (isset($_SESSION['compte'])){
    $userRepo = new UserRepo();
    $user = $userRepo->getUserByChamp("email",$session->GetCompte()["email"])[0];
    $lvl = $user["niveau"];
    $pseudo = $user["nom"];
    $email = $user["email"];
    $mdp = $user["mdp"];
    $adresse = $user["adresse"];
    $cp = $user["cp"];
    $ville = $user["ville"];
    require("../public/views/infos.php");


}

else{
    header("Location:?p=login"); 
}

?>