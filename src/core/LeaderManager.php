<?php
namespace App\core;


// utiliser FIle pour les méthodes files et écrire des objets dans le dataleaderboard.dt pour récupérer par la suite 
/* use App\models\repository\UserRepo;
 */
//namespace use UserRepo;
use App\core\File;
use App\core\Leaderboard;
use App\models\repository\UserRepo;

class LeaderManager {


    protected $file;
    protected $leaderboard; 
/*     protected $connexions;
 */   /*  protected $writeMode = ["r+","w","w+","a","a+","x","x+","c","c+"]; */

    /////////////////////////////////////////////////////////
    ////////////////////// METHODES /////////////////////////
    /////////////////////////////////////////////////////////

    public function __construct(File $file){
        $this->file = $file;
    }

    public function addFirstObject(UserRepo $userRepo){
        $leaderboard = new Leaderboard();
        $leaderboard->setConnexions(0);
        $leaderboard->setAccounts($this->getNumberAccounts($userRepo));
        $leaderboard->setAccountsCreated($this->getNumberAccounts($userRepo));
        $valeurEncode = json_encode($leaderboard);
        $this->file->write($valeurEncode);
    }

    public function getLeaderboard(){
        $this->decodeLeaderboard();
        return $this->leaderboard;
    }
    protected function decodeLeaderboard(){
        // lis dans le dataleaderboard, récupère l'objet json et le transforme en objet Leaderboard , puis return l'objet pour qu'on puisse lire les getConnexions etc  //         
        // si le fichier est créé et rempli  :
        $ldboard = $this->file->readLigne();
        $stdObject = json_decode($ldboard); 
        $leaderboard = new Leaderboard();
        $leaderboard->setConnexions($stdObject->connexions);
        $leaderboard->setAccountsCreated($stdObject->accountsCreated);
        $leaderboard->setAccounts($stdObject->accounts);
        $this->leaderboard = $leaderboard;
        //sinon return un false
    }


    protected function encodeLeaderboard(){
        // transforme l'objet Leaderboard en objet json et l'écrit dans le dataleaderboard
        $valeurEncode = json_encode($this->leaderboard);
        $this->file->rewind();
        $this->file->write($valeurEncode);
        var_dump($valeurEncode);
    }

    public function setNumberConnexions(){
        // si le fichier est créé et rempli :
        $this->decodeLeaderboard();
        $newConn = ($this->leaderboard)->getConnexions() + 1;
        var_dump($this->leaderboard);
        $this->leaderboard->setConnexions($newConn);
        var_dump($this->leaderboard);
        $this->encodeLeaderboard();
        //sinon;
    }



    protected function getNumberAccounts(UserRepo $userRepo){
        return count($userRepo->setAllUsers()->getTabUser());
    }

    public function setNumberAccounts(UserRepo $userRepo){
        // si le fichier est créé et rempli :
        $this->decodeLeaderboard();
        $acc = $this->getNumberAccounts($userRepo);
        $this->leaderboard->setAccounts($acc);
        $this->encodeLeaderboard();
        //sinon;   
    }


    public function setNumberAccountsCreated(){
        // si le fichier est créé et rempli :
        $this->decodeLeaderboard();
        $newAccCrea = ($this->leaderboard)->getAccountsCeated() + 1;
        $this->leaderboard->setAccountsCreated($newAccCrea);
        $this->encodeLeaderboard();
        //sinon;
    } 
  
}


?>