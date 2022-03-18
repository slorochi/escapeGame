<?php

use App\models\repository\UserRepo;
session_start(); 
if(!isset($_SESSION["compte"])){
    require("../public/views/login.php");
   // effectuer toute la fonction de présentation de la page login
}
else{
    // rendre cette page inaccessible si l'utilisateur est déjà connecté
    unset($_SESSION['compte']);
    echo "cccccccccc";

}
$variable = $_POST ;
$userRepo = new UserRepo();
// si le formulaire est rempli
 if (isset($_POST["email"]) && !empty($_POST["email"]) &&(isset($_POST["password"])) && !empty($_POST["password"])){
    // et que la checkbox "créer un compte est cochée 
    $userRepo->setAllUsers();
    $tabUser = $userRepo->getTabUser();
    if (isset($_POST['checkbox']))
    {
        $accExist = false;
        // on cherche si l'utilisateur existe déjà par vérification du mail
        foreach ($tabUser as $i=>$info){
            $currentMail= $info->getMail();
            $currentMdp = $info->getMdp();
            $compte =[$currentMail, $currentMdp];
            if($_POST["email"] === $currentMail){
                $accExist = true;
                
            }
        }
        if ($accExist == true){
            $userRepo->setUserToCreate("idUser", "nom", $_POST["email"], $_POST["password"],"niveau", "adresse", "cp", "ville");
            $_SESSION["compte"] = [$compte];
        }
    }
    // ou que la checkbox non cochée
    else{
        foreach ($tabUser as $i=>$info){
            $currentMail= $info->getMail();
            $currentMdp = $info->getMdp();
            $compte =[$currentMail, $currentMdp];
            if($_POST["email"] === $currentMail && $_POST["password"] === $currentMdp){
                $_SESSION["compte"] = [$compte];
            }
        }
    }
    /* var_dump($_SESSION); 
    var_dump($_POST["email"], $_POST["password"]); */
 };


/* var_dump($id_session) ; */


// gestion de la connexion 
 // Logique formulaire

    
    
   
?>