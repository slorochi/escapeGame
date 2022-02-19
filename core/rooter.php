<?php
ini_set('display_errors', 1);
include("./core/autoloader.php");
autoloader::register();
$p="";
if(isset($_GET["p"])){
    $p = $_GET["p"];
}

ob_start();
switch($p){
    case "classes":
        require("controllers/classes.php");
        break;
}
$content = ob_get_contents();
ob_end_clean();
?>