<?php
namespace App\core;

use App\models\repository\UserRepo;
use App\core\LeaderboardManager;
use App\models\repository\JouerRepo;

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
            $currentAdmin = $info->getAdmin();
            $compte = ["email"=> $postMail, "admin"=> $currentAdmin];
            if($postMail === $currentMail && password_verify($postMdp, $currentMdp)){
                $userRepo = new UserRepo();
                $this->setCompte($compte);
                $leaderboard = new LeaderManager(new File("../src/core/dataleaderboard.dt","r+"));
                $leaderboard->setNumberConnexions();
                $leaderboard->setNumberAccounts(new userRepo());
                $userRepo->setLvlByEscapeGameDone(new JouerRepo());
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
            $userRepo = new UserRepo();
            // password_hash() retourne une version cryptée du mot de passe
            $mdpHash = password_hash($postMdp, PASSWORD_BCRYPT);
            $userRepo->setUserToCreate("nom", $postMail, $mdpHash,"1", "adresse", "28000", "ville",); 
            $compte = ["email"=> $postMail,"password"=> $mdpHash];
            $leaderboard = new LeaderManager(new File("../src/core/dataleaderboard.dt","r+"));
            $leaderboard->setNumberConnexions();
            $leaderboard->setNumberAccountsCreated();
            $leaderboard->setNumberAccounts($userRepo);
            $this->setCompte($compte);
            $userRepo->setLvlByEscapeGameDone(new JouerRepo());
            header("Location:" .$this->getBackpage()) ;
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