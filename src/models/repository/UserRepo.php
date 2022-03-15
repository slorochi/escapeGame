<?php

use App\models\entity\User;
use App\models\BddConnection;


class UserRepo extends BddConnection{

    protected $dataUserSelected;
    protected $tabUser;

    public function getAllUsers(){
        $tab = $this->tous("User");
        foreach($tab as $userInfo){
            $user = new User($userInfo["idUser"], $userInfo["nom"], $userInfo["mail"], $userInfo["mdp"], $userInfo["niveau"], $userInfo["adresse"], $userInfo["cp"], $userInfo["ville"]);
            $this->tabUser[] .= $user;
        }
    }

    public function insertUser(User $userToCreate){
        // variables définies dans le controller 
        $this->createElement("User", $userToCreate);
        // requête sql afin de créer un 
    }

   
    public function getUserByChamp($champ, $id){
        $this->dataUserSelected = $this->specifique("User", $champ, $id);
    }

    public function getTabUser(){
        return $this->tabUser;
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