<?php

use App\models\repository\EscapeRepo;


$escape = new EscapeRepo;

$escape = $escape->getEscapeByChamp("nom",$_POST['nomEscape']);
$nom = $escape[0]["nom"];
$niveau = $escape[0]["niveau"];
$idType = $escape[0]["idType"];
$adresse = $escape[0]["adresse"];
$cp = $escape[0]["cp"];
$ville = $escape[0]["ville"];
$description = $escape[0]["description"];

require("../public/views/escapegame.php");

?>