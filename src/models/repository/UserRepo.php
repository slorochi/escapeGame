<?php
namespace App\models\repository;

use App\models\entity\User;
use App\models\BddConnection;

class UserRepo extends BddConnection{

    protected $dataUserSelected;
    protected $tabUser =[];
    protected $userToCreate;

    // récupérer les infos de tous les utilisateurs
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

    public function getTabUser(){
        return $this->tabUser;
    }

    // récupère les infos d'un utilisateur selon un champ sélectionné
    protected function getUserByChamp($champ, $nomChamp){
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

    public function getDataUserSelected(){
        return $this->dataUserSelected;
    }
   
    // Créations d'un utilisateur dans la base de données
    protected function getUserToCreate($idUser, $nom, $email, $mdp, $niveau, $adresse, $cp, $ville){
        $userToC = new User();
        $userToC->setIdUser($idUser);
        $userToC->setNom($nom);
        $userToC->setMail($email);
        $userToC->setMdp($mdp);
        $userToC->setNiveau($niveau);
        $userToC->setAdresse($adresse);
        $userToC->setCp($cp);
        $userToC->setVille($ville); 
        return $userToC;
    }

    public function setUserToCreate($idUser, $nom, $email, $mdp, $niveau, $adresse, $cp, $ville){
        $this->userToCreate = $this->getUserToCreate($idUser, $nom, $email, $mdp, $niveau, $adresse, $cp, $ville);
        $this->createUser("User", $this->userToCreate); 
        // requête sql afin de créer un 
    }
   
  /*   public function modifyUserElement($table, $champ, $element){
        $this->modifyChamp($table, $champ, $element);
    }
   */
















    
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