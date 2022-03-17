<?php

use App\models\repository\UserRepo;
session_start(); 
if(!isset($_SESSION["compte"])){
    require("../public/views/login.php");
   // effectuer toute la fonction de présentation de la page login
}
else{
    // rendre cette page inaccessible si l'utilisateur est déjà connecté
    /* unset($_SESSION['compte']); */

}

$variable = $_POST ;
$userRepo = new UserRepo();
 if (isset($_POST["email"]) && !empty($_POST["email"]) &&(isset($_POST["password"])) && !empty($_POST["password"])){ 
    $userRepo->setAllUsers();
    $tabUser = $userRepo->getTabUser();
    foreach ($tabUser as $i=>$info){
        $currentMail= $info->getMail();
        $currentMdp = $info->getMdp();
        $compte =[$currentMail, $currentMdp];
        if($_POST["email"] === $currentMail && $_POST["password"] === $currentMdp){
            $_SESSION["compte"] = [$compte];
            /* $_SESSION["password"] = $currentMdp;    */ 
        }
    }
    var_dump($_SESSION); 
 };

/* var_dump($id_session) ; */


// gestion de la connexion 
 // Logique formulaire

    
    
   
?>