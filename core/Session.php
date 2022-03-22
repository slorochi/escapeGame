<?php
namespace App;

use App\models\repository\UserRepo;

class Session {

    /////////////////////////////////////////////////////////
    ////////////////////// METHODES /////////////////////////
    /////////////////////////////////////////////////////////

    //start session & end session
    public function start(){
        session_start(); 
    }

    public function unsetAcc(){
        unset($_SESSION['compte']);
        header("Location:" .$this->getBackpage());  
    }

    ////////////////////// CONNEXION ////////////////////////

    public function login($tabUser, $postMail, $postMdp){
        foreach ($tabUser as $i=>$info){
            $currentMail= $info->getMail();
            $currentMdp = $info->getMdp();
            $compte = ["email"=> $postMail, "mdp"=> $postMdp];
            if($postMail === $currentMail && $postMdp === $currentMdp){
                $this->setCompte($compte);
                header("Location:" .$this->getBackpage()); 
            }
        }
    }

    ////////////////////// INSCRIPTION ////////////////////////

    public function signUp($tabUser, $postMail, $postMdp){
        $accExist = false;
        // on cherche si l'utilisateur existe déjà par vérification du mail
        foreach ($tabUser as $i=>$info){
            $currentMail= $info->getMail();
            if($postMail === $currentMail){
                $accExist = true;
            }
        }
        // si le compte n'existe pas
        if ($accExist == false){
            /* $userRepo->setUserToCreate("idUser", "nom", $postMail, $postMdp,"niveau", "adresse", "cp", "ville"); */
            $compte = ["email"=> $postMail, "mdp"=> $postMdp];
            $this->setCompte($compte);
            header("Location:" .$this->getBackpage()); 
        }
    }

    

    ////////////////////// GETTERS SETTERS ///////////////////////

    ////////////////////// BACKPAGE ////////////////////////
    public function getBackPage(){
        return $_SESSION['backpage'];
    }

    public function setBackPage($backpage){
        $_SESSION['backpage'] = $backpage;

        return $this;
    }

    ////////////////////// COMPTE ////////////////////////
    public function getCompte(){
        if(isset($_SESSION['compte'])){
            return $_SESSION['compte'];
        }
        
    }

    public function setCompte($compte){
        $_SESSION['compte'] = $compte;

        return $this;
    }

} 
?>