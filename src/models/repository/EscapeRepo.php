<?php
namespace App\models\repository;

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
                    ->setVille($tab[$i]["ville"])
                    ->setDescription($tab[$i]["description"]);

            array_push($this->tabEscape,$escape); 
        }
        return $this;
    }

    public function getTabEscape(){
        return $this->tabEscape;
    }

    //Récupère les infos d'un escape selon tri par champ
    public function getEscapeByChamp($champ, $id){
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
                 ->setVille($tab[0]["ville"])
                 ->setDescription($tab[0]["description"]);
         return $this;
    }

    public function getDataEscapeSelected(){
        return $this->dataEscapeSelected;
    }

    //Création d'un escape game dans la base de données
    protected function getEscapeToCreate($nom, $niveau, $idType, $adresse, $cp, $ville,$description){
        $escapeToC = new Escapegame();
        $all = $this->setAllEscape()->getTabEscape();
        foreach($all as $key => $value){}

        $maxId = ($value->getIdEscape());
        $incrId= $maxId+1;
        $escapeToC->setIdEscape($incrId); 
        $escapeToC->setNom($nom);
        $escapeToC->setNiveau($niveau);
        $escapeToC->setIdType($idType);
        $escapeToC->setAdresse($adresse);
        $escapeToC->setCp($cp);
        $escapeToC->setVille($ville);
        $escapeToC->setDescription($description); 
        return $escapeToC;
    }

    public function setEscapeToCreate($nom, $niveau, $idType, $adresse, $cp, $ville,$description){
        $this->escapeToCreate = $this->getEscapeToCreate($nom, $niveau, $idType, $adresse, $cp, $ville, $description);
        $this->createEscape("escapegame", $this->escapeToCreate);
        header("Location: ?p=catalogue");
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
                $rst->execute([":id" => $id]);

            }
        }
    }


    public static function createCard($nomEscape, $lvl, $adresse, $cp, $ville, $boutonDelete){

       return "<div class='card col-md-6'>
            <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
            <div class='card-body'>
            <h5 class='card-title'>Nom&nbsp:&nbsp$nomEscape level:&nbsp$lvl</h5>
                <p class='card-text'>$adresse $cp $ville.</p>
                <div class='row'>
                    <form action='?p=escapegame' class='col-6' method='post'>
                        <input type='hidden' name='nomEscape' value='$nomEscape'>
                        <input class='btn btn-primary' type='submit' value='Voir plus'>
                    </form>
                    $boutonDelete
                </div>
            </div>
        </div>";
    }
    //Modification d'un champ de la table escapeGame
    /* public function modifyEscapeElement($table, $champ, $element){
        $this->modifyChamp($table, $champ, $element);
    } */

} 
?>