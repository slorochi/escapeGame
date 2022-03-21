<?php
namespace App\models\repository;


use PDO;
use App\models\BddConnection;
use App\models\entity\Escapegame;



class EscapeRepo extends BddConnection{

    protected $dataEscapeSelected;
    protected $tabEscape=[];
    protected $escapeToCreate;

    protected function getAllEscape(){
        return $this->tous("escapegame");
    }
    public function setAllEscape(){
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

            array_push($this->tabEscape,$escape); 
        }
        return $this;
    }

    public function getTabEscape(){
        return $this->tabEscape;
    }

    //Récupère les infos d'un escape selon tri par champ
    protected function getEscapeByChamp($champ, $id){
        return $this->specifique("escapegame", $champ, $id);
    }

    public function setEscapeByChamp($champ , $nomChamp ){
        $tab = $this->getEscapeByChamp($champ , $nomChamp);
        $this->dataEscapeSelected = new Escapegame();
        $this->dataEscapeSelected->setIdEscape($tab[0]["idEscape"])
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

    public function setEscapeToCreate($idEscape, $nom, $niveau, $idType, $adresse, $cp, $ville){
        $this->escapeToCreate = $this->getEscapeToCreate($idEscape, $nom, $niveau, $idType, $adresse, $cp, $ville);
        $this->createEscape("Escape", $this->escapeToCreate); 
    }

    public function deleteEscape($id){

        $objects = $this->setAllEscape()->getTabEscape();

        foreach($objects as $i => $value){

            if( $value->getNom() === $id ){

                $db = $this->getconnect();
                $sql = "DELETE FROM escapegame WHERE escapegame.nom = :id LIMIT 1";
                //echo $sql;
                //prepare la requête avant de l'executer
                $rst = $db->prepare($sql);
                //execute la requête
                $rstok = $rst->execute([":id" => $id]);
                if($rstok){
                    return "cool";
                }
                else{
                    return "pas cool";
                }
            }
        }
    }

    /* public function deleteEscape($table, $dataEscapeSelected){

    } */




    //Modification d'un champ de la table escapeGame
    /* public function modifyEscapeElement($table, $champ, $element){
        $this->modifyChamp($table, $champ, $element);
    } */

} 
?>