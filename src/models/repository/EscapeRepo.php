<?php
namespace App\models\repository;

use App\models\entity\Escapegame;
use App\models\BddConnection;

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
    protected $tabEscape;
    protected $escapeToCreate;

    protected function getAllEscape(){
        return $this->tous("EscapeGame");
    }
    public function setAllUsers(){
        $tab = $this->getAllEscape();
        foreach($tab as $i=>$value){
            $escape = new Escapegame();
            $escape->setIdEscape($tab[$i]["idEscape"])
                    ->setNom($tab[$i]["nom"])
                    ->setNiveau($tab[$i]["niveau"])
                    ->setIdType($tab[$i]["idType"])
                    ->setAdresse($tab[$i]["adresse"])
                    ->setCp($tab[$i]["cp"])
                    ->setVille($tab[$i]["ville"]);
            array_push($this->tabEscape, $escape); 
        }
    }

    public function getTabEscape(){
        return $this->tabEscape;
    }

    //Récupère les infos d'un escape selon tri par champ
    public function getEscapeByChamp($champ, $nomChamp){
        $this->specifique("escape", $champ, $nomChamp);
    }

    public function setEscapeByChamp($champ , $nomChamp ){
        $tab = $this->getEscapeByChamp($champ , $nomChamp);
        $this->dataUserSelected = new Escapegame();
        $this->dataUserSelected->setIdEscape($tab[0]["idEscape"])
                 ->setNom($tab[0]["nom"])
                 ->setNiveau($tab[0]["niveau"])
                 ->setIdType($tab[0]["idType"])
                 ->setAdresse($tab[0]["adresse"])
                 ->setCp($tab[0]["cp"])
                 ->setVille($tab[0]["ville"]);  
         return $this;
    }

    public function getDataEscapeSelected(){
        return $this->dataEscapeSelected;
    }

    //Création d'un escape game dans la base de données
    protected function getEscapeToCreate($idEscape, $nom, $niveau, $idType, $adresse, $cp, $ville){
        $escapeToC = new Escapegame();
        $escapeToC->setIdEscape($idEscape);
        $escapeToC->setNom($nom);
        $escapeToC->setNiveau($niveau);
        $escapeToC->setIdType($idType);
        $escapeToC->setAdresse($adresse);
        $escapeToC->setCp($cp);
        $escapeToC->setVille($ville); 
        return $escapeToC;
    }

    public function setUserToCreate($idEscape, $nom, $niveau, $idType, $adresse, $cp, $ville){
        $this->escapeToCreate = $this->getEscapeToCreate($idEscape, $nom, $niveau, $idType, $adresse, $cp, $ville);
        $this->createEscape("Escape", $this->escapeToCreate); 
    }

    public function deleteEscape($table, $dataEscapeSelected){
        ouoii
    }



    //Modification d'un champ de la table escapeGame
    /* public function modifyEscapeElement($table, $champ, $element){
        $this->modifyChamp($table, $champ, $element);
    } */

} 
?>