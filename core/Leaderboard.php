<?php
namespace App\core;

// utiliser FIle pour les méthodes files et écrire des objets dans le dataleaderboard.dt pour récupérer par la suite 
use App\models\repository\UserRepo;

class Leaderboard /* implements JsonSerializable */{

    /////////////////////////////////////////////////////////
    ////////////////////// ATTRIBUTS /////////////////////////
    /////////////////////////////////////////////////////////

    public $accounts;
    public $connexions;
    public $accountsCreated;

    /////////////////////////////////////////////////////////
    ////////////////////// METHODES /////////////////////////
    /////////////////////////////////////////////////////////


    //interface reliée à l'encodage json
    public function jsonSerialize(): mixed{
        return (object)get_object_vars($this);
    }

    public function getAccounts(){
        return $this->accounts; 
    }
  
    public function setAccounts($accounts){
        $this->accounts = $accounts;
        return $this; 
    }

    public function getConnexions(){
        return $this->connexions; 
    }
  
    public function setConnexions($connexions){
        $this->connexions = $connexions;
        return $this; 
    }

    public function getAccountsCreated(){
        return $this->accountsCreated; 
    }
  
    public function setAccountsCreated($accountsCreated){
        $this->accountsCreated = $accountsCreated;
        return $this; 
    }

} 
?>