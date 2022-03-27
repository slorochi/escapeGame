<?php
/* namespace App\core;
 */
// utiliser FIle pour les méthodes files et écrire des objets dans le dataleaderboard.dt pour récupérer par la suite 
/* use App\models\repository\UserRepo;
 */
require_once("../core/Leaderboard.php");
require_once("../core/File.php");
//namespace use UserRepo;   
use App\models\repository\UserRepo;

class LeaderManager {


    protected $file;
    protected $leaderboard;
/*     protected $connexions;
 */    protected $writeMode = ["r+","w","w+","a","a+","x","x+","c","c+"];

    /////////////////////////////////////////////////////////
    ////////////////////// METHODES /////////////////////////
    /////////////////////////////////////////////////////////

    public function __construct(File $file){
        $this->file = $file;
        $this->mode = $mode;
        $this->ressource = $this->open($this->mode);
    }

    public function getLeaderboard(Leaderboard $leaderboard){
        // lis dans le dataleaderboard, récupère l'objet json et le transforme en objet Leaderboard , puis return l'objet pour qu'on puisse lire les getConnexions etc  //           
        $this->leaderboard = $this->file->read($this->ressource);   
        $this->leaderboard = json_decode($this->leaderboard);   
        return $this->leaderboard;
    }
  
    public function getNumberConnexions(){
        // cette méthode doit $lead =  $this->getLeaderboard; return $lead->getConnexions()
        $lead = $this->getLeaderboard();
        return $lead->getConnexions();
    }
    
    public function setNumberConnexions(Leaderboard $leaderboard){
        // si il n'y a pas encore de connexion
        if($this->getNumberConnexions()==false){
            /* file_put_contents($this->file, 1); */
            $newConn = 1;
            return $newConn;
            // ou alors faire la vérification directement dans le get NumberConnexions();
        }
        // else : fait un get NumberConnexions, le lis, ajoute +1 à la varible, puis réécrit dedans.
        else
        {
            $prevConnexions = (int)($this->getNumberConnexions());
            $newConn = int($this->connexions +1);
            return $newConn;
        }
        $leaderboard->setConnexions($newConn);
        $leaderboard->setAccounts($this->getNumberAccounts());
        $leaderboard->setAccountsCreated($this->getNumberAccountCreated());
        $valeurEncode = json_encode($leaderboard);
        $this->file->write($leaderboard);    
    }


    public function getNumberAccounts(UserRepo $userRepo){
        return count($userRepo->setAllUsers()->getTabUser());
    }

    public function setNumberAccounts(Leaderboard $leaderboard){
        $leaderboard->setConnexions($this->getNumberConnexions());
        $leaderboard->setAccounts($this->getNumberAccounts());
        $leaderboard->setAccountsCreated($this->getNumberAccountCreated());
        $valeurEncode = json_encode($leaderboard);
        $this->file->write($leaderboard);    
    }

    public function getNumberAccountsCreated(){
        $lead =  $this->getLeaderboard();
        return $lead->getAccountsCreated();

    }

    public function setNumberAccountsCreated(Leaderboard $leaderboard){
        // si il n'y a pas encore de connexion
        if($this->getNumberConnexions()==false){
            /* file_put_contents($this->file, 1); */
            $newAccCrea = 1;
            return $newAccCrea;
            // ou alors faire la vérification directement dans le get NumberConnexions();
        }
        // else : fait un get NumberConnexions, le lis, ajoute +1 à la varible, puis réécrit dedans.
        else
        {
            $prevAccCrea = (int)($this->getNumberAccountsCreated());
            $newAccCrea = int($prevAccCrea +1);
            return $newAccCrea;
        }
        $leaderboard->setConnexions($this->getNumberConnexions());
        $leaderboard->setAccounts($this->getNumberAccounts());
        $leaderboard->setAccountsCreated((int)($this->getNumberAccountsCreated()));
        $valeurEncode = json_encode($leaderboard);
        $this->file->write($leaderboard);    
    }




    /* public function rewind(){
        return rewind($this->ressource);
    }
    // function to read file
    public function read(){
        while(!feof($this->ressource)){
            $this->connexions = fgets($this->ressource);
        }
        return $this->connexions;
    } */
  

} 
?>