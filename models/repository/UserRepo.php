<?php

require("../entity/UserCopy.php");
/* 
$user = new User;
$user->setNom("theo");
var_dump($user->getNom()); */
require("../models/BddConnection.php");


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
        foreach($tab as $user1){
            $user = new User($user1["nom"], $user1...);
            $this->tabUser[] = $user;
        }
    }

   /*  $user1 = $userRepo->getUser(1); */

    public function insertUser($userToCreate){
        // variables définies dans le controller 
        // requête sql afin de créer un 
    }

    public function getUserByUsername($table, $champ, $id){
        $this->dataUserSelected = $this->specifique($table, $champ, $id);
    }

    public function getTabUser(){
        return $this->$tabUser;
    }

    public function modifyUserElement($table, $champ, $element){
        $this->modifyChamp($table, $champ, $element);
    }
    //controller exemple
/*     $userRepo = new UserRpo(): */
    /* $userTocreate = new User();
    $userTocreate->setNom($postNom);
    $userTocreate->setMail($postMail);
    $userRepo->inserUser($userToCreate); */
   
    // Controller
    class UserController{
        // attributs
        private UserRepo $useRepo;

        puclic function __construct()
        {
            $this->useRepo = new UserRepo();
        }
    }

    
    // Routeur
    $userController = new userController();
    $userController->getUserRepo()->getAllUsers();
    print_r($userController->getUserRepo()->getTabUser());
} 
?>