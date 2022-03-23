<?php

use App\models\entity\User;
use App\models\repository\EscapeRepo;
$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);
$option = "            <option value='valeur1'>Valeur 1</option>
";
$escape = new EscapeRepo;
$escape->SetAllEscape();
$esc =$escape->getTabEscape();
$htmlEscp="";
if(isset($_POST['submit'])){
    if (isset($_POST['ville'] ) ) {
        /* var_dump($_POST); */
        /* var_dump($esc); */
        foreach($esc as $key => $value){
            $villePost = ($_POST['ville']);
            $lvlPost = ($_POST['level']);
            $lvl = ($value->getNiveau());
            $nom =($value->getNom());
            $adresse = $value->getAdresse();
            $cp = $value->getCp();
            $ville = $value->getVille();
            if($villePost=="ville"){
                if($value->getNiveau()==$lvlPost){
                    $htmlEscp .= 
                    "<div class='card col-md-6'>
                        <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>Nom:&nbsp $nom &nbsp level :&nbsp $lvl</h5>
                            <p class='card-text'>$adresse $cp $ville.</p>
                            <a href='' class='btn btn-primary'>Go somewhere</a>
                        </div>
                    </div>";
                }
                else if ($lvlPost=="level"){
                    $htmlEscp .= 
                    "<div class='card col-md-6'>
                        <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nom</h5>
                            <p class='card-text'>$adresse $cp $ville.</p>
                            <a href='' class='btn btn-primary'>Go somewhere</a>
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
                            <h5 class='card-title'>$nom</h5>
                            <p class='card-text'>$adresse $cp $ville.</p>
                            <a href='' class='btn btn-primary'>Go somewhere</a>
                        </div>
                    </div>";
                }
                else if ($value->getNiveau()==$lvlPost){
                    $htmlEscp .= 
                    "<div class='card col-md-6'>
                        <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nom</h5>
                            <p class='card-text'>$adresse $cp $ville.</p>
                            <a href='' class='btn btn-primary'>Go somewhere</a>
                        </div>
                    </div>";
                }

            }
            
            /* var_dump($value->getCp()); */

        }
    }
}
else{
    foreach($esc as $key=>$value){
        $lvl = ($value->getNiveau());
        $nom =($value->getNom());
        $adresse = $value->getAdresse();
        $cp = $value->getCp();
        $ville = $value->getVille();
        $htmlEscp .= 
        "<div class='card col-md-6'>
            <img class='card-img-top' src='views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif' alt='Card image cap'>
            <div class='card-body'>
            <h5 class='card-title'>Nom: $nom  lvl: $lvl</h5>
                <p class='card-text'>$adresse $cp $ville.</p>
                <a href='' class='btn btn-primary'>Go somewhere</a>
            </div>
        </div>";
        
    }
}

/* var_dump($esc[0]->getNom());*/

/* $user->setNom("Anthony"); */

/* $html = ($user->getNom()); 
$level = $html[0]["niveau"];
$currentUser = $html[0]["nom"]; */
/* if (length(data)>=4){
    for ($i = 1; $i <= 4; $i++) {
        $html.= ' <div class="card col-md-6">
        <img class="card-img-top" src="views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div> '
    }
};
else{
    for($i = 1; $i <=length(data)){
        $html.= ' <div class="card col-md-6">
        <img class="card-img-top" src="views/style/img/be4be3e0-5dae-11ec-bfae-50d2ca6eaeba.jfif" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div> '
    }
};
 */

require("../public/views/catalogue.php");

?>