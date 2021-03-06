<?php

namespace App\models\repository;

use App\models\entity\User;
use App\models\BddConnection;

class UserRepo extends BddConnection
{

    protected $dataUserSelected;
    protected $tabUser = [];
    protected $userToCreate;

    // récupérer les infos de tous les utilisateurs
    protected function getAllUsers()
    {
        return $this->tous("user");
    }

    //Rempli un objet User avec les infos d'un utilisateur spécifique
    public function setAllUsers()
    {
        $tab = $this->getAllUsers();
        foreach ($tab as $i => $value) {
            $user = new User();
            $user->setIdUser($tab[$i]["idUser"])
                ->setNom($tab[$i]["nom"])
                ->setMail($tab[$i]["email"])
                ->setMdp($tab[$i]["mdp"])
                ->setNiveau($tab[$i]["niveau"])
                ->setAdresse($tab[$i]["adresse"])
                ->setCp($tab[$i]["cp"])
                ->setVille($tab[$i]["ville"])
                ->setAdmin($tab[$i]["admin"]);
            array_push($this->tabUser, $user);
        }
        return $this;
    }

    public function getTabUser()
    {
        return $this->tabUser;
    }

    // récupère les infos d'un utilisateur selon un champ sélectionné
    protected function getUserByChamp($typeChamp, $valueToSearch)
    {
        return $this->specifique("user", $typeChamp, $valueToSearch);
    }

    // crée l'objet selon getUserByChamp 
    public function setUserByChamp($champ, $nomChamp)
    {
        $tab = $this->getUserByChamp($champ, $nomChamp);
        $this->dataUserSelected = new User();
        $this->dataUserSelected->setIdUser($tab[0]["idUser"])
            ->setNom($tab[0]["nom"])
            ->setMail($tab[0]["email"])
            ->setMdp($tab[0]["mdp"])
            ->setNiveau($tab[0]["niveau"])
            ->setAdresse($tab[0]["adresse"])
            ->setCp($tab[0]["cp"])
            ->setVille($tab[0]["ville"])
            ->setAdmin($tab[0]["admin"]);
        return $this;
    }

    //modify les infos d'un utilisateur
    public function modifyInfoUser($elementToPush, $nomChamp, $valeurChamp)
    {
        $this->modifyChamp("user", $elementToPush, $nomChamp, $valeurChamp);
    }

    // crée l'objet User avec les infos du user connecté ou sélectionné
    public function getDataUserSelected()
    {
        return $this->dataUserSelected;
    }

    protected function getUserToCreate($nom, $email, $mdp, $niveau, $adresse, $cp, $ville)
    {
        $userToC = new User();
        $all = $this->setAllUsers()->getTabUser();
        foreach ($all as $key => $value) {
        }
        $maxId = ($value->getIdUser());
        $incrId = $maxId + 1;
        $userToC->setIdUser($incrId);
        $userToC->setNom($nom);
        $userToC->setMail($email);
        $userToC->setMdp($mdp);
        $userToC->setNiveau($niveau);
        $userToC->setAdresse($adresse);
        $userToC->setCp($cp);
        $userToC->setVille($ville);
        $userToC->setAdmin(0);
        return $userToC;
    }
    public function deleteUserByUserId($idUser){
        $this->deleteUser($idUser);
    }
    public function setUserToCreate($nom, $email, $mdp, $niveau, $adresse, $cp, $ville){
        // variables définies dans le controller 
        $this->userToCreate = $this->getUserToCreate($nom, $email, $mdp, $niveau, $adresse, $cp, $ville);
        $this->createUser("user", $this->userToCreate);
        // requête sql afin de créer un 
    }

    // modifie le niveau de l'utilisateur selon les escape games effectués (actualisé dans les méthodes session de connexion/inscription)
   public function setLvlByEscapeGameDone(JouerRepo $jouerRepo){
       //select info User
        $this->setUserByChamp("email",$_SESSION['compte']['email']);
        $currentUser = $this->getDataUserSelected();
        var_dump($currentUser);
        if(empty($currentUser->getNom())){
            // si nv compte
            $option = "";
        }else{
            $option = $currentUser->getNom();
        }

        // get escp done by user
        $nbEscapeGameDone = $jouerRepo->NumberEscapeGameJoueur($option);
        var_dump($nbEscapeGameDone);
        if(empty($nbEscapeGameDone)){
            $newNiveau = 0;
        }else{
            //return array of the highest escape game lvl done
            $newNiveau = max($nbEscapeGameDone);
            //transform to int
            $newNiveau = intval($newNiveau['niveau']); 
        }

        // add a level
        if($newNiveau < 5){
            $newNiveau += 1;
        }

        $this->modifyInfoUser($newNiveau, "niveau", $currentUser->getIdUser()); 
        } 
   
    
}

?>
