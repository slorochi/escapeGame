<?php

use App\models\entity\User;
$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);



$user = new User;
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