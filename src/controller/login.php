<?php

use App\models\repository\UserRepo;

// si $session ne fonctionne pas, rester sur isset($_SESSION['compte'])
if(!($session->getCompte())){
    require("../public/views/login.php");
    

    if (isset($_POST["email"]) && !empty($_POST["email"]) &&(isset($_POST["password"])) && !empty($_POST["password"])){

        $userRepo = new UserRepo();
        $userRepo->setAllUsers();
        $tabUser = $userRepo->getTabUser();

        if(isset($_POST['checkbox']))
        {
            // password_hash() retourne une version cryptée du mot de passe
            $compte["pwd"] = password_hash($_POST["pwd"], PASSWORD_BCRYPT);
            
            /* $session->signUp($tabUser, $_POST['email'], $_POST['password']); */
        }
        else{
            $session->login($tabUser, $_POST['email'], $_POST['password']);
        }
        require ("../src/core/LvlUser.php");
    }
}
else {
    require ("../src/controller/logout.php"); 
}

?>