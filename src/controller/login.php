<?php


use App\models\repository\UserRepo;

if(!$session->getCompte()){
    echo "il n'y a pas de compte";
    require("../public/views/login.php");

    if (isset($_POST["email"]) && !empty($_POST["email"]) &&(isset($_POST["password"])) && !empty($_POST["password"])){

        $userRepo = new UserRepo();
        $userRepo->setAllUsers();
        $tabUser = $userRepo->getTabUser();

        if(isset($_POST['checkbox']))
        {
            $session->signUp($tabUser, $_POST['email'], $_POST['password']);
        }
        else{
            $session->login($tabUser, $_POST['email'], $_POST['password']);
        }
    }
}
else {
    echo "il y a un compte";
    require ("../src/controller/logout.php"); 
}
/* if(!isset($_SESSION["compte"])){
    
}
else{
     
} */
var_dump($_SESSION);
// suite du code : créer une fonction qui appelle le leaderboard + informations perso seulement si $_SESSION est set; (donc faire des tests dans le header layout.php)
// penser à faire un objet $_SESSION avec des méthodes de set Connexion et de unset;


    
    
   
?>