<?php
namespace App;

use App\BddConnection;

/* 
$user = new User;
$user->setNom("theo");
var_dump($user->getNom()); */


/* $user = new User;
$user->setNom("Anthony");

$html = ($user->getData()); 
$level = $html[0]["niveau"];
$currentUser = $html[0]["nom"]; */

class UserRepo extends BddConnection{

    protected $dataUserSelected;
  /*   protected $idUser;
    protected $nom;
    protected $mail;
    protected $mdp;
    protected $niveau;
    protected $adresse;
    protected $cp;
    protected $ville; */
    protected $tabUser;

    public function getAllUsers(){
        $tab = $this->tous("User");
        foreach($tab as $userInfo){
            $user = new User($userInfo["idUser"], $userInfo["nom"], $userInfo["mail"], $userInfo["mdp"], $userInfo["niveau"], $userInfo["adresse"], $userInfo["cp"], $userInfo["ville"]);
            $this->tabUser[] .= $user;
        }
    }

   /*  $user1 = $userRepo->getUser(1); */

    public function insertUser(User $userToCreate){
        // variables définies dans le controller 
        $this->createElement("User", $userToCreate);
        // requête sql afin de créer un 
    }
        //controller exemple
    /* $userRepo = new UserRpo(): */
    /* $userTocreate = new User();
    $userTocreate->setNom($postNom);
    $userTocreate->setMail($postMail);
    $userRepo->inserUser($userToCreate); */ 
   

    public function getUserByChamp($champ, $id){
        $this->dataUserSelected = $this->specifique("User", $champ, $id);
    }

    public function getTabUser(){
        return $this->$tabUser;
    }

    public function modifyUserElement($table, $champ, $element){
        $this->modifyChamp($table, $champ, $element);
    }
  
    // Controller
    class UserController{
        // attributs
        private UserRepo $userRepo;

        puclic function __construct()
        {
            $this->userRepo = new UserRepo();
        }
    }

    // THEO TEST

    // Routeur
    $userController = new userController();
    $userController->getUserRepo()->getAllUsers();
    print_r($userController->getUserRepo()->getTabUser());
} 
?>