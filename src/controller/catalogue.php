<?php

use App\core\Verif;
use App\models\BddConnection;
use App\models\repository\EscapeRepo;
$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);

// Com Gaetan : eviter la repetion de code dans les cartes en html

$appelbdd = new BddConnection();
$leaderboard = $appelbdd->recupeVille();
$htmlOptionViles='';
foreach ($leaderboard as $key => $value){

    $htmlOptionViles .= '<option value="'.$value['ville'].'">'.$value['ville'].'</option>';

}

$escape = new EscapeRepo;
$escape->SetAllEscape();
$esc = $escape->getTabEscape();
$admin = $_SESSION['compte']['admin'] ?? "";
$htmlEscp="";


if(!empty($_POST) && (($_POST["ville"] && $_POST["ville"] != "") || ($_POST["level"] && $_POST["level"] != ""))){

    if (isset($_POST['ville'])) {
        foreach($esc as $key => $value){

            $villePost = ($_POST['ville']);
            $lvlPost = ($_POST['level']);
            $lvl = ($value->getNiveau());
            $nomEscape =($value->getNom());
            $adresse = $value->getAdresse();
            $cp = $value->getCp();
            $ville = $value->getVille();

            if($admin == 1){
                $boutonDelete ="<form class='col-6' method='post'>
                    <input type='hidden' name='deleteEscapeName' value='$nomEscape'>
                    <input class='btn btn-danger' type='submit' value='Supprimer'>
                </form>";
                // si deleteEscapeName est dans le post alors on supprime l'escape
                //puis reviens sur la page
                if(isset($_POST['deleteEscapeName'])){
                    $escape->deleteEscape($_POST['deleteEscapeName']);
                    header("Location: ?p=catalogue");
                }
                
            }
            else{
                $boutonDelete ="";
            }
            
            if($villePost==""){
                if($value->getNiveau()==$lvlPost){
                    $htmlEscp .= EscapeRepo::createCard($nomEscape, $lvl, $adresse, $cp, $ville, $boutonDelete);
                }
                else if ($lvlPost==""){
                    $htmlEscp .= EscapeRepo::createCard($nomEscape, $lvl, $adresse, $cp, $ville, $boutonDelete);
                }
            }
            else if($value->getVille()==$villePost){
                if($lvlPost==""){
                    $htmlEscp .= EscapeRepo::createCard($nomEscape, $lvl, $adresse, $cp, $ville, $boutonDelete);
                }
                else if ($value->getNiveau()==$lvlPost){
                    $htmlEscp .= EscapeRepo::createCard($nomEscape, $lvl, $adresse, $cp, $ville, $boutonDelete);
                }
            }
        }
    }
}

else{
    foreach($esc as $key=>$value){
        $lvl = ($value->getNiveau());
        $nomEscape =($value->getNom());
        $adresse = $value->getAdresse();
        $cp = $value->getCp();
        $ville = $value->getVille();
        
        if($admin == 1){
            $boutonDelete ="<form class='col-6' method='post'>
                <input type='hidden' name='deleteEscapeName' value='$nomEscape'>
                <input class='btn btn-danger' type='submit' value='Supprimer'>
            </form>";
            // si deleteEscapeName est dans le post alors on supprime l'escape
            //puis reviens sur la page
            if(isset($_POST['deleteEscapeName'])){
                $escape->deleteEscape($_POST['deleteEscapeName']);
                header("Location: ?p=catalogue");
            }
            
        }
        else{
            $boutonDelete ="";
        }

        $htmlEscp .= EscapeRepo::createCard($nomEscape, $lvl, $adresse, $cp, $ville, $boutonDelete);
    }
}


/* if admin */
 if(!empty($_POST['nomAdmin']))
{
   $nomAdmin = $_POST['nomAdmin'];
}
else
{
   $nomAdmin = "";
}

if(!empty($_POST['lvlAdmin']))
{
   $lvlAdmin = $_POST['lvlAdmin'];
}
else
{
   $lvlAdmin = "";
}

