<?php

use App\models\repository\UserRepo;
session_start(); 
$_SESSION["backPage"] = DIRECTORY_SEPARATOR . basename(__FILE__);
/* $_SESSION['backPage'] = "?p=login"; */
if(!isset($_SESSION["compte"])){
    require("../public/views/login.php");
    // effectuer toute la fonction de présentation de la page login
    $variable = $_POST ;
    $userRepo = new UserRepo();
    // si le formulaire est rempli
    if (isset($_POST["email"]) && !empty($_POST["email"]) &&(isset($_POST["password"])) && !empty($_POST["password"])){
        $userRepo->setAllUsers();
        $tabUser = $userRepo->getTabUser();
        // et que la checkbox "créer un compte" est cochée 
        if(isset($_POST['checkbox']))
        {
            $accExist = false;
            // on cherche si l'utilisateur existe déjà par vérification du mail
            foreach ($tabUser as $i=>$info){
                $currentMail= $info->getMail();
                if($_POST["email"] === $currentMail){
                    $accExist = true;
                }
            }
            // si le compte n'existe pas
            if ($accExist == false){
                /* $userRepo->setUserToCreate("idUser", "nom", $_POST["email"], $_POST["password"],"niveau", "adresse", "cp", "ville"); */
                $compte = [$_POST["email"], $_POST["password"]];
                $_SESSION["compte"] = [$compte];
            }
        }
        // ou que la checkbox n'est pas cochée
        else{
            foreach ($tabUser as $i=>$info){
                $currentMail= $info->getMail();
                $currentMdp = $info->getMdp();
                $compte =[$currentMail, $currentMdp];
                if($_POST["email"] === $currentMail && $_POST["password"] === $currentMdp){
                    $_SESSION["compte"] = [$compte];
                    /* header("Location: .{$_SESSION['backPage']}"); */
                }
            }
        }
    };
}
else{
    require ("../src/controller/logout.php");

}
var_dump($_SESSION);

// suite du code : créer une fonction qui appelle le leaderboard + informations perso seulement si $_SESSION est set; (donc faire des tests dans le header layout.php)
// penser à faire un objet $_SESSION avec des méthodes de set Connexion et de unset;

    
    
   
?>