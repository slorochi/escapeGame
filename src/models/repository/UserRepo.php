<?php
namespace App\models\repository;

use App\models\entity\User;
use App\models\BddConnection;


class UserRepo extends BddConnection{

    protected $dataUserSelected;
    protected $tabUser =[];

    protected function getAllUsers(){
        return $this->tous("user");
    }

    public function setAllUsers(){
        $tab = $this->getAllUsers();
        foreach($tab as $i=>$value){
            $user = new User();
            $user->setIdUser($tab[$i]["idUser"])
                ->setNom($tab[$i]["nom"])
                ->setMail($tab[$i]["email"])
                ->setMdp($tab[$i]["mdp"])
                ->setNiveau($tab[$i]["niveau"])
                ->setAdresse($tab[$i]["adresse"])
                ->setCp($tab[$i]["cp"])
                ->setVille($tab[$i]["ville"]); 
            array_push($this->tabUser,$user);
        }
    }

    public function insertUser(User $userToCreate){
        // variables définies dans le controller 
        $this->createElement("User", $userToCreate);
        // requête sql afin de créer un 
    }


    public function getUserByChamp($champ, $nomChamp){
        return $this->specifique("user", $champ, $nomChamp);
    }

   public function setUserByChamp($champ , $nomChamp ){
       $tab = $this->getUserByChamp($champ , $nomChamp);
       $this->dataUserSelected = new User();
       $this->dataUserSelected->setIdUser($tab[0]["idUser"])
                ->setNom($tab[0]["nom"])
                ->setMail($tab[0]["email"])
                ->setMdp($tab[0]["mdp"])
                ->setNiveau($tab[0]["niveau"])
                ->setAdresse($tab[0]["adresse"])
                ->setCp($tab[0]["cp"])
                ->setVille($tab[0]["ville"]);  
        return $this;
   }

    public function getTabUser(){
        return $this->tabUser;
    }
    public function getDataUserSelected(){
        return $this->dataUserSelected;
    }

    public function modifyUserElement($table, $champ, $element){
        $this->modifyChamp($table, $champ, $element);
    }
  
/* // Controller
class UserController{
    // attributs
    private UserRepo $userRepo;

    puclic function __construct()
    {
        $this->userRepo = new UserRepo();
    }
}

// Routeur
$userController = new userController();
$userController->getUserRepo()->getAllUsers();
print_r($userController->getUserRepo()->getTabUser()); */
} 
?>