if(!empty($_POST['idAdmin']))
{
   $idAdmin = $_POST['idAdmin'];
}
else
{
   $idAdmin = "";
}

if(!empty($_POST['adresseAdmin']))
{
   $adresseAdmin = $_POST['adresseAdmin'];
}else
{
   $adresseAdmin = "";
}

if(!empty($_POST['cpAdmin']))
{
   $cpAdmin = $_POST['cpAdmin'];
}else
{
   $cpAdmin = "";
}

if(!empty($_POST['villeAdmin']))
{
   $villeAdmin = $_POST['villeAdmin'];
}
else
{
   $villeAdmin = "";
}
if(!empty($_POST['descAdmin']))
{
   $descAdmin = $_POST['descAdmin'];
}
else{
    $descAdmin = "";
}

$CrudsAdmin = " 
<form method='post' class=' d-flex flex-column justify-content-evenly' style='width:300px; height:400px'action='?p=catalogue'>
            <input text='text' value='$nomAdmin' name='nomAdmin' class='form-control text-center' placeholder='escape name' style='width:auto'> 
            <input text='text' value='$lvlAdmin' name='lvlAdmin' class='form-control text-center' placeholder='escape lvl' style='width:auto'> 
            <input text='text' value='$idAdmin' name='idAdmin' class='form-control text-center' placeholder='escape type' style='width:auto'> 
            <input text='text' value='$adresseAdmin' name='adresseAdmin' class='form-control text-center' placeholder='escape adresse' style='width:auto'> 
            <input text='text' value='$cpAdmin' name='cpAdmin' class='form-control text-center' placeholder='escape cp' style='width:auto'> 
            <input text='text' value='$villeAdmin' name='villeAdmin' class='form-control text-center' placeholder='escape ville' style='width:auto'>
            <textarea name='descAdmin' class='form-control text-center' placeholder='Description' style='width:auto'>$descAdmin</textarea>
            <button type='submit' class='btn btn-primary btn-lg'
            style='padding-left: 2.5rem; padding-right: 2.5rem;' name='submitAdmin' >ajouter</button>
</form>";

if(!empty($_POST)){
    
    $errors = [];
    $verfCrudsAdmin = new Verif($_POST);
    $verfCrudsAdmin->is_message('nomAdmin', 'Votre escape name n\'est pas valide');
    $verfCrudsAdmin->is_message('lvlAdmin', 'Votre escape lvl n\'est pas valide');
    $verfCrudsAdmin->is_message('idAdmin', 'Votre escape type n\'est pas valide');
    $verfCrudsAdmin->is_message('adresseAdmin', 'Votre escape adresse n\'est pas valide');
    $verfCrudsAdmin->is_message('cpAdmin', 'Votre escape cp n\'est pas valide');
    $verfCrudsAdmin->is_message('villeAdmin', 'Votre escape ville n\'est pas valide');
    $verfCrudsAdmin->is_message('descAdmin', 'Votre Description n\'est pas valide');

    if($verfCrudsAdmin->verif()){
        if(isset($_POST['submitAdmin'])){
        $nameEsc = $_POST['nomAdmin'];
        $lvlEsc = $_POST['lvlAdmin'];
        $idTypeEsc = $_POST['idAdmin'];
        $adresseEsc = $_POST['adresseAdmin'];
        $cpEsc = $_POST['cpAdmin'];
        $villeEsc = $_POST['villeAdmin'];
        $descEsc = $_POST['descAdmin'];
        var_dump($nameEsc, $lvlEsc, $idTypeEsc, $adresseEsc,$cpEsc, $villeEsc,  $descEsc,);
        $escape->setEscapeToCreate($nameEsc, $lvlEsc, $idTypeEsc, $adresseEsc,$cpEsc, $villeEsc,  $descEsc,);
}
    }
    else{
        $errors = $verfCrudsAdmin->getErrors();
    }

}

require("../public/views/catalogue.php");

?>