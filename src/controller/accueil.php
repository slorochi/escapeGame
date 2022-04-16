<?php

use App\models\entity\User;
//Met en mémoire la page précédente
$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);

require("../public/views/accueil.php");


?>