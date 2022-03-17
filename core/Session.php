<?php
namespace App\core;

use App\models\repository\Repository\UserRepo;
use App\models\BddConnection;

class Session {

        // ATTRIBUTS



    // METHODES

    // Connexion 
    public function login($postMail, $postMdp){
        if (isset($postMail) && !empty($postMail) &&(isset($postMdp)) && !empty($postMdp)){ 
            $urepo = new userRepo();
            $tabUser = $urepo->setAllUsers()->getTabUser();
            foreach ($tabUser as $i=>$info){
                $currentMail= $info->getMail();
                $currentMdp = $info->getMdp();
                if($postMail === $currentMail && $postMdp === $currentMdp){
                    $_SESSION["email"] = $currentMail;
                    $_SESSION["password"] = $currentMdp;    
                }
            }
        };
        else{
            echo "Veuillez remplir le formulaire.";
        }
    }

    // deconnexion
    /* public function logout(){
    } */

} 
?>