<?php

use App\core\Verif;
use App\models\BddConnection;
use App\models\repository\EscapeRepo;

$backpage = "?p=" . str_replace(".php", "", basename(__FILE__));
$session->setBackpage($backpage);

$appelbdd = new BddConnection();
$leaderboard = $appelbdd->recupeVille();
$htmlOptionViles = '';
foreach ($leaderboard as $key => $value) {

    $htmlOptionViles .= '<option value="' . $value['ville'] . '">' . $value['ville'] . '</option>';
}


$escape = new EscapeRepo;
$escape->SetAllEscape();
$esc = $escape->getTabEscape();
$admin = $_SESSION['compte']['admin'] ?? "";
$htmlEscp = "";
//filtre sur les escapegames selectionnées dans les selects de la page
if ((isset($_POST['submit']) && ((empty($_POST["ville"]) || $_POST["ville"] == "") && (empty($_POST["level"]) || $_POST["level"] == ""))) || !isset($_POST['submit'])) {

    foreach ($esc as $key => $value) {
        $lvl = ($value->getNiveau());
        $nomEscape = ($value->getNom());
        $adresse = $value->getAdresse();
        $cp = $value->getCp();
        $ville = $value->getVille();
        $idTypeEsc = ($value->getIdType());

        if ($admin == 1) {
            $boutonDelete = "<form class='col-6' method='post'>
                <input type='hidden' name='deleteEscapeName' value='$nomEscape'>
                <input class='btn btn-danger' type='submit' value='Supprimer'>
            </form>";
            // si deleteEscapeName est dans le post alors on supprime l'escape
            //puis revient sur la page
            if (isset($_POST['deleteEscapeName'])) {
                $escape->deleteEscape($_POST['deleteEscapeName']);
                header("Location: ?p=catalogue");
            }
        } else {
            $boutonDelete = "";
        }
        
        $htmlEscp .= EscapeRepo::createCard($nomEscape, $lvl, $adresse, $cp, $ville, $idTypeEsc, $boutonDelete);
    }
} elseif (isset($_POST['submit'])) {

    foreach ($esc as $key => $value) {

        $villePost = ($_POST['ville']);
        $lvlPost = ($_POST['level']);
        $lvl = ($value->getNiveau());
        $nomEscape = ($value->getNom());
        $idTypeEsc = ($value->getIdType());
        $adresse = $value->getAdresse();
        $cp = $value->getCp();
        $ville = $value->getVille();

        if ($admin == 1) {
            $boutonDelete = "<form class='col-6' method='post'>
                    <input type='hidden' name='deleteEscapeName' value='$nomEscape'>
                    <input class='btn btn-danger' type='submit' value='Supprimer'>
                </form>";
            // si deleteEscapeName est dans le post alors on supprime l'escape
            //puis reviens sur la page
            if (isset($_POST['deleteEscapeName'])) {
                $escape->deleteEscape($_POST['deleteEscapeName']);
                header("Location: ?p=catalogue");
            }
        } else {
            $boutonDelete = "";
        }

        if (($_POST["ville"] && $_POST["ville"] != "") && ($_POST["level"] && $_POST["level"] != "")) {

            if ($villePost == $ville && $lvlPost == $lvl) {
                $htmlEscp .= EscapeRepo::createCard($nomEscape, $lvl, $adresse, $cp, $ville, $idTypeEsc, $boutonDelete);
            }
        } elseif ($_POST["ville"] && $_POST["ville"] != "") {

            if ($villePost == $ville) {
                $htmlEscp .= EscapeRepo::createCard($nomEscape, $lvl, $adresse, $cp, $ville, $idTypeEsc, $boutonDelete);
            }
        } elseif ($_POST["level"] && $_POST["level"] != "") {
            if ($lvlPost == $lvl) {
                $htmlEscp .= EscapeRepo::createCard($nomEscape, $lvl, $adresse, $cp, $ville, $idTypeEsc, $boutonDelete);
            }
        }
    }
}


if (empty($arrayAdmin)) {
    $arrayPost = ['nomAdmin', 'lvlAdmin', 'idAdmin', 'adresseAdmin', 'cpAdmin', 'villeAdmin', 'descAdmin'];
}
$arrayAdmin = EscapeRepo::keepPreviousChamp($arrayPost);

$CrudsAdmin = " 
<form method='post' class=' d-flex flex-column justify-content-evenly' style='width:300px; height:400px'action='?p=catalogue'>
            <input text='text' value='$arrayAdmin[0]' name='nomAdmin' class='form-control text-center' placeholder='escape name' style='width:auto'> 
            <input text='text' value='$arrayAdmin[1]' name='lvlAdmin' class='form-control text-center' placeholder='escape lvl' style='width:auto'> 
            <input text='text' value='$arrayAdmin[2]' name='idAdmin' class='form-control text-center' placeholder='escape type' style='width:auto'> 
            <input text='text' value='$arrayAdmin[3]' name='adresseAdmin' class='form-control text-center' placeholder='escape adresse' style='width:auto'> 
            <input text='text' value='$arrayAdmin[4]' name='cpAdmin' class='form-control text-center' placeholder='escape cp' style='width:auto'> 
            <input text='text' value='$arrayAdmin[5]' name='villeAdmin' class='form-control text-center' placeholder='escape ville' style='width:auto'>
            <textarea name='descAdmin' class='form-control text-center' placeholder='Description' style='width:auto'>$arrayAdmin[6]</textarea>
            <button type='submit' class='btn btn-primary btn-lg'
            style='padding-left: 2.5rem; padding-right: 2.5rem;' name='submitAdmin' >ajouter</button>
</form>";

if (!empty($_POST)) {

    $errors = [];
    $verfCrudsAdmin = new Verif($_POST);
    $verfCrudsAdmin->is_message('nomAdmin', 'Votre escape name n\'est pas valide');
    $verfCrudsAdmin->is_message('lvlAdmin', 'Votre escape lvl n\'est pas valide');
    $verfCrudsAdmin->is_message('idAdmin', 'Votre escape type n\'est pas valide');
    $verfCrudsAdmin->is_message('adresseAdmin', 'Votre escape adresse n\'est pas valide');
    $verfCrudsAdmin->is_message('cpAdmin', 'Votre escape cp n\'est pas valide');
    $verfCrudsAdmin->is_message('villeAdmin', 'Votre escape ville n\'est pas valide');
    $verfCrudsAdmin->is_message('descAdmin', 'Votre Description n\'est pas valide');

    if ($verfCrudsAdmin->verif()) {
        if (isset($_POST['submitAdmin'])) {
            $nameEsc = $_POST['nomAdmin'];
            $lvlEsc = $_POST['lvlAdmin'];
            $idTypeEsc = $_POST['idAdmin'];
            $adresseEsc = $_POST['adresseAdmin'];
            $cpEsc = $_POST['cpAdmin'];
            $villeEsc = $_POST['villeAdmin'];
            $descEsc = $_POST['descAdmin'];

            $escape->setEscapeToCreate($nameEsc, $lvlEsc, $idTypeEsc, $adresseEsc, $cpEsc, $villeEsc,  $descEsc);
        }
    } else {
        $errors = $verfCrudsAdmin->getErrors();
    }
}

require("../public/views/catalogue.php");
