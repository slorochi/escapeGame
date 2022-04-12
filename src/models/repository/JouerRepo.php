<?php
namespace App\models\repository;


use PDO;
use App\models\BddConnection;
use App\models\entity\Jouer;


class JouerRepo extends BddConnection{

    protected $statsPlayer = [];
    protected $statsAll;
    protected $currentUserId;

    public function __construct($currentUserId = null){
        $this->currentUserId = $currentUserId;
    }

    protected function getPlayedCurrentUser(){
        return $this->specifique('Jouer','IdUser',$this->currentUserId);
    }
    public function setPlayedCurrentUser(){

        $tab = $this->getPlayedCurrentUser();
        foreach ($tab as $key =>$value){
            $jouer = new Jouer();
            $jouer->setIdUser($value["idUser"]);
            $jouer->setIdEscape($value["idEscape"]);
            $jouer->setDate($value["date"]);
            $jouer->setTemps($value["temps"]);
            $jouer->setNote($value["note"]);
            array_push($this->statsPlayer, $jouer);
        }
        
    return $this; 
   
    } 
    public function getStatsPlayer(){
        return $this->statsPlayer;
    }

    public function StatsAll($filtre = ""){
        return $this->createLeaderboard($filtre);
    }
    
}
?>