<?php

use App\models\repository\UserRepo;

// Vérifie si l'objet session getCompte n'existe pas pour permettre à l'utilisateur de se connecter ou de s'inscrire
if(!($session->getCompte())){
    require("../public/views/login.php"); 

    if (isset($_POST["email"]) && !empty($_POST["email"]) &&(isset($_POST["password"])) && !empty($_POST["password"])){

        //création d'une variable pour récupérer toutes les infos des utilisateurs pour faire la vérification si l'utilisateur existe
        $userRepo = new UserRepo();
        $userRepo->setAllUsers();
        $tabUser = $userRepo->getTabUser();

        // si checkbox = inscription sinon connexion
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
    //si le compte existe, le deconnecte
    require ("../src/controller/logout.php"); 
}

?>