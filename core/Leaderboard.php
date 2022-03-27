<?php
namespace App\core;

// utiliser FIle pour les méthodes files et écrire des objets dans le dataleaderboard.dt pour récupérer par la suite 
use App\models\repository\UserRepo;

class Leaderboard {

    /////////////////////////////////////////////////////////
    ////////////////////// ATTRIBUTS /////////////////////////
    /////////////////////////////////////////////////////////

    protected $accounts;
    protected $connexions;
    protected $accountCreated;

    /////////////////////////////////////////////////////////
    ////////////////////// METHODES /////////////////////////
    /////////////////////////////////////////////////////////


    //interface reliée à l'encodage json
    public function jsonSerialize(): mixed{
        return (object)get_object_vars($this);
    }

    private function getAccounts(){
        return $this->accounts; 
    }
  
    private function setAccounts($accounts){
        $this->accounts = $accounts;
        return $this; 
    }

    private function getConnexions(){
        return $this->accounts; 
    }
  
    private function setConnexions($connexions){
        $this->connexions = $connexions;
        return $this; 
    }

    private function getAccountsCreated(){
        return $this->accountsCreated; 
    }
  
    private function setAccountsCreated($accountsCreated){
        $this->accountsCreated = $accountsCreated;
        return $this; 
    }

} 
?>