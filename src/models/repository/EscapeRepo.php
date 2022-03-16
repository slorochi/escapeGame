<?php
namespace App;

use App\Escapegame;
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

class EscapeRepo extends BddConnection{

    protected $dataEscapeSelected;
  /*   protected $idUser;
    protected $nom;
    protected $mail;
    protected $mdp;
    protected $niveau;
    protected $adresse;
    protected $cp;
    protected $ville; */
    protected $tabEscape;

    public function getAllEscape(){
        $tab = $this->tous("EscapeGame");
        foreach($tab as $escapes){
            $escape = new Escapegame ($escapes["nom"], $escapes...);
            $this->tabEscape[] = $escape;
        }
    }

   /*  $user1 = $userRepo->getUser(1); */

    public function insertEscape($escapeToCreate){
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
        private UserRepo $userRepo;

        puclic function __construct()
        {
            $this->userRepo = new UserRepo();
        }
    }

    
    // Routeur
    $userController = new userController();
    $userController->getUserRepo()->getAllUsers();
    print_r($userController->getUserRepo()->getTabUser());
} 
?>