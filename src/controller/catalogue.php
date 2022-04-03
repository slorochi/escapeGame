<?php

use App\models\repository\EscapeRepo;
$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);

/* $option = "<option value='valeur1'>Valeur 1</option>"; */

$escape = new EscapeRepo;
$escape->SetAllEscape();
$esc = $escape->getTabEscape();
$htmlEscp="";
if(isset($_POST['submit'])){
    if (isset($_POST['ville'] ) ) {
        foreach($esc as $key => $value){
            $villePost = ($_POST['ville']);
            $lvlPost = ($_POST['level']);
            $lvl = ($value->getNiveau());
            $nomEscape =($value->getNom());
            $adresse = $value->getAdresse();
            $cp = $value->getCp();
            $ville = $value->getVille();
            
            if($villePost=="ville"){
                if($value->getNiveau()==$lvlPost){
                    $htmlEscp .= 
                    "<div class='card col-md-6'>
                        <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>Nom&nbsp:&nbsp$nomEscape level:&nbsp$lvl</h5>
                            <p class='card-text'>$adresse $cp $ville.</p>
                            <a href='?p=escapegame?nom=$nomEscape' class='btn btn-primary'>Voir plus</a>
                        </div>
                    </div>";
                }
                else if ($lvlPost=="level"){
                    $htmlEscp .= 
                    "<div class='card col-md-6'>
                        <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nomEscape</h5>
                            <p class='card-text'>$adresse $cp $ville.</p>
                            <a href='' class='btn btn-primary'>Voir plus</a>
                        </div>
                    </div>";
                }
            }
            else if($value->getVille()==$villePost){
                if($lvlPost=="level"){
                    $htmlEscp .= 
                    "<div class='card col-md-6'>
                        <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nomEscape</h5>
                            <p class='card-text'>$adresse $cp $ville.</p>
                            <a href='' class='btn btn-primary'>Voir plus</a>
                        </div>
                    </div>";
                }
                else if ($value->getNiveau()==$lvlPost){
                    $htmlEscp .= 
                    "<div class='card col-md-6'>
                        <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nomEscape</h5>
                            <p class='card-text'>$adresse $cp $ville.</p>
                            <a href='' class='btn btn-primary'>Voir plus</a>
                        </div>
                    </div>";
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
        $htmlEscp .= 
        "<div class='card col-md-6'>
            <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
            <div class='card-body'>
            <h5 class='card-title'>Nom&nbsp:&nbsp$nomEscape level:&nbsp$lvl</h5>
                <p class='card-text'>$adresse $cp $ville.</p>
                <form action='?p=escapegame' method='post'>
                    <input type='hidden' name='nomEscape' value='$nomEscape'>
                    <input class='btn btn-primary' type='submit' value='Voir plus'>
                </form>
            </div>
        </div>";
    }
}


/* if admin */
$admin = " <form method='post' class=' d-flex flex-column justify-content-evenly' style='width:300px; height:400px'action='?p=catalogue'> 
            <input text='text' name='nomAdmin' class='text-center' placeholder='escape name' style='width:auto'> 
            <input text='text' name='lvlAdmin' class='text-center' placeholder='escape lvl' style='width:auto'> 
            <input text='text' name='idAdmin' class='text-center' placeholder='escape type' style='width:auto'> 
            <input text='text' name='adresseAdmin' class='text-center' placeholder='escape adresse' style='width:auto'> 
            <input text='text' name='cpAdmin' class='text-center' placeholder='escape cp' style='width:auto'> 
            <input text='text' name='villeAdmin' class='text-center' placeholder='escape ville' style='width:auto'>
            <textarea name='descAdmin' class='text-center' placeholder='Description' style='width:auto'></textarea>
            <button type='submit' class='btn btn-primary btn-lg'
            style='padding-left: 2.5rem; padding-right: 2.5rem;' name='submitAdmin' >ajouter </button>
</form>";

if(isset($_POST['submitAdmin'])){
    /* foreach($esc as $key=>$value){
        $idEscape= $value->getIdEscape();
    }
    $idEsc = strval($idEscape + 1);
     */
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


require("../public/views/catalogue.php");

?>