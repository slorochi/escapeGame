<?php
namespace App\core;

// utiliser FIle pour les méthodes files et écrire des objets dans le dataleaderboard.dt pour récupérer par la suite 
use App\models\repository\UserRepo;

class Leaderboard {


    protected $file;
    protected $ressource;
    protected $mode;
    protected $connexions;
    protected $writeMode = ["r+","w","w+","a","a+","x","x+","c","c+"];

    /////////////////////////////////////////////////////////
    ////////////////////// METHODES /////////////////////////
    /////////////////////////////////////////////////////////

    public function __construct(string $file, string $mode){
        $this->file = $file;
        $this->mode = $mode;
        $this->ressource = $this->open($this->mode);
    }

    private function open(string $mode){
        return fopen($this->file, $mode); 
    }
  
    public function getNumberConnexions(){
        return fgets($this->ressource);
    }
    
    public function setNumberConnexions($msg){
        if($this->getNumberConnexions()==false){
            file_put_contents($this->file, 1);
        }
        // si file empty; commence à un
        // else : fait un get NumberConnexions, le lis, ajoute +1 à la varible, puis réécrit dedans.
        file_put_contents($this->file, $msg);
    }

} 
?>